@extends('layouts.layout')

@section('content')

    <div class=" m-4 ">
        <h3 class="text-center  my-4" style="font-size: 40px;color: #303030;font-weight: 900;">{{__('home.body.kafeel_gift')}}</h3>
        <div class="container">
            <div class="row justify-content-between">
                @foreach($kafeelGifts as $kafeelGift)
                    <div class="col-sm-6 col-xl-4  mt-4  single-event-box">
                        <div class="img-holder">
                            <div class="inner">
                                <img src="{{asset('upload/kafeelGift/370/'.$kafeelGift->image)}}" alt="">
                                <div class="overlay-style-one bg2"></div>
                            </div>
                            <!--<div class="date-box">-->
                                <!-- <div class="left">{{$kafeelGift->price}}</div> -->
                                <!--<div class="right">-->
                                <!--    <h6>{{$kafeelGift->title}}</h6>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>
                        <div class="title-holder">
                            <div class="inner">
                                <h3><a href="{{route('giftMuseumId',$kafeelGift->id)}}">{{Str::limit($kafeelGift->title,80)}}</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

        <div class="d-flex justify-content-center my-5">
            <div class="mx-auto overflow-auto"  dir="ltr">
                {{ $kafeelGifts->links() }}
            </div>
        </div>


@endsection
