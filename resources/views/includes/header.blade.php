<style>
    .current a {color:#FFC107!important}
</style>
<header class="main-header">


    <div class="header-upper">
        <div class="container clearfix">
            <div class="outer-box clearfix">
                <div class="header-upper-right clearfix float-rightt f-l">
                    <div class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('assets/images/resources/logo.png')}}" alt="Awesome Logo" title=""></a>
                    </div>
                </div>
                <div class="header-upper-left  clearfix">
                    <div class="nav-outer clearfix">

                        <nav class="main-menu navbar-expand-lg" style="    margin-right:26px;">
                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li
                                    @if (URL::current() == route('home'))
                                        class="current"
                                    @endif
                                    ><a href="{{route('home')}}">{{__('home.header.main')}}</a>
                                            
                                    </li>
                                    
                                               <li
                                    @if (URL::current() == route('news'))
                                        class="current"
                                    @endif
                                    ><a href="{{ route('news') }}"> {{__('home.header.museum_news')}}</a>
                                    </li>
                                    
                                    
                                    
                                    <li
                                    @if (URL::current() == route('mainSections'))
                                        class="current"
                                    @endif
                                    ><a href="{{route('mainSections')}}">{{__('home.header.precious')}}</a></li>
                                    

                                    <li
                                    @if (URL::current() == route('about'))
                                        class="current"
                                    @endif
                                    ><a href="{{ route('about') }}">{{__('home.header.about_theMuseum')}}</a></li>


                                    <li
                                    @if (URL::current() == route('museumDuties'))
                                        class="current"
                                    @endif
                                    ><a href="{{route('museumDuties')}}">{{__('home.header.the_structure_of_the_museum')}}</a></li>

                         
                         
                             <li
                                    @if (URL::current() == route('reviews'))
                                        class="current"
                                    @endif
                                    ><a href="{{ route('reviews') }}">{{__('home.header.reviews_museum_visitors')}}</a></li>
                                    
                                    
                                       <li
                                    @if (URL::current() == route('reviews'))
                                        class="current"
                                    @endif
                                    ><a href="{{ route('magazines') }}">{{__('home.header.magazine')}}</a></li>
                                    


                                    <li
                                    @if (URL::current() == route('contact'))
                                        class="current"
                                    @endif
                                    ><a href="{{ route('contact') }}">{{__('home.header.call_us')}}</a></li>

                                    <!--<li class="mx-3">-->
                                    <!--    @foreach(config('locales.languages') as $key => $val)-->
                                    <!--        @if ($key != app()->getLocale())-->
                                    <!--            <a href="{{ route('change.language', $key) }}">-->
                                    <!--                <i class="fa fa-globe" aria-hidden="true" class="mx-2"></i>-->

                                    <!--                {{ $val['name'] }}</a>-->
                                    <!--        @endif-->
                                    <!--    @endforeach-->
                                    <!--</li>-->
                                </ul>
                            </div>
                        </nav>

                        <div class="menu-right-content">
                            <div class="outer-search-box-style1">
                                <div class="seach-toggle"><i class="fa fa-search mx-2 mt-2"></i></div>
                                <ul class="search-box">
                                    <li>
                                        <form method="get" action="{{route('search')}}" >
                                            <div class="form-group">
                                                <input type="text" name="keyword" value="{{ old('keyword', request()->input('keyword')) }}" placeholder="{{__('home.header.search')}}" >
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="sticky-header">
        <div class="container">
            <div class="clearfix">

                <div class="logo float-rightt f-l">
                    <a href="{{route('home')}}" class="img-responsive"><img src="{{asset('assets/images/resources/logo.png')}}" alt="" title=""></a>
                </div>

                <div class="left-col ">

                    <nav class="main-menu navbar-expand-lg" style="margin-right: 198px;">
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="dropdown current"><a href="{{route('home')}}">{{__('home.header.main')}}</a>

                                </li>

                                <li><a href="{{ route('about') }}">{{__('home.header.about_theMuseum')}}</a></li>
                                <li><a href="{{route('museumDuties')}}">{{__('home.header.the_structure_of_the_museum')}}</a></li>
                                <li><a href="{{ route('news') }}"> {{__('home.header.museum_news')}}</a></li>
                                <li><a href="{{route('mainSections')}}">{{__('home.header.precious')}}</a></li>
                                <li><a href="{{ route('contact') }}">{{__('home.header.call_us')}}</a></li>
                                <!--<li>-->
                                <!--    @foreach(config('locales.languages') as $key => $val)-->
                                <!--        @if ($key != app()->getLocale())-->
                                <!--            <a href="{{ route('change.language', $key) }}" >-->
                                <!--                <i class="fa fa-globe" aria-hidden="true" class="mx-2"></i>-->

                                <!--                {{ $val['name'] }}</a>-->

                                <!--        @endif-->
                                <!--    @endforeach-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>

</header>


<style>
    .menu-right-content {
     float: left !important;
}

.main-menu .navigation>li {
     margin-left: 50px !important;
}
</style>