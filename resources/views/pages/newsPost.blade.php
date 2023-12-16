@extends('layouts.layout')

@section('title'){!! $new->title !!} @stop
@section('og-title'){!! $new->title !!} @stop
@section('og-image'){{asset('upload/news2/770/'.$new->photo)}}@stop

@section('content')
<!-- <section class="breadcrumb-area" style="background-image:url('{{ asset('assets/images/resources/contact.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>{{__('home.header.news')}}</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>
                            <li class="active">{{__('home.header.news')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br> -->
    <div class="container mt-4">

        <div  class="row mt-3 justify-content-center">

        <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                        <div class="blog-post">
                            <div class="blog-details-content">
                                <h2 class="blog-title mb-3">{{$new->title}}</h2>
                                <div class="img-holder">
                                    <img src="{{asset('upload/news2/770/'.$new->photo)}}" alt="" style="height:100%;">
                                </div>
                                <div class="mx-0 text-holder">
                                    <ul class="meta-info">
                                        <li><a href="#">{{$new->time}}</a></li>
                                        <li><a href="#">{{$new->views}} مشاهدة </a></li>
                                        <ul class="pull-left">
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{route('newsId', $new->id)}}"><i style="color:#000" class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?text={{route('newsId', $new->id)}}"><i style="color:#000" class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="https://telegram.me/share/?url={{route('newsId', $new->id)}}"><i style="color:#000" class="fa fa-telegram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </ul>
                                    

                                    <div class="text pt-0">
                                        <p class="mar-bottom">{!!nl2br(e($new->text))!!}</p>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                
								<div class="img_attach">
									@if ($new->images)
										@foreach(json_decode($new->images) as $img)
                                            <a data-fancybox="gallery"  href="{{asset('upload/news2/'.$img->image)}}">
												<img class="cover-parallax m-2" style="max-width: 340px" src="{{asset('upload/news2/attach_340/'.$img->image)}}" alt="">
											</a>
										@endforeach
									@endif
								</div>
							</div>

                            <!--Start tag box-->
                            <div class="tag-box">
                                <div class="row">
                                    <div class="col-md-12">

                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

            <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">

                        <div class="sidebar-wrapper">

                            <div class="sidebar-search-box">
                                <form class="search-form" action="{{route('search')}}">
                                    <input placeholder="البحث" type="text" id="simple-search" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" >
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>


                            <div class="single-sidebar">
                                <div class="title mb-4">
                                    <h3>اخر الاخبار</h3>
                                </div>
                                @foreach($news as $ne)
                                   <a href="{{route('newsId',$ne->id)}}">
                                       <div class=" d-flex align-items-center mt-2  flex-xl-row justify-content-sm-start">

                                           <div style="height: 101px;width:130px;">
                                               <img style="height:100%;width:100%" class=""   src="{{asset('upload/news2/120/'.$ne->photo)}}">
                                           </div>

                                           <div class="  ">
                                               <div class="d-flex flex-row align-items-center   mt-3 mx-2">
                                                   <img class="mt-2" style="height: 20px;width:15px;"  src="{{asset('assets/images/icon/date.png')}}">
                                                   <h6 class="mx-2 mt-2" style="color: #6E6E6E;">{{$ne->time}}</h6>
                                               </div>
                                               <p class="mx-2 mt-1  text-sm-right " style="color: #303030;">{{Str::limit($ne->title,55)}}</p>

                                           </div>
                                       </div>
                                   </a>

                                @endforeach
                            </div>
                            <div class="single-sidebar">
                                <div class="title mb-4 pb-2">
                                    <h3>التصنيفات </h3>
                                </div>
                                @foreach($mainSections as $mainSection)
                                    <ul class="categories m-1 clearfix">
                                        <li><a href="{{route('allSections',$mainSection->id)}}">{{$mainSection->title}}</a></li>
                                    </ul>
                                @endforeach

                            </div>



                        </div>
                    </div>

        </div>

    </div>

@endsection
