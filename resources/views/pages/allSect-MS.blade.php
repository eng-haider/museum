@extends('layouts.layout')


@section('content')
<section class="breadcrumb-area" style="background-image:url('{{ asset('assets/images/resources/allsec.jpg')}}');padding: 180px 0 30px !important;" >
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
                            <li class="active">الكل</li>
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
            @if(count($mainSection->sections)>1)
                    <a  class="badge  px-4 py-1 mx-2 mb-2 hovea" style=" background-color: #e4b33d"><h4 class="text-white">
                            {{__('home.body.showNafess')}}</h4>
                    </a>

                 

                    @else
                    @foreach($mainSection->sections as $sectio)
                
                        <a   style="    background-color: #e4b33d;
}

                            " class="badge  px-4 py-1 mx-2 mb-2 hovea" >
                            <h4 class="text-white">{{$sectio->title}}</h4>
                        </a>
                 
                    @endforeach()

                    @endif
                   




                    @foreach($mainSection->sections as $sectio)
                    @if(count($mainSection->sections)>1)
                        <a href="{{route('detailSection',$sectio->id)}}"  style="

                            " class="badge  px-4 py-1 mx-2 mb-2 hovea" >
                            <h4 class="text-white">{{$sectio->title}}</h4>
                        </a>
                        @endif
                    @endforeach()


            </div>

            @foreach($mainSection->sections->slice(0,1) as $section)
                @if($mainSection->title != $section->title)

                    <div class=" d-flex flex-row align-items-center">
                        <span class="triangle"></span>
                        <h2 class="text-dark mx-2 font-weight-bold">{{$mainSection->title}} </h2>
                    </div>

                @endif
            @endforeach

            <div>
                <div class="row mt-4 justify-content-center">
                @foreach($mainSection->sections as $section)

                    @foreach($section->subjects as $subjec)
                            <div class="mx-0  mt-4 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                                <div class="radius-x">
                                    <a  href="{{route('nafessDetails',$subjec->id)}}">
                                        <img src="{{asset('upload/large/'.$subjec->photo)}}">

                                    </a>
                                    <p class="">{{ Str::limit($subjec->more,60) }}</p>
                                </div>
                                <div class="d-flex  justify-content-center">
                                    <div class="d-flex mx-md-2 align-items-center">
                                        <img src="{{asset('assets/images/icon/info1.png')}}" alt="" class="mx-2">
                                        <h6 >{{$subjec->sections->title}}</h6>
                                    </div>
                                    <div class="d-flex mx-md-2 align-items-center">
                                        <img src="{{asset('assets/images/icon/eye1.png')}}" alt="" class="mx-2">
                                        <h6>{{$subjec->views}} مشاهدات </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                @endforeach()
                </div>

            </div>

        </div>

    </section>

@endsection