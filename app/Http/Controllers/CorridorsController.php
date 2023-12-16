<?php

namespace App\Http\Controllers;

use App\Models\Corridors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class CorridorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corridors= Corridors::paginate(env('PAGINATION_COUNT'));
        // return view('pages.corridors')->with(['corridors' =>$corridors]);

       }
      
          
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corridors  $corridors
     * @return \Illuminate\Http\Response
     */
    public function show($id,$locale)
    {
        App::setLocale($locale);
        $corridors = Corridors::where('id', $id)->first();
        // return view('news.show')->with(['corridors' =>$corridors])  ;
      
    }





    
  



}
