@extends('layouts.layout')

@section('content')

<div class="boxed_wrapper">


<section class="breadcrumb-area" style="background-image: url(images/resources/breadcrumb-4.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>اتصل بنا</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="#">الرئيسية</a></li>
                            <li class="active">اتصل</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-single-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">
                <div class="blog-post">
                    <div class="blog-details-content">
                        <div class="img-holder">
                            <img src="{{asset('assets/images/resources/preciousDepartment/blog/bs.jpg')}}" alt="Awesome Image">
                        </div>
                        <div class="text-holder">
                            <ul class="meta-info">
                                <li><a href="#">2 ايلول 2022</a></li>
                                <li><a href="#">03 مشاهدة </a></li>
                                <li><a href="#">03 مشاركة</a></li>
                            </ul>
                            <h2 class="blog-title">وفد من فناني الخط والتذهيب في متحف الكفيل
                            </h2>
                            <div class="text">
                                <p class="mar-bottom">زار وفد من تركيا متحف الكفيل للنفائس والمخطوطات مؤلف من خطاطين ومزخرفين ومذهبين وبرفقة مزخرفين اخرين من الجمهورية الإسلامية في ايران برئاسة الأستاذ عوني النقاشي يوم الاثنين الموافق 1/8/2022م المصادف 2 محرم الحرام 1444هـ</p>
                                <p>وكان في استقبالهم معاون رئيس قسم متحف الكفيل الأستاذ الدكتور شوقي الموسوي الذي رافقهم في جولة ميدانية بين أروقة قاعة العرض للتعريف بالقطع المتحفية التي جاءت بمثابة سياحة تراثية في التاريخ والثقافة .
                                    وقد صرح الأستاذ عوني النقاشي "تشرفنا في هذا اليوم المبارك الثاني من محرم الحرام بزيارة</p>
                            </div>
                        </div>
                       
                    </div>

                    <!--Start tag box-->
                    <div class="tag-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tag pull-right">
                                    <p><span>كلمات مفتاحية :</span>الامام الحسين ، محرم ، معرض ، سيوف </p>
                                </div>
                                <div class="right pull-left">
                                    <p>مشاركة الموضوع  :</p>
                                    <ul class="sociallinks-style-two float-right fix">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-4 col-lg-5 col-md-9 col-sm-12">
                <div class="sidebar-wrapper">

                    <div class="sidebar-search-box">
                        <form class="search-form" action="#">
                            <input placeholder="البحث" type="text">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <div class="title">
                            <h3>التصنيفات </h3>
                        </div>
                        <ul class="categories clearfix">
                            <li><a href="#">السيوف</a></li>
                            <li><a href="#">الدروع</a></li>
                            <li><a href="#">النفائس</a></li>
                            <li><a href="#">السجاد</a></li>
                            <li><a href="#">البنادق</a></li>
                        </ul>
                    </div>

                    <div class="single-sidebar">
                        <div class="title">
                            <h3>اخر الاخبار</h3>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post-carousel owl-carousel owl-theme owl-nav-style-one">

                                <div class="single-recent-post">
                                    <div class="img-holder">
                                        <img src="{{asset('assets/images/resources/preciousDepartment/n1.jpg')}}" alt="Awesome Image">
                                        <div class="overlay-style-one bg1"></div>
                                    </div>
                                    <div class="title-holder text-center">
                                        <p>شوال 2022 10</p>
                                        <h3><a href="#">سياحة تراثية في التاريخ والثقافة . وقد صرح الأستاذ </a></h3>
                                    </div>
                                </div>

                                <div class="single-recent-post">
                                    <div class="img-holder">
                                        <img src="{{asset('assets/images/resources/preciousDepartment/b2.jpg')}}" alt="Awesome Image">
                                        <div class="overlay-style-one bg1"></div>
                                    </div>
                                    <div class="title-holder text-center">
                                        <p>شوال 2022 30</p>
                                        <h3><a href="#">معاون رئيس قسم متحف الكفيل الأستاذ الدكتور شوقي الموسوي</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>


        </div>
    </div>
</section>


</div>


<button class="scroll-top scroll-to-target" data-target="html">
<span class="icon-angle"></span>

@endsection
