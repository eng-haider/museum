<?php

namespace App\Http\Controllers;

use App\Models\KafeelGift;
use App\Models\About;
use App\Models\Subjects;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexSections($id)
    {
        $about=About::get()->first();
        $subject=Subjects::where('id', $id)->first();
        $kafeelGifts= KafeelGift::latest()->paginate(env('PAGINATION_COUNT_HOME'));


        return view('pages.subjectDetails')->with([
            'kafeelGifts'=>$kafeelGifts,
            'subjec'=>$subject, 
            'about'=>$about
            ]);
       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $subjects = Subjects::where('id', $id)->first();

        // return view('subjects.show')->with(['subjects' =>$subjects])  ;

    }

}
