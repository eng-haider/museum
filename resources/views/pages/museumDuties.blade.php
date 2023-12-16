@extends('layouts.layout')

@section('content')
<section class="breadcrumb-area" style="background-image:url({{asset('assets/images/resources/duties.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>{{__('home.header.the_structure_of_the_museum')}}</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>
                            <li class="active">{{__('home.header.the_structure_of_the_museum')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h4 style="color: #5A5454" class="text-center mt-4">
            {{__('home.body.kafeel_museum')}}
        </h4>

        <h1 style="color: #303030;" class="text-center mt-2">
            مهام المتحف (Museum duties)
        </h1>

        <div class="row mt-4 justify-content-center">

            @foreach($structures as $structure)
            <div class="col-md-10 mb-3 cartShowLite">
                <div class="d-flex flex-column justify-content-center">

                <div>
                        <h3 class="text-center mt-3 font-weight-bold text-dark">
                            {{$structure->title}}
                        </h3>
                    </div>

                    <div>
                        <h5 class="text-center p-2 pb-4 mt-1">
                            {{$structure->text}} </h5>
                    </div>
                    <div class="d-flex mt-2 justify-content-center mt-3">
                        
                        <img class="rounded" src="{{asset('upload/structure/thumb/'.$structure->photo)}}">
                    </div>
                    
                 
                 

                </div>

            </div>
            @endforeach
        </div>


    </div>

</section>

<section class="container mt-5 mb-3">
    <h2 class="text-center mt-4" style="color: #1C1C1C">{{__('home.body.you_may_also_like')}}ً</h2>

    <div class="row">
        <span class="circle mx-3 mt-3"></span>
        <h2>{{__('home.body.precious_department')}}</h2>
    </div>

    <div class="row mt-4 justify-content-center ">

        @foreach($subjects as $subject)

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

</section>
@endsection
