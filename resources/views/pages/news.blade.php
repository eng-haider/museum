@extends('layouts.layout')

@section('content')

<div class=" m-4 ">
    <h3 class="text-center  my-4" style="color: #303030;">{{__('home.body.news_and_activities')}}</h3>
    <div class="container">
        <div class="row justify-content-between">
            @foreach($news as $new)
                <div  class="col-sm-6 col-xl-4  mt-4 single-event-box">
                <a href="{{route('newsId',$new->id)}}">
                    <div class="img-holder">
                        <div class="inner">
                            <img src="{{asset('upload/news2/370/'.$new->photo)}}" alt="">
                            <div class="overlay-style-one bg2"></div>
                        </div>
                    </div>
                    <div style="box-shadow: 0px 5px 50px rgba(0, 0, 0, 0.15);" class="title-holder p-4 rounded text-center d-flex flex-column justify-content-center align-items-center bg-white ">

                        <h5>
                            <a  href="#" style="color: #303030;">{{Str::limit($new->title,90)}}</a>
                        </h5>

                        <h5 class="mt-2" style="color: #6E6E6E">{{Str::limit($new->more,50)}}</h5>
                        <div  style="background: #2D353D;" class="rounded mt-2 text-center">
                            <a href="{{route('newsId',$new->id)}}" class=" p-2 text-white ">
                                {{__('home.body.read_news')}}
                            </a></div>
                    </div>

                </a>
                  </div>
            @endforeach
        </div>

    </div>
    </div>

   <div class="d-flex justify-content-center my-5">
     <div class="mx-auto overflow-auto"  dir="ltr">
        {{ $news->links() }}
     </div>
   </div>


@endsection
