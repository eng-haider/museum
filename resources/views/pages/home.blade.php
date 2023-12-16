@extends('layouts.layout', ['about' => Str::limit($about->about,200)])

@section('content')

    <section class="main-slider style1">
        <div class="main-cover" style="background-position: center center;background-image: url({{asset('assets/images/slides/c10.jpg')}});">
            <div class="main-dis" style="height: 60vh;">
                <div class="g-bg">
                    <img src="{{asset('assets/images/resources/alkafeel.svg')}}" alt="">
                    <h1 class="text-dark">{{__('home.body.alKafeel_museum')}}</h1>
                    <h2 class="text-dark">{{__('home.body.dear_visitors')}}</h2>
                </div>
            </div>
        </div>
    </div>


    <div onclick="myscroll()" class="mouse-btn-down scroll-to-explore" data-target=".exhibitions-area"></div>

</section>

<section class="intro-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="intro-box">

                    <div class="inner-content">
                        <h3>{{__('home.body.manuscripts')}}</h3>
                        <p>{{Str::limit($about->about,200)}}</p>
                        <a class="btn-one" href="{{route('about')}}">{{__('home.body.read_more')}}</a>
                    </div>

                    <div class="plan-your-visit">
                        <h2>{{__('home.body.visit_museum')}}<a href="#"><i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a></h2>
                        <ul>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-clock"></span>
                                </div>
                                <div class="title-holder">
                                    <h3>{{__('home.body.work_museum')}} </h3>
                                    <p>{{__('home.body.daily_museum')}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-holder">
                                    <span class="flaticon-placeholder"></span>
                                </div>
                                <div class="title-holder">
                                    <h3>{{__('home.body.al_Abbas')}}</h3>
                                    <p>{{__('home.body.inside_the_courtyard')}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog-area" style="direction:rtl;">
    <div class="container inner-content">
        <div class="row ltr">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                <div class="latest-blog-title">
                    <div class="sec-title">
                        <p>{{__('home.body.latest_news')}} </p>
                        <div class="big-title">
                            <h1> {{__('home.body.news_and_activities')}} </h1>
                        </div>
                    </div>
                    <div class="text">
                        <!-- <p>{{__('home.body.determining_the_dates')}}</p> -->
                        <a href="{{ route('news') }}"> {{__('home.body.read_more')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                <div class="blog-carousel owl-carousel owl-theme owl-nav-style-one">

                    @foreach($news as $new)
                        <div class="item" style="display: none">
                        <div class="single-blog-post wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <a href="{{route('newsId',$new->id)}}">
                                <div class="img-holder">

                                    <img src="{{asset('upload/news2/370/'.$new->photo)}}" alt="">
                                    <div class="overlay-style-one bg1"></div>

                                </div>
                                <div class="text-holder">
                                    <div class="post-date">
                                        <span class="text-dark">{{$new->time}} </span>
                                    </div>
                                    <h3 class="blog-title"><a
                                            href="{{route('newsId',$new->id)}}">{{Str::limit($new->title,50)}} </a></h3>
                                    <div class="text text-right">
                                        {{Str::limit($new->more,90)}}</div>
                                    <div class="button-box">
                                        <a href="{{route('newsId',$new->id)}}">{{__('home.body.read_news')}}</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-4">
    <div class="sec-title text-center">
        <!-- <p>{{__('home.body.numerical')}}</p> -->
        <div class="big-title">
            <a href="{{route('mainSections')}}">
                <h1> {{__('home.body.museum_collections')}}</h1>
            </a>
        </div>
        <div class="row">
            @foreach($mainSections as $section)
            <div class="col-lg-3 col-6 col-sm-4">
                <a href="{{route('allSections',$section->id)}}">
                    <div class="single {{$section->bg}} my-3">
                        @if ($section->photo)
                            <img class="img-thumbnail mb-2" src="{{asset('upload/main_sec/100/'.$section->photo)}}" alt="">
                        @endif
                        <h4>{{$section->title}}</h4>
                    </div>
                </a>
            </div>
            @endforeach


        </div>

    </div>
</div>


<section class="  latest-blog-area mt-5">
    <div class="container">
        <div class="d-flex flex-row align-items-center">
            <span class="triangle"></span>
            <h2 class="text-dark mx-2 font-weight-bold"> {{__('home.body.nafess')}} </h2>
        </div>
        <div class="row mt-4 justify-content-center">

            @foreach($subjects as $subject)


            <div class="mx-0  mt-4 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="radius-x">
                    <a href="{{route('nafessDetails',$subject->id)}}">
                        <img src="{{asset('upload/large/270/'.$subject->photo)}}">

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

<div class="container-fluid">
 <div class="row">
  <div class="component w-100">

  <h2 class="cu-size"><span class="text-dark">اصدارات  </span>
  <a href="https://museum.alkafeel.net/magazines">
    <span class="f-52 my-3">متحف الكفيل</span> </a>
</h2>
   <div class="container">
    <ul class="align">
      <li>
        <figure class='book'>        
           Front 
          <ul class='hardcover_front'>
            <li>
            <img src="{{asset('assets/images/slides/a.jpg')}}" width="100%" height="100%">

               <span class="ribbon new">الأول</span> 
            </li>
            <li></li>
          </ul>        
           Pages 
          <ul class='page'>
          <li>
                <img src="{{asset('assets/images/slides/d.jpg')}}" width="100%" height="100%">
            </li>
            <li>
                <img src="{{asset('assets/images/slides/b.jpg')}}" width="100%" height="100%">
            </li>
            <li>
                <img src="{{asset('assets/images/slides/c.jpg')}}" width="100%" height="100%">
            </li>
            <li>
                <img src="{{asset('assets/images/slides/g.jpg')}}" width="100%" height="100%">
            </li>
            <li>
                <img src="{{asset('assets/images/slides/d.jpg')}}" width="100%" height="100%">
            </li>
          </ul>        
           Back 
          <ul class='hardcover_back'>
            <li></li>
            <li></li>
          </ul>
          <ul class='book_spine'>
            <li></li>
            <li></li>
          </ul>
          <figcaption
          >
            <h1>مجلة متحف الكفيل</h1>
            <span>الأصدار الأول لمجلة المتحف</span>
            <p>مج
            
            
            لة ثق
            افية نصف سنوية متخصصة بشؤون المتاحف و الاثار تصدر عن متحف الكفيل للنفائس و المخطوطات في العتبة العباسية المقدسة ، الغاية منها حفظ التراث و الموروث الإسلامي ، وتدوين مقتنيات المتحف الثمينة ، وزعت الموضوعات على أبواب متنوعة ، تقدم المجلة ملف العدد الذي يحتوي على عدة دراسات علمية لأقلام أكاديمية مهمة و أخبار و نشاطات و تقارير بالإضافة الى التراث العالمي و تقديم قراءات خاصة للكتب المتحفية و الحوارات الثقافية و المقالات الأدبية الخاصة بالمواقف و البطولات التأريخية التي تخص المولى ابي الفضل العباس عليه السلام .دسة</p>
          <a href="{{asset('upload/pdf/first.pdf')}}" download="first.pdf">    <button type="button" class="btn btn-warning mt-0 border-0 px-3 py-2">تحميل</button>
</a>
          </figcaption>

        </figure>
      </li>
    </ul>  
  </div>
  </div>
 </div>
</div>


 <section class="events-area">
    <div class="container">
        <div class="sec-title">
            <p>{{__('home.body.direct_selling')}}</p>
            <div class="big-title">
                <a href="{{route('kafeelGift')}}">
                    <h1>{{__('home.body.kafeel_gift')}}</h1>
                </a>
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
                                <h3><a href="{{route('giftMuseumId',$kafeelGift->id)}}">{{Str::limit($kafeelGift->title,100)}}</a><i
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

<section class="partner-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">


                <div class="testimonial-style1-box"
                    style="background-image:url('{{ asset('assets/images/blog/tbg2.jpg')}}');">

                    <div class="testimonial-style1-box"
                        style="background-image:url('{{ asset('assets/images/blog/tbg2.jpg')}}');">

                        <div class="top">
                            <div>
                                <div class="title">
                                    <a href="{{route('reviews')}}">
                                        <h1>{{__('home.body.reviews_museum_visitors')}}</h1>

                                    </a>
                                </div>
                                <!--<div class="text">-->
                                <!--    <p> {{__('home.body.for_more_pictures')}}</p>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="botton">
                            <div class="testimonial-carousel owl-carousel owl-theme owl-nav-style-one">
                                @foreach($reviewsMuseums as $reviewsMuseum)
                                <div class="item" style="display: none">
                                <a href="{{route('newsId',$reviewsMuseum->id)}}">
                                    <div class="single-testimonial-style1">
                                        <div class="client-info">
                                            <div class="image-box">
                                                <img src="{{asset('upload/news2/120/'.$reviewsMuseum->photo)}}"
                                                    alt=" ">
                                            </div>
                                            <div class="title-box">
                                                <h3>{{$reviewsMuseum->title}}</h3>

                                            </div>
                                        </div>
                                        <div class="text" style="text-align:right">
                                            {{Str::limit($reviewsMuseum->text,100)}}</div>

                                    </div>

                                </a>
                                </div>
                                @endforeach()

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section   class="container">
       
       <div class="">
         <div class="container">
         <div class="d-flex justify-content-start">
           
           <span  class="circle mx-3 mt-3"></span>
           <h2 >{{__('home.body.panorama_section')}}</h2>
       </div>
       <div class="tour-vr">
           <p >{{__('home.body.tour_VR_tech')}}</p>
       </div>
         </div>
         <a href="https://alkafeel.net/panorama/?lang=ar&scene=63e84c3f641d033b3607473a">
           <div class="d-flex justify-content-center tour-vr ">
               <img src="{{asset('assets/images/resources/preciousDepartment/rectangle89.jpg')}}">
           </div>
           </a>
         </div>
   
       </section>



<section class="latest-blog-area">
    <div class="container  inner-content">
        <div class="row">
            <div class="col container ">
                <div class="row  align-items-center">
                    <span class="circle mx-2"></span>
                    <h2 class="font-weight-bold">{{__('home.body.collectibles_photos')}}</h2>

                </div>
                <!-- <h6 class="mx-3 mt-2 fw-lighter" style="color:#727272;">{{__('home.body.more_pictures')}}</h6> -->

            </div>
            <div>
                <!-- <button type="button" style="background-color:  #336593" class="btn  mt-2" data-bs-toggle="button"
                    autocomplete="off">
                    <h5 style="color: white;padding-left:35px;padding-right:35PX">{{__('home.body.more')}}</h5>
                </button> -->
            </div>
        </div>




</section>

<div class="scroll-g">

<div>

<div class="inner-content">
    <div class="row" style="width: 3000px; box-sizing: border-box; overflow-x: scroll; overflow-y: hidden; background: url({{asset('assets/images/pattern/pattern-bg1.png')}}) #f5f5f5; text-align: left; white-space: nowrap;">
        <div style="width: 730px;">
            @foreach($Gallery->slice(0, 6) as $key => $new)
            <a data-fancybox="gallery" data-src="{{asset('upload/corridors/'.$new->photo)}}">
                <div class="alkafeel_pics_layout<?php echo $key+1; ?>  lazy"
                    :data-src="{{asset('upload/corridors/'.$new->photo)}}" data-was-processed="true"
                    style="background-image: url('{{asset('upload/corridors/370/'.$new->photo)}}');">

                </div>
            </a>
            @endforeach
        </div>

        <div style="width: 730px;">
            @foreach($Gallery2->slice(0, 6) as $key => $new)
            <a data-fancybox="gallery" data-src="{{asset('upload/corridors/'.$new->photo)}}">
                <div class="alkafeel_pics_layout<?php echo $key+1; ?>  lazy"
                    :data-src="{{asset('upload/corridors/'.$new->photo)}}" data-was-processed="true"
                    style="background-image: url('{{asset('upload/corridors/370/'.$new->photo)}}');">

                </div>
            </a>
            @endforeach
        </div>
        <div style="width: 730px;">
            @foreach($Gallery3->slice(0, 6) as $key => $new)
            <a data-fancybox="gallery" data-src="{{asset('upload/corridors/'.$new->photo)}}">
                <div class="alkafeel_pics_layout<?php echo $key+1; ?>  lazy"
                    :data-src="{{asset('upload/corridors/'.$new->photo)}}" data-was-processed="true"
                    style="background-image: url('{{asset('upload/corridors/370/'.$new->photo)}}');">

                </div>
            </a>
            @endforeach
        </div>




        </div>
    </div>











</div>


</div>
@endsection
<script>
function myscroll() {
    const element = document.getElementById("content");
    element.scrollIntoView();
}
</script>