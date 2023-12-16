<?php

namespace App\Http\Controllers;

use App\Models\Corridors;
use App\Models\About;
use App\Models\KafeelGift;
use App\Models\MainSections;
use App\Models\News;
use App\Models\Gallery;
use App\Models\ReviewsMuseum;
use App\Models\Subjects;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $news = News::orderBy('id', 'DESC')->paginate(8);
        $about=About::get()->first();
        $mainSections=MainSections::latest()->paginate(env('PAGINATION_COUNT_HOME'));
        $subjects= Subjects::with(['sections'])->latest()->paginate(8);
        $kafeelGifts= KafeelGift::latest()->paginate(env('PAGINATION_COUNT_HOME'));
        $reviewsMuseums= News::where('category' ,'=','guests')->orderBy('id', 'DESC')->limit(6)->get();
        $corridors=Corridors::latest()->paginate(env('PAGINATION_COUNT_HOME'));
        $Gallery=Gallery::orderBy('id', 'DESC')->limit(6)->get();
        $Gallery2=Gallery::orderBy('id', 'DESC')->skip(6)->take(6)->get();
        $Gallery3=Gallery::orderBy('id', 'DESC')->skip(12)->take(6)->get();


       
        return view('pages.home')->with([

            'news' =>$news,
            'subjects'=>$subjects,
            'mainSections'=>$mainSections,
            'kafeelGifts'=>$kafeelGifts,
            'reviewsMuseums'=>$reviewsMuseums,
            'corridors'=>$corridors,
            'Gallery'=>$Gallery,
            'Gallery2'=>$Gallery2,
            'Gallery3'=>$Gallery3,
            'about'=>$about,

        ]);
    }
    public  function search(Request $request){
        
        $about=About::get()->first();

        $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;

        $news = News::latest()->orderBy('id', 'desc');

        if (is_null($keyword)) {
            return view('pages.404');
        }
        if (!is_null($keyword)) {
            $news = $news->search($keyword, null, true)->paginate(6);
        }

        return view('pages.search')->with([
            'news' =>$news,
            'about'=>$about,
        ]);
    }
}
