@extends('layouts.layout')

@section('content')

<div class="">

    <section class="container ">

        <div class="d-flex flex-row align-items-center m-4">

            <div class="d-flex flex-row align-items-center">

                @if(empty($subjec->sections->mainSections->title))
                <h4></h4>
                @else
                <span class=" mx-2 circle"></span>

                <h4 class="font-weight-bold mx-3" ><a style="color: #5D646A;" href="{{route('allSections',$subjec->sections->mainSections->id)}}">{{$subjec->sections->mainSections->title}}</a>
                </h4>
                @endif


            </div>

            <div class="d-flex  flex-row align-items-center">
                <span class=" mx-2 triangle2"></span>
                <h4 class="" style="color: #5D646A;">{{$subjec->sections->title}}</h4>
            </div>

        </div>

        <div class="row m-4 ">
            <div class="overScroll col-sm-12 col-lg-4 mb-3 p-3">
                

                <div class="d-flex justify-content-between flex-column">
                    <div class="d-flex flex-row  align-items-start">
                        <span class="mx-2 triangle"></span>
                        <h3 class="text-white">الرقم المتحفي :</h3>
                    </div>
                
                    <div class="d-flex" style="flex-direction: row-reverse;border-bottom: 1px dashed #ccc;padding-bottom: 8px;">
                        <h3 class="text-white">{{$subjec->id}}</h3>
                    </div>
                </div>
                    
                @foreach($subjec->inputSubjects as $inputs)
                    @if($inputs->val !== 'بلا')
                    <div class="my-4 d-flex justify-content-between flex-column">
                        <div class="d-flex flex-row  align-items-start">
                            <span class="mx-2 triangle"></span>
                            <h3 class="text-white">{{$inputs->spec}}:</h3>
                        </div>
                        <div class="d-flex cu-sub" style="flex-direction: row-reverse;border-bottom: 1px dashed #ccc;padding-bottom: 8px;">
                            <h3 class="text-secondary" style="font-size:18px !important; color: #fff !important;
    position: relative !important;
    bottom: 2px !important;">{{$inputs->val}}</h3>
                        </div>
                    </div>
                    @endif
                @endforeach

                
                <div class="d-flex my-3 flex-row justify-content-between ">

                    <div class="d-flex flex-row  align-items-center ">
                        <!--<span class="mx-2 triangle"></span>-->
                        <h3 class="text-white">وصف القطعة:</h3>
                    </div>

                </div>


                <div class="d-flex my-3 flex-row justify-content-between ">

                    <div class="d-flex flex-row  align-items-center ">

                    </div>
                    <div class="">
                        <h3 class="text-white">{{$subjec->more}}</h3>
                    </div>
                </div>


            </div>

            <div class=" col-sm-12 col-lg-8 mb-3 mt-3 mt-lg-0 ">
                <div class="">
                    <a data-fancybox="gallery" href="{{asset('upload/large/'.$subjec->photo)}}">
                    <img class="  " src="{{asset('upload/large/'.$subjec->photo)}}">
                    </a>

                </div>
            </div>

        </div>
    </section>
    @if(empty($subjec->sections->mainSections->title))
    <section class=" mb-3 latest-blog-area mt-5">
        <div class="container">
            <div class="d-flex flex-row align-items-center">
                <span class="triangle"></span>
                <h2 class="text-dark mx-2 font-weight-bold">اخر النفائس القسم </h2>
            </div>
            <div class="row mt-4 justify-content-center ">
                @foreach($subjec->sections->subjects as $subject)

                <div class="mx-0 mt-4 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="radius-x">

                        <a href="{{route('nafessDetails',$subject->id)}}">
                            <img src="{{asset('upload/large/'.$subject->photo)}}">
                        </a>

                        <p class="">{{ Str::limit($subject->more,60) }}</p>

                    </div>

                    <div class="d-flex  justify-content-center">

                        <div class="d-flex mx-md-2 align-items-center">
                            <img src="{{asset('assets/images/icon/info1.png')}}" alt="" class="mx-2">
                            <h6>{{$subject->sections->title}}</h6>
                        </div>

                        <div class="d-flex mx-md-2 align-items-center">
                            <img src="{{asset('assets/images/icon/eye1.png')}}" alt="" class="mx-2">
                            <h6>{{$subject->views}} مشاهدات </h6>
                        </div>

                    </div>
                </div>

                @endforeach



            </div>

        </div>

    </section>

    @else
    <section class=" mb-3 latest-blog-area mt-5">
        <div class="container">
            <div class="d-flex flex-row align-items-center">
                <span class="triangle"></span>
                <h2 class="text-dark mx-2 font-weight-bold">اخر نفائس القسم </h2>
            </div>
            <div class="row mt-4 justify-content-center ">

                @foreach($subjec->sections->mainSections->sections as $section)
                @foreach($section->subjects as $subject)

                <div class="mx-0 mt-4 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                    <div class="radius-x">

                        <a href="{{route('nafessDetails',$subject->id)}}">
                            <img src="{{asset('upload/large/'.$subject->photo)}}">
                        </a>

                        <p class="">{{ Str::limit($subject->more,60) }}</p>

                    </div>

                    <div class="d-flex  justify-content-center">

                        <div class="d-flex mx-md-2 align-items-center">
                            <img src="{{asset('assets/images/icon/info1.png')}}" alt="" class="mx-2">
                            <h6>{{$subject->sections->title}}</h6>
                        </div>

                        <div class="d-flex mx-md-2 align-items-center">
                            <img src="{{asset('assets/images/icon/eye1.png')}}" alt="" class="mx-2">
                            <h6>{{$subject->views}} مشاهدات </h6>
                        </div>

                    </div>
                </div>

                @endforeach
                @endforeach


            </div>

        </div>

    </section>
    @endif

    <section class="m-5">
        <h2 class="text-center mt-4" style="color: #1C1C1C">{{__('home.body.you_may_also_like')}}ً</h2>

        <div class="container mt-4 mb-4">
            <div class="">

                <div class="row">
                    <span class="circle mx-3 mt-3"></span>
                    <h2>{{__('home.body.kafeel_gift')}}</h2>

                </div>

                <div class="mx-2">
                    <p class="mx-4">{{__('home.body.direct_selling')}}</p>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="event-carousel owl-carousel owl-theme owl-dot-style1">

                        @foreach($kafeelGifts as $kafeelGift)
                        <div class="item" style="display: none">
                            <div class="single-event-box">
                                <div class="img-holder">
                                    <div class="inner">
                                        <img src="{{asset('upload/kafeelGift/370/'.$kafeelGift->image)}}" alt=" ">
                                        <div class="overlay-style-one bg2"></div>
                                    </div>
                                </div>
                                <div class="title-holder">
                                    <div class="inner">
                                        <h3><a href="{{route('giftMuseumId',$kafeelGift->id)}}">{{Str::limit($kafeelGift->title,50)}}</a><i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>


        </div>


    </section>

    <section class="container">

        <div class="">
            <div class="container">
                <div class="d-flex justify-content-start">

                    <span class="circle mx-3 mt-3"></span>
                    <h2>{{__('home.body.panorama_section')}}</h2>
                </div>
                <div class="d-flex justify-content-start">
                    <p>{{__('home.body.tour_VR_tech')}}</p>
                </div>
            </div>
            <a href="https://alkafeel.net/panorama/?lang=ar&scene=607d8938a5c45c1ccb1f4143">
                <div class="d-flex justify-content-center ">
                    <img src="{{asset('assets/images/resources/preciousDepartment/rectangle89.jpg')}}">
                </div>
            </a>
        </div>

    </section>

</div>
@endsection

