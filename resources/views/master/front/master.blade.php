<!DOCTYPE html>
<html lang="zxx">



<head>
    <meta charset="utf-8"/>
    <title>Biztrox</title>


    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/bootstrap/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/magnific-popup/magnific-popup.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/slick/slick-theme.css">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/themify-icons/themify-icons.css">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/animate/animate.css">
    <!-- Aos -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/aos/aos.css">
    <!-- swiper -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/swiper/swiper.min.css">
    <!-- Stylesheets -->
    <link href="{{asset('/')}}website/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('/')}}website/{{asset('/')}}website/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{asset('/')}}/website/{{asset('/')}}website/images/favicon.png" type="image/x-icon">

</head>

<body>


<!-- preloader start -->
<div class="preloader">
    <img src="{{asset('/')}}website/images/preloader.gif" alt="preloader">
</div>
<!-- preloader end -->
<!-- navigation -->
<header>
    <!-- top header -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline text-lg-right text-center">
                        <li class="list-inline-item">
                            <a href="mailto:info@companyname.com">info@companyname.com</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="callto:1234565523">Call Us Now:
                                <span class="ml-2"> 123 456 5523</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" id="searchOpen">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- nav bar -->
    <div class="navigation">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('/')}}website/images/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown active">
                            <a class="nav-link" href="{{asset('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                Home
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">All Blog Category</a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    <li class="">
                                        <a class="dropdown-item" href="{{route('blog-category', ['id' => $category->id])}}">
                                            {{$category->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
{{--                        @foreach($categories as $category)--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{route('blog-category')}}">--}}
{{--                                {{$category->name}}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endforeach--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("contuct-us")}}">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- Search Form -->
<div class="search-form">
    <a href="#" class="close" id="searchClose">
        <i class="ti-close"></i>
    </a>
    <div class="container">
        <form action="#" class="row">
            <div class="col-lg-10 mx-auto">
                <h3>Search Here</h3>
                <div class="input-wrapper">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Enter Keywords..." required>
                    <button>
                        <i class="ti-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /navigation -->
@yield('body')
<!-- footer -->

<footer class="footer bg-gray">
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © Skote.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                     Develop by Md. Zubayer Efty.
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
<!-- jQuery -->
<script src="{{asset('/')}}website/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('/')}}website/plugins/bootstrap/bootstrap.min.js"></script>
<!-- magnific popup -->
<script src="{{asset('/')}}website/plugins/magnific-popup/jquery.magnific.popup.min.js"></script>
<!-- slick slider -->
<script src="{{asset('/')}}website/plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="{{asset('/')}}website/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script  src="{{asset('/')}}website/plugins/google-map/gmap.js"></script>
<!-- Syo Timer -->
<script src="{{asset('/')}}website/plugins/syotimer/jquery.syotimer.js"></script>
<!-- aos -->
<script src="{{asset('/')}}website/plugins/aos/aos.js"></script>
<!-- swiper -->
<script src="{{asset('/')}}website/plugins/swiper/swiper.min.js"></script>
<!-- Main Script -->
<script src="{{asset('/')}}website/js/script.js"></script>

</body>


</html>
