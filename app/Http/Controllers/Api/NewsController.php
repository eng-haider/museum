<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ImagesResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Resources\NewsResource;
use App\Models\Images;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function __construct() {
        $this->middleware('checkRole:admin')->only('update','store','uploadImage','destroy','uploadImagesAttached');
    }
    
    
    public function thumImage()
    {
        $files= News::get();


      foreach($files as $img){
        try {


      Image::make('newss/'.$img->photo)->resize(370,370)->save('newss/thumb_card/'.$img->photo.'');


      }
      catch (Exception $e) {

    }
}
    }
    public function index()
    {
        $news= News::with('Images')->latest()->orderBy('id', 'desc')->get();
        return  $this->sendResponse( NewsResource::collection($news),201);

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
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            'more' => [
                'ar' => $request->translations[0]['more'],
                'en' => $request->translations[1]['more']
            ],
            'text' => [
                'ar' => $request->translations[0]['text'],
                'en' => $request->translations[1]['text']
            ],
            'photo_more' => [
                'ar' => $request->translations[0]['photo_more'],
                'en' => $request->translations[1]['photo_more']
            ],


            'views' => 0,
            'time' => date("m/d/Y"),
            'ces' => 0,

            'category' => $request->category,
        ];
        $news =News::create($data);
        return  $this->sendResponse( new NewsResource($news),'News added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data=[
            'title' => [
                'ar' => $request->translations[0]['title'],
                'en' => $request->translations[1]['title'],
            ],
            // 'more' => [
            //     'ar' => $request->translations[0]['more'],
            //     'en' => $request->translations[1]['more']
            // ],
            'text' => [
                'ar' => $request->translations[0]['text'],
                'en' => $request->translations[1]['text']
            ],
            // 'photo_more' => [
            //     'ar' => $request->translations[0]['photo_more'],
            //     'en' => $request->translations[1]['photo_more']
            // ],


            'category' => $request->category,
        ];
        $news =News::where('id', $id)->first();
        $news->update($data);
        if(is_null($news)){
            return $this->sendError('News not found!' );
        }
        $news->update($data);
        return  $this->sendResponse( new NewsResource($news),'News update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news =News::where('id', $id)->first();
        if(is_null($news)){
            return $this->sendError('News not found!' );
        }
        $news->delete();
        return  $this->sendResponse( new NewsResource($news),'News deleted Successfully!');

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
        Image::make($request->file('photo'))->save('upload/news2/'.$img_name.'');
        Image::make($request->file('photo'))->resize(120,80, function ($const) { $const->aspectRatio(); })->save('upload/news2/120/'.$img_name.'');
        Image::make($request->file('photo'))->resize(370,250)->save('upload/news2/370/'.$img_name.'');
        Image::make($request->file('photo'))->resize(770,510, function ($const) { $const->aspectRatio();})->save('upload/news2/770/'.$img_name.'');
        // Image::make($request->file('photo'))->resize(370, 246)->save('upload/news/small_thumb/'.$img_name.'');
        $news=News::find($id);
        if(is_null($news)){
            return $this->sendError('News not found!' );
        }

        $news->photo =$img_name;

         $news->save();

            return  $this->sendResponse( new NewsResource($news),'News add image Successfully!');
        }
    }

    public function uploadImagesAttached(Request $request)
    {
        $file = $request->file('image');
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG'];
        $extension = $file->getClientOriginalExtension();
        $temp = explode(".", $_FILES["image"]["name"]);
        $extension = strtolower(end($temp));
        $img_name = 'img' . bin2hex(random_bytes(8)) . '.' . $extension . '';
        $check = in_array($extension, $allowedfileExtension);
        if ($check) {
            Image::make($request->file('image'))->save('upload/news2/' . $img_name . '');
            Image::make($request->file('image'))->resize(340, 226, 
            function ($const) {
                $const->aspectRatio();
            })->save('upload/news2/attach_340/' . $img_name . '');
            // Image::make($request->file('image'))->resize(370, 246)->save('upload/news/small_thumb/' . $img_name . '');
            $images = new Images();
            if (is_null($images)) {

                return $this->sendError('Image not found!');

            }
            $images->image = $img_name;
            $images->news_id = $request->news_id;

            $images->save();

            return $this->sendResponse( $images, ' add image Successfully!');
        }
    }



    public function getImages($id){
        $new=News::find($id);
        $images=$new->images()->get();
        return $this->sendResponse(ImagesResource::collection($images),200);
    }



    public function destroyImage($id)
    {
        $images=Images::find($id);
        if (is_null($images)) {
            return $this->sendError('Image not found!');
        }
//        unlink("upload/news/".$images->image);
//        unlink("upload/news/thumb_new/".$images->image);
//        unlink("upload/news/small_thumb/".$images->image);
        $images->delete();
        return  $this->sendResponse('true',200);
    }

//    public function importDataNews(){
//        $news = DB::table('news_old')->select('*')->get();
//
//           foreach ($news as $new) {
//            $newsadd =new News();
//
//            $newsadd->setTranslation('title', 'ar',$new->title);
//            $newsadd->setTranslation('title', 'en','' );
//
//            $newsadd->setTranslation('text', 'ar',$new->text);
//            $newsadd->setTranslation('text', 'en','' );
//
//
//            $newsadd->setTranslation('more', 'ar',$new->more);
//            $newsadd->setTranslation('more', 'en','' );
//
//
//            $newsadd->setTranslation('photo_more', 'ar',$new->photo_more);
//            $newsadd->setTranslation('photo_more', 'en','' );
//
//
//            $newsadd-> views =$new->views;
//
//            $newsadd->photo = $new->photo;
//               $test=$new->pics;
//               foreach ((array)$test as $pic) {
//                   $newsadd->pics = $pic;
//
//               }
//            $newsadd->time = $new->time;
//            $newsadd->ces = $new->ces;
//            $newsadd->category = $new->category;
//
//            $newsadd->save();
//
//           }
//           return 'true';
//        }

//    public function importData(){
//        $news = DB::table('news')->select('*')->get();
//
////        echo $news;
//        foreach ($news as $new) {
//
//
//            $test=json_decode($new->pics);
//            foreach ((array)$test as $pic) {
//                $images = new Images();
//
//                $images->news_id = $new->id;
//
//                $images->image = $pic;
//                $images->save();
//
//                echo $pic.'<br>';
//
//            }
//
//        }
//        return 'true';
//    }




   public function imgResize()
   {
    //    $news = DB::table('structures')->select('*')->get();

      
    //    foreach ($news as $new) {
    //        try{

    //            $img = Image::make(

    //                public_path('upload/structure/' . $new->photo))
    //                ->resize(1200, 550)->save('upload/structure/thumb/' . $new->photo);
    //            continue;

    //        } catch (Exception $e) {
    //            continue;

    //        }
    //    }


    $news = DB::table('news')->limit(85)->orderBy('id', 'DESC')->select('*')->get();

      
       foreach ($news as $new) {
           try{

               $img = Image::make(

                   public_path('upload/news2/' . $new->photo))
                   ->resize(384, 260)->save('upload/news2/thumb_card/' . $new->photo);
               //continue;
              
           } catch (Exception $e) {
               continue;

           }
       }

       
   }

}
