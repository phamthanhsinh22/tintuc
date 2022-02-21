@extends('layout.master')

@section('content')



<!-- Posts Filter Bar Start -->
<div class="posts--filter-bar style--1 hidden-xs">
    <div class="container">
        <ul class="nav">
            <li>
                <a href="{{url('featured')}}">
                    <i class="fa fa-star-o"></i>
                    <span>@lang('lang.featured')</span>
                </a>
            </li>
            <li>
                <a href="{{url('popular')}}">
                    <i class="fa fa-heart-o"></i>
                    <span>@lang('lang.popular')</span>
                </a>
            </li>
            <li>
                <a href="{{url('hot')}}">
                    <i class="fa fa-fire"></i>
                    <span>@lang('lang.hot')</span>
                </a>
            </li>
            <li>
                <a href="{{url('trending')}}">
                    <i class="fa fa-flash"></i>
                    <span>@lang('lang.trending')</span>
                </a>
            </li>
            <li>
                <a href="{{url('watched')}}">
                    <i class="fa fa-eye"></i>
                    <span>@lang('lang.watched')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Posts Filter Bar End -->

<!-- News Ticker Start -->
<div class="news--ticker">
    <div class="container">
        <div class="title">
            <h2>@lang('lang.update')</h2>
        </div>

        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                @foreach($postNew as $pot)
                <li>
                    <h3 class="h3"><a href="{{url('post/'.$pot->slug_post)}}"><i
                                class="fas fa-code">{{$pot->title}}</i></a>
                    </h3>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- News Ticker End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <!-- Main Content Start -->
        <div class="main--content">
            <!-- Post Items Start -->
            <div class="post--items post--items-1 pd--30-0">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="hinh-nen-powerpoint-dep-nhat-1.jpeg" style="width:100%">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="hinh-nen-powerpoint-dep-nhat-1.jpeg" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="hinh-nen-powerpoint-dep-nhat-1.jpeg" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            <!-- Post Items End -->
        </div>
        <!-- Main Content End -->

        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">
                        @foreach($type as $typ)
                        @if($typ->Active==1)
                        <!-- Foods and Recipes Start -->
                        <div class="col-md-12 ptop--30 pbottom--30">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4"><a href="#">{{$typ->typName}}</a></h2>
                            </div>
                            <!-- Post Items Title End -->

                            <!-- Post Items Start -->
                            <div class="post--items" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner">
                                    @foreach($post as $pot)
                                    @if($pot->type_id==$typ->id && $pot->active==1)
                                    <li class="col-md-4 col-xs-6 col-xxs-12">
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <a href="{{url('post/'.$pot->slug_post)}}" class="thumb"><img
                                                        src="{{asset('images/'.$pot->images)}}" alt=""
                                                        style="height:170px;"></a>

                                                <div class="post--info">
                                                    <div class="title">
                                                        <h3 class="h4"><a href="{{url('post/'.$pot->slug_post)}}"
                                                                class="btn-link">{{$pot->title}}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- Foods and Recipes End -->
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Main Content End -->

            <!-- Main Sidebar Start -->
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Stay Connected</h2>
                            <i class="icon fa fa-share-alt"></i>
                        </div>

                        <!-- Social Widget Start -->
                        <div class="social--widget style--1">
                            <ul class="nav">
                                <li class="facebook">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-facebook-f"></i></span>
                                        <span class="count">521</span>
                                        <span class="title">Likes</span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-twitter"></i></span>
                                        <span class="count">3297</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-google-plus"></i></span>
                                        <span class="count">596282</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="rss">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-rss"></i></span>
                                        <span class="count">521</span>
                                        <span class="title">Subscriber</span>
                                    </a>
                                </li>
                                <li class="vimeo">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-vimeo"></i></span>
                                        <span class="count">3297</span>
                                        <span class="title">Followers</span>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="#">
                                        <span class="icon"><i class="fa fa-youtube-square"></i></span>
                                        <span class="count">596282</span>
                                        <span class="title">Subscriber</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Social Widget End -->
                    </div>
                    <!-- Widget End -->


                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">@lang('lang.featured')</h2>
                            <i class="icon fa fa-newspaper-o"></i>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-1">

                            <!-- Post Items Start -->
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    @foreach($post as $pos)
                                    @if($pos->featured==1 && $pos->active==1)
                                    <li>
                                        <!-- Post Item Start -->
                                        <div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="{{url('post/'.$pos->slug_post)}}" class="thumb"><img
                                                        src="{{asset('images/'.$pos->images)}}" alt="" style="height:70px; width:100px;"></a>

                                                <div class="post--info" style="height: 70px;">
                                                    <div class="title">
                                                        <h3 class="h4"><a href="{{url('post/'.$pos->slug_post)}}"
                                                                class="btn-link">{{$pos->title}}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post Item End -->
                                    </li>

                                    @endif
                                    @endforeach
                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- List Widgets End -->
                    </div>
                    <!-- Widget End -->
                </div>
            </div>
            <!-- Main Sidebar End -->
        </div>
    </div>
</div>
<!-- Main Content Section End -->

@endsection