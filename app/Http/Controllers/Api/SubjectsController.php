<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionsResource;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Http\Resources\SubjectsResource;
use App\Models\Images;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class SubjectsController extends Controller
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

        $subjects= Subjects::orderBy('id', 'desc')->get();
        return  $this->sendResponse(  SubjectsResource::collection($subjects),201);
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
            'title' => $request->title,

            'more' => [
                'ar' => $request->translations[0]['more'],
                'en' => $request->translations[1]['more'],
            ],

            'views' => 0,
            'downloads' => 0,

            'sections_id' => $request->sections_id,
        ];
        $subjects = Subjects::create( $data);
        return  $this->sendResponse( new SubjectsResource($subjects),'Subjects added Successfully!');

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show(Subjects $subjects)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $data = [
            'title' => $request->title,

            'more' => [
                    'ar' => $request->translations[0]['more'],
                    'en' => $request->translations[1]['more'],
                ],

            'sections_id' => $request->sections_id,
            ];
            $subjects =Subjects::where('id', $id)->first();
            $subjects->update($data);

        if(is_null($subjects)){
                return $this->sendError('Subjects not found!' );
            }
            $subjects->update($data);
            return  $this->sendResponse( new SubjectsResource($subjects),'Subjects updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id)
    {
        $subjects =Subjects::where('id', $id)->first();
        if(is_null($subjects)){
            return $this->sendError('Subjects not found!' );
        }
        $subjects->delete();
        return  $this->sendResponse( new SubjectsResource($subjects),'Subjects deleted Successfully!');
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
        $subjects=Subjects::find($id);
        if(is_null($subjects)){
            return $this->sendError('Subjects not found!' );
        }

        $subjects->photo =$img_name;
        $subjects->save();

        return  $this->sendResponse( new SubjectsResource($subjects),'Subjects add image Successfully!');
        }
    }

    public function section($id){
        $subjects = Subjects::find( $id );
        $section = $subjects->sectionsCat()->get();
        return  $this->sendResponse( SectionsResource::collection($section),201);
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

//    public function importDataSubjects(){
//
//        $subjects = DB::table('subjects_old')->select('*')->get();
//
//       foreach ($subjects as $subject) {
//
//         $subjects_add =new Subjects();
//         $subjects_add->title=$subject->title;
//
//         $subjects_add->setTranslation('more', 'ar',$subject->more);
//         $subjects_add->setTranslation('more', 'en','' );
//
//         $subjects_add->views= $subject->views;
//         $subjects_add->downloads= $subject->downloads;
//         $subjects_add->photo= $subject->photo;
//         $subjects_add->inputs= $subject->inputs;
//         $subjects_add->sections_id= $subject->section_id;
//
//         $subjects_add->save();
//
//       }
//        return "true";
//
//    }

}
