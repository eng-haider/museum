<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\About;
use App\Models\Subjects;


class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about=About::get()->first();
        $structures= Structure::orderBy('arrange','asc')->get();
        $subjects= Subjects::with(['sections'])->paginate(8);
        return view('pages.museumDuties ')->with(['structures' =>$structures,'subjects'=>$subjects, 'about'=>$about]);

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structure  $structure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


}
