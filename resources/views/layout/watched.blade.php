@extends('layout.master')

@section('content')



<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">

                    <!-- Page Title Start -->
                    <div class="page--title ptop--30">
                        <h2 class="h2"><span>@lang('lang.watched')</span></h2>
                    </div>
                    <!-- Page Title End -->

                    <!-- Post Items Start -->
                    <div class="post--items post--items-5 pd--30-0">
                        <ul class="nav">
                    
                            @foreach($post as $pot)
                            <li>

                                <!-- Post Item Start -->
                                <div class="post--item post--title-larger">

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                            <div class="post--img">
                                                <a href="{{url('post/'.$pot->slug_post)}}" class="thumb"><img
                                                        src="{{asset('images/'.$pot->images)}}" alt="" style="height:120px; width:100%;"></a>
                                                <a href="#" class="cat"></a>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                            <div class="post--info">
                                                <div class="title">
                                                    <h3 class="h4"><a href="{{url('post/'.$pot->slug_post)}}"
                                                            class="btn-link">{{$pot->title}}</a></h3>
                                                </div>
                                            </div>

                                            <div class="post--content">
                                                <p>{{$pot->summary}}</p>
                                            </div>

                                            <div class="post--action">
                                                <a href="{{url('post/'.$pot->slug_post)}}">@lang('lang.xemthem')</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Post Item End -->

                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- Post Items End -->

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
                                                        src="{{asset('images/'.$pos->images)}}" alt=""
                                                        style="height:70px; width:100px;"></a>

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

@endsection