<?php

namespace App\Http\Controllers;

use App\Models\MainSections;
use App\Models\About;
use Illuminate\Http\Request;

class MainSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about=About::get()->first();
        $mainSections=MainSections::all();
        return  view('pages.nafessPage')->with(['mainSections'=>$mainSections, 'about'=>$about]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainSections  $mainSections
     * @return \Illuminate\Http\Response
     */
    public function show($id)//detailMainSection
    {
        $about=About::get()->first();
        $mainSection=MainSections::find($id);
        return view('pages.allSect-MS')->with([
            'mainSection'=>$mainSection, 
            'about'=>$about
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainSections  $mainSections
     * @return \Illuminate\Http\Response
     */
    public function edit(MainSections $mainSections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainSections  $mainSections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainSections $mainSections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainSections  $mainSections
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainSections $mainSections)
    {
        //
    }
}
