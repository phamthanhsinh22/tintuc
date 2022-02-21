        <!-- Footer Section Start -->
        <footer class="footer--section">
            <!-- Footer Widgets Start -->
            <div class="footer--widgets pd--30-0 bg--color-2" style="background-color: #1d1d1d;">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">@lang('lang.gioithieu')</h2>

                                    <i class="icon fa fa-exclamation"></i>
                                </div>

                                <!-- About Widget Start -->
                                <div class="about--widget">
                                    <div class="content">
                                        <p>@lang('lang.gioithieu1')</p>
                                    </div>
                                </div>
                                <!-- About Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">@lang('lang.lienhe')</h2>

                                    <i class="icon fa fa-user-o"></i>
                                </div>

                                <!-- Links Widget Start -->
                                <div class="links--widget">

                                    <ul class="nav">
                                        <li>
                                            <i class="fa fa-map"></i>
                                            <span>143/C, Fake Street, Melborne, Australia</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:example@example.com">example@example.com</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:+123456789">+123 456 (789)</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>


                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <!-- Widget Start -->
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">@lang('lang.typelist')</h2>

                                    <i class="icon fa fa-expand"></i>
                                </div>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        @foreach($typeID as $typ)
                                        <li><a href="{{url('type/'.$typ->slug_typ)}}"
                                                class="fa-angle-right">{{$typ->typName}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                        <!-- Subscribe Widget Start -->
                        <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">@lang('lang.letter')</h2>
                                    <i class="icon fa fa-envelope-open-o"></i>
                                    <p>{{ session('message') }}</p>
                                </div>

                                <!-- Links Widget Start -->
                                <form action="{{ url('letter') }}" method="get">
                                    @if(!Auth::check())
                                    <div class="links--widget">

                                        <ul class="nav">
                                            <li>
                                                <a href="{{url('login')}}">@lang('lang.dangnhap')</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @else
                                    <div class="input-group">
                                        <input type="text" name="content" placeholder="@lang('lang.nhap')"
                                            class="form-control" autocomplete="off" required>
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}" />
                                        <input type="hidden" name="name" value="{{ Auth::user()->name }}" />

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-lg btn-default active"><i
                                                    class="fa fa-paper-plane-o"></i></button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="status"></div>
                                </form>
                                <!-- Links Widget End -->
                            </div>
                        </div>
                        <!-- Subscribe Widget End -->

                    </div>
                </div>
            </div>
            <!-- Footer Widgets End -->
        </footer>
        <!-- Footer Section End -->
        </div>
        <!-- Wrapper End -->

        <!-- Back To Top Button Start -->
        <div id="backToTop">
            <a href="#"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <!-- Back To Top Button End -->