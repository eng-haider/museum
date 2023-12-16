@extends('layouts.layout', ['about' => Str::limit($about->about,200)])

@section('content')
<section class="breadcrumb-area" style="background-image:url('{{ asset('assets/images/resources/contact2.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title">
                        <h1>{{__('home.header.call_us')}}</h1>
                    </div>
                    <div class="breadcrumb-menu">
                        <ul class="clearfix">
                            <li><a href="{{route('home')}}">{{__('home.header.main')}}</a></li>
                            <li class="active">{{__('home.body.call')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="boxed_wrapper">



<!--End breadcrumb area-->

<!--Start Contact Form Section-->
<section class="contact-form-area">
    <div class="auto-container">
        <div class="sec-title text-center">
            <div class="big-title">
                <h1>{{__('home.header.call_us')}}</h1>
            </div>
            
            <p>للحصول على اسئلة او استفسار اتصل على رقم الهاتف او البريد الالكرتوني ، او قم بزيارة المتحف في الموقع المدرج ادناه</p>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if($errors->count()>0)
            <div class="aler alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="row clearfix">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="contact-form">
                    <div class="inner-box">

                        <form id="contact-form" name="contact_form" class="default-form2" action="{{route('contactSend')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="input-box">
                                        <input type="text" name="name" value="" placeholder="الاسم" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input-box">
                                        <input type="email" name="email" value="" placeholder="البريد الالكتروني" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="input-box">
                                        <input type="text" name="subject" value="" placeholder="موضوع">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input-box">
                                        <input type="text" name="phone" value="" placeholder="رقم الهاتف">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--<div class="col-sm-12">-->
                                    <label for="file" class="col-sm-2">ملف</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="file" accept="image/*, .pdf" class="form-control" >
                                    </div>
                                <!--</div>-->
                            </div>
                            <div class="row mt-4">
                                <div class="col-xl-12">
                                    <div class="input-box">
                                        <textarea name="message" required="" placeholder="نص الرساله..." ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="button-box text-center">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button type="submit" data-loading-text="Please wait...">ارسال</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--End Contact Form Section-->


</div>


<button class="scroll-top scroll-to-target" data-target="html">
<span class="icon-angle"></span>
</button>

@endsection
