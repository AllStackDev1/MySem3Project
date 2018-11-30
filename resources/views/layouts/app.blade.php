<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ralphmoolins Designs') }}</title>

    <!-- Fav Icon -->
    <link rel="apple-touch-icon" sizes="57x57" href={{ url("img/favicon/apple-icon-57x57.png") }}>
    <link rel="apple-touch-icon" sizes="60x60" href={{ url("img/favicon/apple-icon-60x60.png") }}>
    <link rel="apple-touch-icon" sizes="72x72" href={{ url("img/favicon/apple-icon-72x72.png") }}>
    <link rel="apple-touch-icon" sizes="76x76" href={{ url("img/favicon/apple-icon-76x76.png") }}>
    <link rel="apple-touch-icon" sizes="114x114" href={{ url("img/favicon/apple-icon-114x114.png") }}>
    <link rel="apple-touch-icon" sizes="120x120" href={{ url("img/favicon/apple-icon-120x120.png") }}>
    <link rel="apple-touch-icon" sizes="144x144" href={{ url("img/favicon/apple-icon-144x144.png") }}>
    <link rel="apple-touch-icon" sizes="152x152" href={{ url("img/favicon/apple-icon-152x152.png") }}>
    <link rel="apple-touch-icon" sizes="180x180" href={{ url("img/favicon/apple-icon-180x180.png") }}>
    <link rel="icon" type="image/png" sizes="192x192"  href={{ url("img/favicon/android-icon-192x192.png") }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ url("img/favicon/favicon-32x32.png") }}>
    <link rel="icon" type="image/png" sizes="96x96" href={{ url("img/favicon/favicon-96x96.png") }}>
    <link rel="icon" type="image/png" sizes="16x16" href={{ url("img/favicon/favicon-16x16.png") }}>
    <link rel="manifest" href={{ url("/favicon/manifest.json") }}>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Fav Icon -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>


<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('{{url('img/background.jpg')}}')">
    <div id="app">

        <!-- Header -->
        <header class="layouts-banner">
            <!-- Nav Bar 1 -->
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url("img/logo.png") }}" width="120">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto" id="nav-menu-down-right">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('shop#pay-accept') }}">{{ __('Go 2 Shop') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('make') }}">{{ __('Make New') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto" style="margin-top: -50px; font-weight: 700;">
                            <li class="nav-item">
                                <span class="nav-link">Welcome,</span>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <span class="nav-link">{{ __('Guest') }}</span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('view_cart#pay-accept') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 18px"></i>
                                        <span class="cart_count">
                                        <sup>({{ $count }})</sup>
                                    </span>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('view_cart#pay-accept') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 18px"></i>
                                        <span class="cart_count">
                                        <sup>({{ $count }})</sup>
                                    </span>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                        <div class="search-container">
                            <form class="form-inline my-2 my-lg-0" action="{{ url("search")}}" method="get">
                                {{ csrf_field()}}
                                <input class="form-control mr-sm-2" type="search" name="search_key" placeholder="Search" aria-label="Search">
                                <button class="btn my-2 my-sm-0" type="submit" name="btn_search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <span><i class="fa fa-truck" aria-hidden="true"></i> Free shipping across Nigeria</span>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Nav Bar -->

            <!-- Carousel -->

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="wthree_banner_info_grid">
                            <h3>Measure Yourself..</h3>
                            <p>Download filling document and enter your measurements accordingly and send it to us, with your preferred designs and leave the rest to us...</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="wthree_banner_info_grid">
                            <h3>Buy From Us...</h3>
                            <p>The shop page contains lots of our products, with high quality and the best price. From Ankara wears to Suits... We can costumire too</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="wthree_banner_info_grid">
                            <h3>Fast Delivery...</h3>
                            <p>We make sure to deliver on time to our busy customers. No delays and No Excuses. 1 week money back guarantee</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel -->
        </header>
        <!-- Header -->

        <!-- Main Content -->
        <main class="py-4">
                @yield('content')
        </main>
        <!-- Main Content -->

        <!-- Footer -->
        <footer class="page-footer font-small unique-color-light mt-4">

            <div class="social-links">
                <div class="container">

                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0">Get connected with us on social networks!</h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-7 text-center text-md-right">

                            <!-- Facebook -->
                            <a class="fb-ic">
                                <i class="fa fa-facebook white-text mr-4"> </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fa fa-twitter white-text mr-4"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fa fa-google-plus white-text mr-4"> </i>
                            </a>
                            <!--Linkedin -->
                            <a class="li-ic">
                                <i class="fa fa-linkedin white-text mr-4"> </i>
                            </a>
                            <!--Instagram-->
                            <a class="ins-ic">
                                <i class="fa fa-instagram white-text"> </i>
                            </a>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row-->

                </div>
            </div>

            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-5">

                <!-- Grid row -->
                <div class="row mt-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                        <!-- Content -->
                        <a href="../">
                            <img src="img/logo.png">
                        </a>
                        <div class="trust_guarantees">
                            <span>
                                <img src="img/trusted-online-store.png" width="75">
                            </span>
                            <span>
                                <img src="img/Quality-Logo.png" width="70">
                            </span>
                            <span>
                                <img src="img/fast-delivery.png" width="75">
                            </span>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Links</h6>
                        <hr class="deep-light-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#!">Your Account</a>
                        </p>
                        <p>
                            <a href="#!">Measurement</a>
                        </p>
                        <p>
                            <a href="#!">How it work</a>
                        </p>
                        <p>
                            <a href="#!">Subscribe</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                        <hr class="deep-light-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a href="#!">Refund Policy</a>
                        </p>
                        <p>
                            <a href="#!">Privacy Policy</a>
                        </p>
                        <p>
                            <a href="#!">Shipping Rates</a>
                        </p>
                        <p>
                            <a href="#!">T&C</a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr class="deep-light-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <i class="fa fa-home mr-3"></i> New York, NY 10012, US
                        </p>
                        <p>
                            <i class="fa fa-envelope mr-3"></i> info@ralphmoolinsdesigns.com
                        </p>
                        <p>
                            <i class="fa fa-phone mr-3"></i> + 01 234 567 88
                        </p>
                        <p>
                            <i class="fa fa-print mr-3"></i> + 01 234 567 89
                        </p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="font-size: 11px;">
                &#169;2018 Copyright. All right reserved:
                <a href="#!" style=" color: rgba(255,255,255,.6);"> Ralphmoolins Designs</a>
                <span style="position: absolute; right: 50px;">Designed by MrCEO</span>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
    </div>
</body>
</html>
