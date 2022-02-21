@extends('layout/master')
@section('content')
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">

                    <!-- Page Title Start -->
                    <div class="page--title ptop--30">
                        <h2 class="h2"><span>Kết quả tìm kiếm</span></h2>
                    </div>
                    
                    <!-- Post Items Start -->
                    <div class="post--items post--items-5 pd--30-0">
                        <ul class="nav">
                            @php
                            $mucluc = count($search_post);
                            @endphp
                            @if($mucluc>0)
                            @foreach($search_post as $value)
                            @if($value->active==1)
                            <li>

                                <!-- Post Item Start -->
                                <div class="post--item post--title-larger">

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                            <div class="post--img">
                                                <a href="{{url('post/'.$value->slug_post)}}" class="thumb"><img
                                                        src="{{asset('images/'.$value->images)}}" alt="" style="height:120px; width:100%;"></a>
                                                <a href="#" class="cat"></a>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                            <div class="post--info">
                                                <div class="title">
                                                    <h3 class="h4"><a href="{{url('post/'.$value->slug_post)}}"
                                                            class="btn-link">{{$value->title}}</a></h3>
                                                </div>
                                            </div>

                                            <div class="post--content">
                                                <p>{{$value->summary}}</p>
                                            </div>

                                            <div class="post--action">
                                                <a href="{{url('post/'.$value->slug_post)}}">Xem Thêm</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- Post Item End -->

                            </li>
                            @endif
                            @endforeach
                            @else
                            <li class="vip-0">Đang cập nhật bài viết mới...</li>
                            @endif
                        </ul>

                    </div>
                    <!-- Post Items End -->
                    <!-- Page Title End -->
                    <!-- Advertisement End -->

                    <!-- Pagination Start -->
                    <!-- <div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
                        <p class="pagination-hint float--left">Page 02 of 03</p>

                        <ul class="pagination float--right">
                            <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                            <li><a href="#">01</a></li>
                            <li class="active"><span>02</span></li>
                            <li><a href="#">03</a></li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <i class="fa fa-angle-double-right"></i>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li><a href="#">20</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div> -->
                    <!-- Pagination End -->

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
                            <h2 class="h4">Get Newsletter</h2>
                            <i class="icon fa fa-envelope-open-o"></i>
                        </div>

                        <!-- Subscribe Widget Start -->
                        <div class="subscribe--widget">
                            <div class="content">
                                <p>Subscribe to our newsletter to get latest news, popular news and exclusive updates.
                                </p>
                            </div>

                            <form
                                action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&id=f4e0e93d1d"
                                method="post" name="mc-embedded-subscribe-form" target="_blank"
                                data-form="mailchimpAjax">
                                <div class="input-group">
                                    <input type="email" name="EMAIL" placeholder="E-mail address" class="form-control"
                                        autocomplete="off" required>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-lg btn-default active"><i
                                                class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>

                                <div class="status"></div>
                            </form>
                        </div>
                        <!-- Subscribe Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Featured News</h2>
                            <i class="icon fa fa-newspaper-o"></i>
                        </div>

                        <!-- List Widgets Start -->
                        <div class="list--widget list--widget-1">
                            <div class="list--widget-nav" data-ajax="tab">
                                <ul class="nav nav-justified">

                                    <li class="active">
                                        <a href="#" data-ajax-action="load_widget_trendy_news">Trendy News</a>
                                    </li>
                                    
                                </ul>
                            </div>

                            <!-- Post Items Start -->
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                @foreach($post as $pos)
                                    @if($pos->trending==1 && $pos->active==1)
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
@endsection