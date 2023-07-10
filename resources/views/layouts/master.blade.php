<?php
$home_menu = (isset($home_menu) && $home_menu == true) ? 'active' : '';
$hotel_menu = (isset($hotel_menu) && $hotel_menu == true) ? 'active' : '';
$tour_menu = (isset($tour_menu) && $tour_menu == true) ? 'active' : '';
$blog_menu = (isset($blog_menu) && $blog_menu == true) ? 'active' : '';
$service_menu = (isset($service_menu) && $service_menu == true) ? 'active' : '';
$contact_menu = (isset($contact_menu) && $contact_menu == true) ? 'active' : '';


?>
@include('includes.head')

<body id="main-homepage">

<div class="wrapper">
    <!--====== LOADER =====-->
    <div class="loader"></div>


    <!--======== SEARCH-OVERLAY =========-->
    <div id="myOverlay" class="overlay">
        <span class="closebtn" onClick="closeSearch()" title="Close Overlay">×</span>
        <div class="overlay-content">

            <form>
                <div class="form-group">
                    <div class="input-group">
                        <input class="float-left" type="text" placeholder="Search.." name="search">
                        <button class="float-left" type="submit"><i class="fa fa-search"></i></button>
                    </div><!-- end input-group -->
                </div><!-- end form-group -->
            </form>

        </div><!-- end overlay-content -->
    </div><!-- end overlay -->


    <!--============= TOP-BAR ===========-->
    <div id="top-bar" class="tb-text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div id="info">
                        <ul class="list-unstyled list-inline">
                             </ul>
                    </div><!-- end info -->
                </div><!-- end columns -->
                <div class="col-12 col-md-6">
                    <div id="links">
                        <ul class="list-unstyled list-inline">
                            {{--                            <li class="list-inline-item"><a href="login-1.html"><span><i class="fa fa-lock"></i></span>Login</a></li>--}}
                            {{--                            <li class="list-inline-item"><a href="registration-1.html"><span><i class="fa fa-plus"></i></span>Sign Up</a></li>--}}
                            <li class="list-inline-item">
                                <form>
                                    <ul class="list-inline">
                                     <li class="list-inline-item">
                                            <div class="form-group language">
                                                <span><i class="fa fa-angle-down"></i></span>
                                                <select class="form-control">
                                                    <option value="">EN</option>
                                                    <option value="">UR</option>
                                                    <option value="">FR</option>
                                                    <option value="">IT</option>
                                                </select>
                                            </div><!-- end form-group -->
                                        </li>
                                    </ul>
                                </form>
                            </li>
                        </ul>
                    </div><!-- end links -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end top-bar -->
    <nav class="navbar navbar-expand-xl sticky-top navbar-custom main-navbar p-1" id="mynavbar-1">
        <div class="container">

            <a href="#" class="navbar-brand py-1 m-0"><span><i class="fa fa-plane"></i>AIR</span>FLOURISH</a>
            <div class="header-search d-xl-none my-auto ml-auto py-1">
                <a href="#" class="search-button" onClick="openSearch()"><span><i class="fa fa-search"></i></span></a>
            </div>
            <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="sidebarCollapse">
                <i class="fa fa-navicon py-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="myNavbar1">
                <ul class="navbar-nav ml-auto navbar-search-link">
                    <li class="nav-item  {{$home_menu}}">
                        <a href="{{route('home')}}" class="nav-link" >Home</a>

                    </li>
                    <li class="nav-item {{$hotel_menu}}">
                        <a href="{{route('hotels')}}" class="nav-link"   >Hotels</a>
                    </li>
                    <li class="nav-item  {{$tour_menu}}">
                        <a href="{{route('tours')}}" class="nav-link"   >Tours</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('services')}}" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services<span><i class="fa fa-angle-down "></i></span></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($services as $service)
                            <li><a href="{{route('services')}}" class="dropdown-item">{{ucwords($service->name)}}</a></li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="nav-item {{$blog_menu}} ">
                        <a href="{{route('news')}}" class="nav-link "   >News</a>
                    </li>
                    <li class="nav-item {{$contact_menu}}">
                        <a href="{{route('contact-us')}}" class="nav-link"   >Contact</a>
                    </li>
                    <li class="dropdown-item search-btn">
                        <a href="#" class="search-button" onClick="openSearch()"><span><i class="fa fa-search"></i></span></a>
                    </li>
                </ul>
            </div><!-- end navbar collapse -->
        </div><!-- End container -->
    </nav>
    <div class="sidenav-content">
        <!-- Sidebar  -->
        <nav id="sidebar" class="sidenav">
            <h2 id="web-name"><span><i class="fa fa-plane"></i></span>Air Flourish</h2>

            <div id="main-menu">
                <div id="dismiss">
                    <button class="btn" id="closebtn">&times;</button>
                </div>
                <div class="list-group panel">
                    <a href="{{route('home')}}" class="items-list {{$home_menu}}" data-toggle="collapse" aria-expanded="false">
                        <span><i class="fa fa-home link-icon"></i></span>Home<span></span></a>


                    <a class="items-list {{$hotel_menu}}" href="{{route('hotels')}}" ><span><i class="fa fa-building link-icon"></i></span>Hotels</a>

                    <a class="items-list {{$tour_menu}}" href="{{route('tours')}}" ><span><i class="fa fa-globe link-icon"></i></span>Tours<span></a>


                    <a class="items-list {{$service_menu}}" href="{{route('services')}}" ><span><i class="fa fa-list link-icon"></i></span>Services</a>
                    <a class="items-list {{$blog_menu}}" href="{{route('news')}}" ><span><i class="fa fa-newspaper-o link-icon"></i></span>News</a>

                    <a class="items-list {{$contact_menu}}" href="{{route('contact-us')}}" ><span><i class="fa fa-puzzle-piece link-icon"></i></span>Contact Us</a>


                </div><!-- End list-group panel -->
            </div><!-- End main-menu -->
        </nav>
    </div><!-- End sidenav-content -->


@yield('content')

    <!--======================= FOOTER =======================-->
    <section id="footer" class="ftr-heading-o ftr-heading-mgn-1">

        <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-contact">
                        <h3 class="footer-heading">CONTACT US</h3>
                        <ul class="list-unstyled">
                            <li><span><i class="fa fa-map-marker"></i></span>21/23 Billings Way Oregun.</li>
                            <li><span><i class="fa fa-phone"></i></span>+234 913 4779 928</li>
                            <li><span><i class="fa fa-envelope"></i></span>info.sales@airflourish.com</li>
                        </ul>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-2 col-xl-2 footer-widget ftr-links">
                        <h3 class="footer-heading">SERVICES</h3>
                        <ul class="list-unstyled">
                            @foreach($services as $service)
                            <li><a href="{{route('services')}}">{{ucwords($service->name)}}</a></li>
                            @endforeach

                        </ul>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-links ftr-pad-left">
                        <h3 class="footer-heading">QUICK LINKS</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('services')}}">Services</a></li>
                            <li><a href="{{route('news')}}">News</a></li>
                            <li><a href="{{route('hotels')}}">Hotels</a></li>
                            <li><a href="{{route('contact-us')}}">Contact Us</a></li>

                        </ul>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 footer-widget ftr-about">
                        <h3 class="footer-heading">ABOUT US</h3>
                        <p>AIRFLOURISH Travels and Tours is a foremost Destination Management Company. We are strategically positioned to provide all of your travel and hospitality needs.</p>
                        <ul class="social-links list-inline list-unstyled">
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-pinterest-p"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>--}}
{{--                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></li>--}}
                           <li><a href="#" class="btn btn-primary btn-block">
                                   <img src="https://kingsch.at/h/css/images/favicon.ico" alt="">
                                    KingsChat
                               </a></li>
                        </ul>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer-top -->

        <div id="footer-bottom" class="ftr-bot-black">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6" id="copyright">
                        <p>© <script>document.write(new Date().getFullYear());</script> <a href="#">AirFlourish</a>. All rights reserved.</p>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6" id="terms">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="#">Terms & Condition</a></li>
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end footer-bottom -->

    </section>
    <!-- end footer -->

{{--    @yield('ads')--}}

@include('includes.scripts')
