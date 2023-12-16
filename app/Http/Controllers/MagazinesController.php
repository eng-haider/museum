<?php

namespace App\Http\Controllers;

use App\Models\KafeelGift;
use App\Models\About;
use App\Models\Subjects;

class MagazinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
       
        return view('pages.mag');
       }



}
