<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KafeelGiftResource;
use App\Models\KafeelGift;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class KafeelGiftController extends Controller
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
        $kafeelGift =KafeelGift::orderBy('id', 'desc')->get();

        return  $this->sendResponse( KafeelGiftResource::collection($kafeelGift),201);
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
            'detail' => [
                'ar' => $request->translations[0]['detail'],
                'en' => $request->translations[1]['detail'],
            ],

            'price' => $request->price,
        ];
        $kafeel =KafeelGift::create($data);
        return  $this->sendResponse( new KafeelGiftResource($kafeel),'Kafeel Gift added Successfully!');

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

            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            'detail' => [
                'ar' => $request->translations[0]['detail'],
                'en' => $request->translations[1]['detail'],
            ],

            'price' => $request->price,
        ];
        $kafeel =KafeelGift::find($id);
        $kafeel->update($data);
        return  $this->sendResponse( new KafeelGiftResource($kafeel),'Kafeel Gift update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kafeel =KafeelGift::find($id);
        $kafeel->delete();
        return  $this->sendResponse( new KafeelGiftResource($kafeel),'Kafeel Gift deleted Successfully!');

    }
    public function uploadImage(Request $request,$id)
    {
        $file=$request->file('image');
        $allowedfileExtension=['jpg','png','jpeg','JPG','JPEG'];
        $extension =$file->getClientOriginalExtension();
        $temp        = explode(".", $_FILES["image"]["name"]);
        $extension   = strtolower(end($temp));
        $img_name    ='img'.time().'.'.$extension.'';
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
            Image::make($request->file('image'))->save('upload/kafeelGift/'.$img_name.'');
            Image::make($request->file('image'))->resize(150, 108, function ($const) { $const->aspectRatio(); })->save('upload/kafeelGift/150/'.$img_name.'');
            Image::make($request->file('image'))->resize(370, 285, function ($const) { $const->aspectRatio(); })->save('upload/kafeelGift/370/'.$img_name.'');
            Image::make($request->file('image'))->resize(770, 540, function ($const) { $const->aspectRatio(); })->save('upload/kafeelGift/770/'.$img_name.'');

            $kafeelGift=KafeelGift::find($id);
            if(is_null($kafeelGift)){
                return $this->sendError('KafeelGift not found!' );
            }
            $kafeelGift->image =$img_name;

            $kafeelGift->save();

            return  $this->sendResponse( new KafeelGiftResource($kafeelGift),'kafeelGift add image Successfully!');
        }
    }

}
