@extends('layout/master')
@section('title','post')
@section('post')
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('index')}}" class="btn-link"><i class="fa fm fa-home"></i>@lang('lang.home')</a></li>
            <li><a href="{{url('type/'.$post->type->slug_typ)}}" class="btn-link">{{$post->type->typName}}</a></li>

        </ul>
    </div>
</div>
<!-- Main Breadcrumb End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">

            <!-- Main Content Start -->
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Post Item Start -->
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--info">

                            <div class="title">
                                <h3 class="h4">{{$post->title}}</h3>
                            </div>
                        </div>

                        <div class="post--content">
                            <h4 style="line-height: 25px;">{{$post->summary}}</h4>
                            <img src="{{asset('images/'.$post->images)}}"
                                style="margin-left: 150px;width: 500px;margin-bottom: 20px;margin-top: 20px;">
                            <p style="color:black;">{{$post->content}}</p>
                        </div>
                    </div>
                    <!-- Post Item End -->


                    <!-- Comment List Start -->
                    <div class="comment--list pd--30-0">
                        <!-- Post Items Title Start -->
                        <div class="post--items-title">
                            <h2 class="h4">@lang('lang.cmt')</h2>

                            <i class="icon fa fa-comments-o"></i>
                        </div>
                        <!-- Post Items Title End -->

                        <ul class="comment--items nav">
                            @foreach($cmt as $value)
                            <li>
                                <!-- Comment Item Start -->
                                <div class="comment--item clearfix">
                                    <div class="comment--img float--left">
                                        <img src="img/news-single-img/comment-avatar-01.jpg" alt="">
                                    </div>

                                    <div class="comment--info">
                                        <div class="comment--header clearfix">
                                            <p>{{$value->name}}</p>
                                            <p class="date">{{$value->created_at}}</p>

                                            <a href="#" class="reply"><i class="fa fa-mail-reply"></i></a>
                                        </div>

                                        <div class="comment--content">
                                            <p>{{$value->content}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment Item End -->
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="comment--form pd--30-0">
                        <!-- Post Items Title Start -->
                        <div class="post--items-title">
                            <h2 class="h4">@lang('lang.taocmt')</h2>

                            <i class="icon fa fa-pencil-square-o"></i>
                        </div>
                        <!-- Post Items Title End -->

                        <div class="comment-respond">
                            <form action="{{ url('comment') }}" data-form="validate" method="get">
                                {{csrf_field()}}
                                @if(!Auth::check())
                                <p>@lang('lang.thongbao') (*).</p>
                                <p><a href="{{url('login')}}">@lang('lang.dangnhap')</p>
                                @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>
                                            <span>@lang('lang.cmt') *</span>
                                            <textarea name="content" class="form-control" required></textarea>
                                        </label>
                                        <input type="hidden" name="postID" value="{{$post->id}}" />
                                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}" />
                                        <input type="hidden" name="name" value="{{ Auth::user()->name }}" />
                                    </div>

                                    <button type="submit" class="btn btn-primary">@lang('lang.dangcmt')</button>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>
            </div>
            <!-- Main Content End -->

            <!-- Main Sidebar Start -->
            <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">@lang('lang.baiviet')</h2>
                            <i class="icon fa fa-newspaper-o"></i>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-1">
                            <!-- Post Items Start -->
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                @foreach($posthot as $value)
                                @if($value->active==1 && $value->type_id==$post->type_id && $value->id != $post->id)
                                    <li>
                                        <!-- Post Item Start --><div class="post--item post--layout-3">
                                            <div class="post--img">
                                                <a href="{{url('post/'.$value->slug_post)}}" class="thumb"><img
                                                        src="{{asset('images/'.$value->images)}}" alt="" style="height:70px; width:100px;"></a>

                                                <div class="post--info" style="height: 70px;">
                                                    <div class="title">
                                                        <h3 class="h4"><a href="{{url('post/'.$value->slug_post)}}"
                                                                class="btn-link">{{$value->title}}</a></h3>
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
                </div>
            </div>
            <!-- Main Sidebar End -->
        </div>
    </div>
</div>
<!-- Main Content Section End -->
@endsection