<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Resources\StructureResource;
use App\Models\Images;
use Illuminate\Support\Facades\DB;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    //   public function __construct() {
    //     $this->middleware('checkRole:admin')->only('update','store','uploadImage','destroy','uploadImagesAttached','destroyImage');
    // }
    
    public function index()
    {

        $structure= Structure::all();
        return  $this->sendResponse( StructureResource::collection($structure),201);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = [
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            'text' => [
                'ar' => $request->translations[0]['text'],
                'en' => $request->translations[1]['text']
            ],
            'arrange' => $request->arrange
        ];
        $structure = Structure::create( $data);
        return  $this->sendResponse( new StructureResource($structure),'Structure added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Structure $structure)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $data = [
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            'text' => [
                'ar' => $request->translations[0]['text'],
                'en' => $request->translations[1]['text']
            ],
            'arrange' => $request->arrange
        ];
        $structure =Structure::where('id', $id)->first();
        $structure->update($data);

        if(is_null($structure)){
            return $this->sendError('Structure not found!' );
        }
        $structure->update($data);
        return  $this->sendResponse( new StructureResource($structure),'Structure update Successfully!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $structure =Structure::where('id', $id)->first();
        if(is_null($structure)){
            return $this->sendError('Structure not found!' );
        }
        $structure->delete();
        return  $this->sendResponse( new StructureResource($structure),'Structure deleted Successfully!');
    }

    public function uploadImage(Request $request,$id)
    {
        $file=$request->file('photo');
        $allowedfileExtension=['jpg','png','jpeg','JPG','JPEG','webp'];
        // $extension =$file->getClientOriginalExtension();
         $temp        = explode(".", $_FILES["photo"]["name"]);
         $extension   = strtolower(end($temp));
         $img_name    ='img'.time().'.'.$extension.'';
           $check=in_array($extension,$allowedfileExtension);
           if($check)
        {
        Image::make($request->file('photo'))->save('upload/structure/'.$img_name.'');
        Image::make($request->file('photo'))->resize(1000, 1000, function ($const) { $const->aspectRatio(); })->save('upload/structure/large/'.$img_name.'');
        Image::make($request->file('photo'))->resize(970, 444)->save('upload/structure/thumb/'.$img_name.'');
        $structure=Structure::find($id);
        if(is_null($structure)){
            return $this->sendError('Structure not found!' );
        }
        $structure->photo =$img_name;
         $structure->save();

            return  $this->sendResponse( new StructureResource($structure),'Structure add image Successfully!');
        }
    }
    public function destroyImage($id)
    {
        $images=images::where('id','=',$id)->first();
        unlink("upload/structure/".$images->image_name);
        unlink("upload/structure/large/".$images->image_name);
        unlink("upload/structure/thumb/".$images->image_name);
        $images->delete();

        return "true";

    }
    public function importDataStructure(){

        $structures = DB::table('structure_old')->select('*')->get();


       foreach ($structures as $structure) {

         $structure_add =new Structure();

         $structure_add->setTranslation('title', 'ar',$structure->title);
         $structure_add->setTranslation('title', 'en','' );

         $structure_add->setTranslation('text', 'ar',$structure->text);
         $structure_add->setTranslation('text', 'en','' );
         $structure_add->photo=$structure->photo;

         $structure_add->save();

        }
        return "true";
        }
}
