<?php

namespace App\Http\Controllers;

use App\Models\KafeelGift;
use Illuminate\Http\Request;

class KafeelGiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $kafeelGifts= KafeelGift::latest()->paginate(env('PAGINATION_COUNT_HOME'));

        return view('pages.gift_museum')->with(['kafeelGifts'=>$kafeelGifts]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kefeelGift=new KafeelGift();

        $kefeelGift->setTranslation('title', 'en', 'title in English')
            ->setTranslation('title', 'ar', 'الف سعر القطعة');
        $kefeelGift->setTranslation('detail', 'en', 'detail in English')
            ->setTranslation('detail', 'ar', 'رمح من الذهب الخالص من العصر العباسي');

        $kefeelGift->image='http://media.w3.org/2010/05/sintel/poster.png';

        $kefeelGift->price=28;

        $kefeelGift->save();

        return true;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KafeelGift  $kafeelGift
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;

        $kafeelGifts = KafeelGift::orderBy('id', 'desc');

        if (!is_null($keyword)) {
            $kafeelGifts = $kafeelGifts->search($keyword, null, true);
        }

        $kafeelGifts = $kafeelGifts->get();


        $kafeelGift=KafeelGift::find($id);

//        $kafeelGifts=KafeelGift::latest()->paginate(env('PAGINATION_COUNT_end'));;
        return view('pages.gift_museum_id')->with([
            'kafeelGift'=>$kafeelGift,
            'kafeelGifts'=>$kafeelGifts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KafeelGift  $kafeelGift
     * @return \Illuminate\Http\Response
     */
    public function edit(KafeelGift $kafeelGift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KafeelGift  $kafeelGift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KafeelGift $kafeelGift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KafeelGift  $kafeelGift
     * @return \Illuminate\Http\Response
     */
    public function destroy(KafeelGift $kafeelGift)
    {
        //
    }
}
