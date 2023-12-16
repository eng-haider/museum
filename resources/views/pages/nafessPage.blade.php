@extends('layouts.layout')


@section('content')
<!--<section class="breadcrumb-area" style="background-image:url('{{ asset('assets/images/resources/contact.jpg')}}')">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-12">-->
<!--                <div class="inner-content clearfix">-->
<!--                    <div class="title">-->
<!--                        <h1>{{__('home.header.precious')}}</h1>-->
<!--                    </div>-->
<!--                    <div class="breadcrumb-menu">-->
<!--                        <ul class="clearfix">-->
<!--                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>-->
<!--                            <li class="active">{{__('home.header.precious')}}</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="container ">
    <div class="d-flex flex-row  mt-4">
        <span class="triangle2 mx-2"></span>
        <h2 class="" style="font-size:20px;color: #5D646A;">{{__('home.body.precious_departments')}} </h2>
    </div>

    <div class="container">
    <div class="row  justify-content-center ">

        @foreach($mainSections as $mainSection )

            <div class="col-12 col-sm-6 col-md-5  col-lg-4   col-xl-3 my-3">

                <a href="{{route('allSections',$mainSection->id)}}">

                    <div class="  rounded"
                     style=" height:200px; background-image:url({{asset('upload/main_sec/270/'.$mainSection->photo)}})">

                    <div  class="card-nafess">
                        <div class=" p-2 d-flex flex-row align-items-center justify-content-center ">

                            <span class="triangle mx-2"></span>

                            <h3 class=" mx-2" style="color: #FFFFFF"> {{$mainSection->title}} </h3>

                        </div>

                    </div>
                </div>

                </a>

            </div>
            @endforeach



    </div>
    </div>
</section>

@endsection
