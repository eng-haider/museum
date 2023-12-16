<?php

namespace App\Http\Controllers;

use App\Models\MainSections;
use App\Models\Sections;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SectionsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
      */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show($id){

        $section = Sections::find($id);
//        dd($section);

        return view('pages.detailSection')->with([
            'section'=>$section,
            ]);

    }



}
