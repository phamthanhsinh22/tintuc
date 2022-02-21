<!-- Preloader Start -->
<div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="header--section header--style-1">

            <!-- Header Mainbar Start -->
            <div class="header--mainbar">
                <div class="container">
                    <!-- Header Logo Start -->
                    <div class="header--logo float--left float--sm-none text-sm-center">
                        <h1 class="h1">
                            <a href="{{URL('index')}}" class="btn-link">
                                <img src="{{asset('img/logo.png')}}" alt="USNews Logo">
                                <span class="hidden">USNews Logo</span>
                            </a>
                        </h1>
                    </div>
                    <!-- Header Logo End -->
            <!-- Header Topbar Start -->
            <div class="header--topbar bg--color-2">
                <div class="container">
                    <div class="float--right float--xs-none text-xs-center" style="margin-top: 20px;">
                        <!-- Header Topbar Action Start -->
                        <ul class="header--topbar-action nav">
                            @if(!Auth::check())
                                <li><a href="{{URL('login')}}"><i class="fa fm fa-user-o"></i>@lang('lang.dangnhap')</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fm fa-user-o"></i>{{ Auth::user()->name }}<i class="fa flm fa-angle-down"></i></a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{URL('logout')}}">@lang('lang.dangxuat')</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                        <!-- Header Topbar Action End -->
                        
                        <!-- Header Topbar Language Start -->
                        <ul class="header--topbar-lang nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fm fa-language"></i>@lang('lang.ngonngu')<i class="fa flm fa-angle-down"></i></a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{url('lang/en')}}">@lang('lang.TA')</a></li>
                                    <li><a href="{{url('lang/vi')}}">@lang('lang.TV')</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Header Topbar Language End -->

                        <!-- Header Topbar Social Start -->
                        <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <!-- Header Topbar Social End -->
                    </div>
                </div>
            </div>
            <!-- Header Topbar End -->
                </div>
            </div>
            <!-- Header Mainbar End -->

            <!-- Header Navbar Start -->
            <div class="header--navbar navbar bd--color-1 bg--color-1" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--left">
                        <!-- Header Menu Links Start -->
                        <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                        <li>
                                <a href="{{URL('index')}}">@lang('lang.home')</a>
                        </li>
                        @foreach($cate as $cat)
                         @if($cat->Active==1)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$cat->catName}}<i class="fa flm fa-angle-down"></i></a>
                              
                                <ul class="dropdown-menu">
                                  @foreach($type as $typ)
                                    @if($cat->id == $typ->category_id && $typ->Active==1)
                                    <li><a href="{{url('type/'.$typ->slug_typ)}}">{{$typ->typName}}</a></li>
                                    @endif
                                   @endforeach 
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <!-- Header Menu Links End -->
                    </div>

                    <!-- Header Search Form Start -->
                    <form action="{{URL('search')}}" class="header--search-form float--right" data-form="validate" method="post">
                    {{csrf_field()}}
                        <input type="search" name="keyword_submit" placeholder="@lang('lang.search')" class="header--search-control form-control" required>

                        <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                    </form>
                    <!-- Header Search Form End -->
                </div>
            </div>
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->