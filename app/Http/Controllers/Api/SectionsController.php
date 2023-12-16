<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sections;
use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SectionsResource;

class SectionsController extends Controller
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
        $sections= Sections::orderBy('id', 'desc')->get();;
        return  $this->sendResponse(  SectionsResource::collection($sections),201);
    }
    public function indexAdmin(Request $request)
    {
        $sections= Sections::all();
        return  $this->sendResponse(  SectionsResource::collection($sections),201);
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
            'views' => '0',
            'main_sections_id' => $request->main_sections_id,

        ];
        $sections =Sections::create($data);
        return  $this->sendResponse( new SectionsResource($sections),'Sections added Successfully!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $data=[
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            'main_sections_id' => $request->main_sections_id,
        ];
        $sections =Sections::where('id', $id)->first();
        $sections->update($data);

        if(is_null($sections)){
            return $this->sendError('Sections not found!' );
        }
        $sections->update($data);
        return  $this->sendResponse( new SectionsResource($sections),'Sections update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id)
    {

        $sections =Sections::where('id', $id)->first();
        if(is_null($sections)){
            return $this->sendError('Sections not found!' );
        }
        $sections->delete();
        return  $this->sendResponse( new SectionsResource($sections),'Sections deleted Successfully!');
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
        Image::make($request->file('photo'))->save('upload/large/'.$img_name.'');
        Image::make($request->file('photo'))->resize(270,194, function ($const) { $const->aspectRatio(); })->save('upload/large/270/'.$img_name.'');
        Image::make($request->file('photo'))->resize(720,515, function ($const) { $const->aspectRatio(); })->save('upload/large/720/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(418, 236)->save('sections_img/thumb_new/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(50, 50)->save('sections_img/small_thumb/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(570, 450)->save('sections_img/sections_img_main/'.$img_name.'');
        $sections=Sections::find($id);
        if(is_null($sections)){
            return $this->sendError('Sections not found!' );
        }
        $sections->photo =$img_name;
         $sections->save();


            return  $this->sendResponse( new SectionsResource($sections),'Sections add image Successfully!');
        }
    }
    public function destroyImage($id)
    {
        $images=images::where('id','=',$id)->first();
        unlink("upload/large/".$images->image_name);
        unlink("upload/large/270/".$images->image_name);
        unlink("upload/large/720/".$images->image_name);
        $images->delete();

        return "true";

    }

    public function importDataSections(){

        $sections = DB::table('sections_old')->select('*')->get();

       foreach ($sections as $section) {

         $sections_add =new Sections();
         $sections_add->id =$section->id;
         $sections_add->setTranslation('title', 'ar',$section->title);
         $sections_add->setTranslation('title', 'en','' );

//         $sections_add->main_sections_id= 1;
         $sections_add->views= $section->views;
         $sections_add->photo= $section->photo;
         $sections_add->save();

        }
        return "true";
        }
}
