<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\MainSectionsResource;
use App\Models\Images;
use App\Models\MainSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;

class MainSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
     
      public function __construct() {
        $this->middleware('checkRole:admin')->only('update','store','uploadImage','destroy','uploadImagesAttached','destroyImage');
    }
    
    
    public function index()
    {
        $mainSection=MainSections::orderBy('id', 'desc')->get();
        return  $this->sendResponse( MainSectionsResource::collection($mainSection),201);

    }

    public function indexAdmin(Request $request)
    {
        $mainSection=MainSections::all();
        return  $this->sendResponse( MainSectionsResource::collection($mainSection),201);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $data=[
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],

        ];
        $mainSection =MainSections::create($data);
        return  $this->sendResponse( new MainSectionsResource($mainSection),'MainSections added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data=[
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],

        ];
        $mainSection =MainSections::find($id);
        $mainSection->update($data);

        return  $this->sendResponse( new MainSectionsResource($mainSection),'MainSections updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $mainSections =MainSections::find( $id);
        if(is_null($mainSections)){
            return $this->sendError('MainSections not found!' );
        }
        $mainSections->delete();
        return  $this->sendResponse( new MainSectionsResource($mainSections),'MainSections deleted Successfully!');

    }
    public function uploadImage(Request $request,$id)
    {
        $file=$request->file('photo');
        $allowedfileExtension=['jpg','png','jpeg','JPG','JPEG'];
        $extension =$file->getClientOriginalExtension();
        $temp        = explode(".", $_FILES["photo"]["name"]);
        $extension   = strtolower(end($temp));
        $img_name    ='img'.time().'.'.$extension.'';
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
            Image::make($request->file('photo'))->save('upload/main_sec/'.$img_name.'');
            Image::make($request->file('photo'))->resize(120,100, function ($const) { $const->aspectRatio(); })->save('upload/main_sec/100/'.$img_name.'');
            Image::make($request->file('photo'))->resize(270,194, function ($const) { $const->aspectRatio(); })->save('upload/main_sec/270/'.$img_name.'');
            // Image::make($request->file('photo'))->resize(263, 200)->save('upload/mainSections/thumb_new/'.$img_name.'');
            // Image::make($request->file('photo'))->resize(122, 100)->save('upload/mainSections/small_thumb/'.$img_name.'');
            $mainSections=MainSections::find($id);
            if(is_null($mainSections)){
                return $this->sendError('Main Sections not found!' );
            }

            $mainSections->photo =$img_name;

            $mainSections->save();

            return  $this->sendResponse( new MainSectionsResource($mainSections),'Main Sections add image Successfully!');
        }
    }
    public function destroyImage($id)
    {
        $images=Images::where('id','=',$id)->first();
        unlink("upload/main_sec/".$images->image_name);
        unlink("upload/main_sec/100/".$images->image_name);
        // unlink("upload/mainSections/small_thumb/".$images->image_name);
        $images->delete();
    }

}
