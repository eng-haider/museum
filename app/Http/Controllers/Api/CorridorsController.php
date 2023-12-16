<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corridors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Images;
use App\Http\Resources\CorridorsResource;
use Illuminate\Support\Facades\DB;


class CorridorsController extends Controller
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
        $corridors= Corridors::orderBy('id', 'desc')->get();
        return  $this->sendResponse( CorridorsResource::collection($corridors),201);

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

            'more' => [
                'ar' => $request->translations[0]['more'],
                'en' => $request->translations[1]['more'],
            ],

            'views' => '0',
            'pack' => '0',
            'size' => '0',
            'time' => time(),
            'downloads' => '0',
            'rating' => '0',
        ];
        $corridors = Corridors::create( $data);
        return  $this->sendResponse( new CorridorsResource($corridors),'corridors added Successfully!');

       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corridors  $corridors
     * @return \Illuminate\Http\Response
     */
    public function show(Corridors $corridors)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corridors  $corridors
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,  $id)
    {
        $data = [

            'more' => [
                'ar' => $request->translations[0]['more'],
                'en' => $request->translations[1]['more'],
            ],

        ];
        $corridors =Corridors::where('id', $id)->first();
        $corridors->update($data);

        if(is_null($corridors)){
            return $this->sendError('Corridors not found!' );
        }
        $corridors->update($data);
        return  $this->sendResponse( new CorridorsResource($corridors),'corridors update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corridors  $corridors
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $corridors =Corridors::where('id', $id)->first();
        if(is_null($corridors)){
            return $this->sendError('Corridors not found!' );
        }
        $corridors->delete();
        return  $this->sendResponse( new CorridorsResource($corridors),'corridors deleted Successfully!');
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
        Image::make($request->file('photo'))->save('upload/corridors/'.$img_name.'');
        Image::make($request->file('photo'))->resize(370,250, function ($const) { $const->aspectRatio(); })->save('upload/corridors/370/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(50, 50)->save('upload/corridors/small_thumb/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(570, 450)->save('upload/corridors/corridors_img_main/'.$img_name.'');

        $corridors=Corridors::find($id);
        if(is_null($corridors)){
            return $this->sendError('Corridors not found!' );
        }
        $corridors->photo =$img_name;

         $corridors->save();

            return  $this->sendResponse( new CorridorsResource($corridors),'corridors add image Successfully!');
        }
    }

    public function importDataCorridors(){

        $corridors = DB::table('corridors_old')->select('*')->get();


       foreach ($corridors as $corridor) {
         $corrido =new Corridors();
         $corrido->setTranslation('more', 'ar',$corridor->more);
         $corrido->setTranslation('more', 'en','' );
          echo "line". '<br/>';
          echo $corrido->getTranslation('more', 'ar' );
         $corrido->views= $corridor->views;
         $corrido->pack= $corridor->pack;
         $corrido->photo = $corridor->photo;
         $corrido->size= $corridor->size;
         $corrido->time= $corridor->time;
         $corrido->downloads= $corridor->downloads;
         $corrido->rating=  $corridor->rating;
         $corrido->save();
        }
        return "true";
        }
}
