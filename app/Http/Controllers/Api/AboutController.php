<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Support\Facades\App;

class AboutController extends Controller
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

        $about=About::all();

        return  $this->sendResponse( AboutResource::collection($about),200);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=[
            'about' => [
                'ar' => $request->translations[0]['about'],
                'en' => $request->translations[1]['about'],
            ],

            'views' => $request->views,
        ];
        $about =About::create($data);
        return  $this->sendResponse( new AboutResource($about),'about added Successfully!');

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=[
            'about' => [
                'ar' => $request->translations[0]['about'],
                'en' => $request->translations[1]['about'],
            ],
            'title' => [
                'ar' => $request->translations[2]['title'],
                'en' => $request->translations[3]['title'],
            ],

            // 'views' => $request->views,
        ];
        $about =About::find($id);
        $about->update($data);
        return  $this->sendResponse( new AboutResource($about),'About updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $about =About::find($id);
        $about->delete();
        return  $this->sendResponse( new AboutResource($about),'About deleted Successfully!');
    }

    public function uploadImage(Request $request,$id)
    {


        $file=$request->file('photo');
        $filename ='img' .time().'.'.$file->getClientOriginalExtension();
        $check = $file->move(public_path('upload/about'),$filename);
        if($check)
        {

            $about=About::find($id);
            if(is_null($about)){
                return $this->sendError('News not found!' );
            }

            $about->photo =$filename;

            $about->save();

            return  $this->sendResponse( new AboutResource($about),'About add image Successfully!');
        }
    }


}
