<!DOCTYPE html>
<html
{{--    lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}"--}}
>

<head>
    <meta charset="UTF-8">
    <title>@yield('title', __('home.body.alKafeel_museum'))</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="@yield('og-title', __('home.body.alKafeel_museum')))" />
    <!-- <meta property="og:image" content="https://museum.alkafeel.net/assets/images/resources/logo.png"/> -->
    <meta property="og:image" content="@yield('og-image', 'https://museum.alkafeel.net/assets/images/resources/logo.png')"/>
    <meta property="og:description" content="{{__('home.body.alKafeel_museum')}}"/>
    <meta property="og:url" content="https://museum.alkafeel.net" />
    <meta property="og:type" content="website" />

    
    


    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}


    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-animate.css')}}">
{{--    --}}
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style_v3.css?v=21122311123283')}}">

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/images-grid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/justifiedGallery.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'ltr')
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.css')}}">

    @endif
    @yield('style-cu')
</head>

<body>

<div class="boxed_wrapper">

   @include('includes.header')

    @yield('content')

</div>

<button class="scroll-top scroll-to-target" data-target="html">
    <span>
    <i class="fa fa-2x fa-arrow-up" aria-hidden="true" class="mt-3"></i>
</span>
</button>

@php
    $st = '...'
@endphp
@if (isset($about->about) && $about->about != '')
    @php $st = mb_substr($about->about, 0, 200, 'utf-8').'...' @endphp
@elseif (isset($about) && $about != '')
    @php $st = $about @endphp
@endif

@include('includes.footer', ['about' => $st ])

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/jquery.justifiedGallery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl.js')}}"></script>
<script src="{{asset('assets/js/wow.js')}}"></script>
<script src="{{asset('assets/js/custom.js?v=15')}}"></script>
<script src="{{asset('assets/js/fancybox.umd.js')}}"></script>

</body>


</html>
