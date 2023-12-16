@extends('layouts.layout')

@section('content')

<section class="breadcrumb-area" style="background-image:url({{asset('assets/images/resources/b-cover2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>{{__('home.header.about_theMuseum')}}</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>
                            <li class="active">{{__('home.header.about_theMuseum')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-style1-area ">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-10">
                <div class="about-style1-left-content clearfix">
                    <div class="img-box">
                        <img src="{{asset('assets/images/resources/about-mu3.jpg')}}" alt="Awesome Image">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="about-style1-content">
                    <div class="sec-title">
                        <p style="font-size: 26px;">نبذة عن متحف</p>
                        <div class="big-title">
                            <h1>{{$about->title}}</h1>
                        </div>
                    </div>
                    <div class="inner-content">
                        <h3 style="font-size: 22px;line-height: 34px;">
                            {!!nl2br(e($about->about))!!}
                        </h3>
                        <div class="bottom-box mb-3">
                            <div class="button">
                                <a class="btn-one" href="/contact">للتواصل</a>
                            </div>
                            <div class="phone-number">
                                <div class="icon"><span class="flaticon-phone-1"></span></div>
                                <div class="title">
                                    <span>المعلومات في اسفل الصفحة</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="featured-area style2 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="featured-box">
                    <div class="title-box">
                        <div class="sec-title">
                            <p>اقسام </p>
                            <div class="big-title">
                                <h1>المتحف</h1>
                            </div>
                        </div>
                    </div>
                    <div class="featured-items">
                        <div class="row">
                            <div class="col-xl-6">
                                <ul>
                                    <li><a href="{{ route('news') }}">الاخبار</a></li>
                                    <li><a href="{{ route('mainSections') }}">النفائس</a></li>
                                    <li><a href="{{ route('mainSections') }}">المقتنيات </a></li>
                                    <li><a href="{{ route('kafeelGift') }}">معرض متحف الكفيل</a></li>
                                    <li><a href="{{ route('detailSection',5) }}">السيوف</a></li>
                                    <li><a href="{{ route('detailSection',6) }}"> الدروع</a></li>
                                </ul>
                            </div>
                            <div class="col-xl-6">
                                <ul>
                                    <li><a href="{{ route('detailSection',7) }}">البنادق</a></li>
                                    <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
                                    <li><a href="{{ route('news') }}">النشاطات</a></li>
                                    <li><a href="https://alkafeel.net/panorama/?lang=ar&scene=607d8938a5c45c1ccb1f4143">قسم البانوراما</a></li>
                                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
