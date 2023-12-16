@extends('layouts.layout')

@section('content')

    <div class="container">

        <div  class="row mt-3 justify-content-center">

            <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="blog-details-content">
                        <div class="img-holder">
                            <img src="{{asset('upload/kafeelGift/770/'.$kafeelGift->image)}}" alt="">
                        </div>
                        <div class="mx-0 text-holder">
                            <ul class="meta-info">
                                <li><a href="#">{{$kafeelGift->created_at}}</a></li>

                            </ul>
                            <h2 class="blog-title"> {{$kafeelGift->title}}
                            </h2>
                            <div class="text">
                                <p class="mar-bottom">{{$kafeelGift->detail}}</p>
                            </div>
                        </div>

                    </div>



                </div>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">

                <div class="sidebar-wrapper">

                    <div class="sidebar-search-box">
                        <form class="search-form" action="{{route('giftMuseumId',$kafeelGift->id)}}">
                            <input  placeholder="البحث" type="text" id="simple-search" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" >
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>


                    <div class="single-sidebar">
                        <div class="title">
                            <h3>قطع ذات صله  </h3>
                        </div>
                        @foreach($kafeelGifts as $ne)
                           <a href="{{route('giftMuseumId',$ne->id)}}">
                               <div class=" d-flex align-items-center mt-2  flex-xl-row justify-content-sm-start">

                                   <div style="width:400px;height:101px">
                                       <img   src="{{asset('upload/kafeelGift/150/'.$ne->image)}}" style="width:100%;height:100%">
                                   </div>

                                   <div class="  " style="width:420px;height:101px">
                                       <div class="d-flex flex-row align-items-center   mt-3 mx-2">
                                             <h6 class="mx-2 mt-2" style="color: #303030;">{{Str::limit($ne->title,50)}}</h6>
                                       </div>
                                       <p class="mx-2 mt-1  text-sm-right " style="color: #303030;"></p>

                                   </div>
                               </div>
                           </a>

                        @endforeach
                    </div>



                </div>
            </div>

        </div>

    </div>

@endsection
