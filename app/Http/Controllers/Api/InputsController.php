<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InputsResource;
use App\Http\Resources\SubjectsResource;
use App\Models\InputsSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\Console\Input\Input;

class InputsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
        public function __construct() {
        $this->middleware('checkRole:admin')->only('update','store','uploadImage','destroy','uploadImagesAttached','destroyImage');
    }
    
    public function index()
    {
        $inputs=InputsSubjects::orderBy('id','desc')->get();
        return $this->sendResponse(InputsResource::collection($inputs),200);

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

            'val' => [
                'ar' => $request->translations[0]['val'],
                'en' => $request->translations[1]['val'],
            ],
            'spec' => [
                'ar' => $request->translations[0]['spec'],
                'en' => $request->translations[1]['spec'],
            ],
            'subjects_id' => $request->subjects_id,
        ];
        $inputs=InputsSubjects::create($data);
        return  $this->sendResponse(new SubjectsResource($inputs),'su');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [

            'val' => [
                'ar' => $request->translations[0]['val'],
                'en' => $request->translations[1]['val'],
            ],
            'spec' => [
                'ar' => $request->translations[0]['spec'],
                'en' => $request->translations[1]['spec'],
            ],
            'subjects_id' => $request->subjects_id,
        ];
        $inputs= InputsSubjects::find($id);
        $inputs->update($data);
        return  $this->sendResponse(new SubjectsResource($inputs),'su');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inputs= InputsSubjects::find($id);
        $inputs->delete();
        return  $this->sendResponse(new SubjectsResource($inputs),'su');

    }
}
