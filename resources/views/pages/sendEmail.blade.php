<!DOCTYPE html>
<html
\>

<head>
    <meta charset="UTF-8">
    <title>Alkafeel Museum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/images-grid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/justifiedGallery.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

    @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'ltr')
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.css')}}">

    @endif

</head>

<body>

<div class="boxed_wrapper">

<h1>{{$details['name']}}</h1>
<h1>{{$details['email']}}</h1>
<h1>{{$details['phone']}}</h1>
<h1>{{$details['subject']}}</h1>
<h1>{{$details['message']}}</h1>
</div>



</body>
</html>
