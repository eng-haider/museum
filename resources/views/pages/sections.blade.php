@extends('layouts.layout')


@section('content')

    <section class="container ">
        <div class="d-flex flex-row  align-items-center mt-4">
            <span class="triangle2 mx-2"></span>
            <h4 class="" style="color: #5D646A;">{{$mainSections->title }} </h4>
        </div>

        <div class="container">
            <div class="row  justify-content-center ">

                @foreach($sections as $section )

                    <div class="col-12 col-sm-6 col-md-5  col-lg-4   col-xl-3 my-3">

                        <a href="{{route('detailSection',$section->id)}}">

                            <div class="  rounded"
                                 style=" height:200px; background-image:url({{asset('assets/images/resources/preciousDepartment/image27.jpg')}})">

                                <div class="" style="
                background: rgba(44, 40, 40, 0.67);
                 position: absolute;
                   bottom: 0;
                   width: 90%;
                ">
                                    <div class=" p-2 d-flex flex-row align-items-center justify-content-center ">

                                        <span class="triangle mx-2"></span>

                                        <h3 class=" mx-2" style="color: #FFFFFF"> {{$section->title}} </h3>

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
