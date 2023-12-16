@extends('layouts.layout')


@section('content')
<section class="breadcrumb-area" style="background-image:url('{{ asset('https://alkafeel.net/photos/imager/790394-%D8%B7%D8%A8%D8%A7%D8%B7%D8%A8%D8%A6%D9%8A.jpg/NDYy')}}');padding: 180px 0 30px !important;" >
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>{{__('home.header.precious')}}</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>
                            <li class="active">{{$section->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="  latest-blog-area mt-5">
                <div class="container">


                <div class="d-flex  m-2 " style="overflow-x: auto;width: 100%">
               
                    @if(empty($section->title))
                        <h4></h4>
                    @elseif(count($section->mainSections->sections)>1)
                        <a href="{{route('allSections',$section->main_sections_id)}}" class="badge  px-4 py-1 mx-2 mb-2 hovea" ><h4 class="text-white">
                                {{__('home.body.showNafess')}}</h4></a>
                        @foreach($section->mainSections->sections as $sectio)

                            <a href="{{route('detailSection',$sectio->id)}}"  style="

                            @if($sectio->id == $section->id)
                            background-color: #e4b33d
                            @endif
                            " class="badge  px-4 py-1 mx-2 mb-2 hovea" >
                                <h4 class="text-white">{{$sectio->title}}</h4>
                            </a>

                        @endforeach()
                    @endif

                </div>


                    <div class=" d-flex flex-row align-items-center">
                        <span class="triangle"></span>
                        <h2 class="text-dark mx-2 font-weight-bold">{{$section->title}} </h2>
                    </div>

                    <div class="row mt-4 justify-content-center">

                @foreach($section->subjects as $subject)

                    <div class="mx-0  mt-4 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <div class="radius-x">
                            <a  href="{{route('nafessDetails',$subject->id)}}">
                                <img src="{{asset('upload/large/'.$subject->photo)}}">

                            </a>
                            <p class="">{{ Str::limit($subject->more,60) }}</p>
                        </div>
                        <div class="d-flex  justify-content-center">
                            <div class="d-flex mx-md-2 align-items-center">
                                <img src="{{asset('assets/images/icon/info1.png')}}" alt="" class="mx-2">
                                <h6 >{{$subject->sections->title}}</h6>
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

@endsection
