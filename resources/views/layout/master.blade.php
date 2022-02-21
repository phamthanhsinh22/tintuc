<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>USNews - Multipurpose News, Magazine and Blog HTML5 Template</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicons ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

    <!-- ==== Font Awesome ==== -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="{{asset('css/fontawesome-stars-o.min.css')}}">

    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/responsive-style.css')}}">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/colors/theme-color-1.css')}}" id="changeColorScheme">

    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @include('layout.header')

    @section('content')
    @yield('content')
    @section('type')
    @yield('type')
    @section('post')
    @yield('post')
    @include('layout.footer')


    <!-- ==== jQuery Library ==== -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

    <!-- ==== Bootstrap Framework ==== -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- ==== StickyJS Plugin ==== -->
    <script src="{{asset('js/jquery.sticky.min.js')}}"></script>

    <!-- ==== HoverIntent Plugin ==== -->
    <script src="{{asset('js/jquery.hoverIntent.min.js')}}"></script>

    <!-- ==== Marquee Plugin ==== -->
    <script src="{{asset('js/jquery.marquee.min.js')}}"></script>

    <!-- ==== Validation Plugin ==== -->
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>

    <!-- ==== Isotope Plugin ==== -->
    <script src="{{asset('js/isotope.min.js')}}"></script>

    <!-- ==== Resize Sensor Plugin ==== -->
    <script src="{{asset('js/resizesensor.min.js')}}"></script>

    <!-- ==== Sticky Sidebar Plugin ==== -->
    <script src="{{asset('js/theia-sticky-sidebar.min.js')}}"></script>

    <!-- ==== Zoom Plugin ==== -->
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>

    <!-- ==== Bar Rating Plugin ==== -->
    <script src="{{asset('js/jquery.barrating.min.js')}}"></script>

    <!-- ==== Countdown Plugin ==== -->
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>

    <!-- ==== RetinaJS Plugin ==== -->
    <script src="{{asset('js/retina.min.js')}}"></script>

    <!-- ==== Google Map API ==== -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>

    <!-- ==== Main JavaScript ==== -->
    <script src="{{asset('js/main.js')}}"></script>
    <script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slideIndex++;
			if (slideIndex > slides.length) {
				slideIndex = 1
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
			setTimeout(showSlides, 2500); // Change image every 2 seconds
		}
    </script>

</body>

</html>