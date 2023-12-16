<?php

namespace App\Http\Controllers;

use App\Models\MainSections;
use App\Models\News;
use App\Models\About;
use App\Models\Sections;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about=About::get()->first();
        $news= News::orderBy('id', 'desc')->paginate(env('PAGINATION_COUNT'));
        return view('pages.news')->with(['news' =>$news, 'about'=>$about]);

    }

    public function indexReviews()
    {
        $about=About::get()->first();
        $reviewsMuseums= News::where('category' ,'=','guests')->orderBy('id', 'desc')->get();
        return view('pages.reviews_mus')->with(['news' =>$reviewsMuseums, 'about'=>$about]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show($id,Request $request)
    {
        
        $about=About::get()->first();
        $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;

        $news = News::orderBy('id', 'desc');

        if (!is_null($keyword)) {
            $news = $news->search($keyword, null, true);
        }

        $news = $news->limit(5)->get();

        $mainSections=MainSections::all();

        $new = News::with('Images')->where('id', $id)->first();
        $new->views=$new->views+1;
        $new->save();

        return view('pages.newsPost')->with(['new' =>$new,'mainSections' =>$mainSections,'news'=>$news, 'about'=>$about])  ;

    }







}
