<?php
$home_menu = (isset($home_menu) && $home_menu == true) ? 'active' : '';
$hotel_menu = (isset($hotel_menu) && $hotel_menu == true) ? 'active' : '';
$blog_menu = (isset($blog_menu) && $blog_menu == true) ? 'active' : '';


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
                    <li class="nav-item ">
                        <a href="{{route('hotels')}}" class="nav-link"   >Flight</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services<span><i class="fa fa-angle-down "></i></span></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li ><a href="#" class="dropdown-item">Hotel Reservation</a></li>
                            <li><a class="dropdown-item" href="flight-homepage.html">Flight Homepage</a></li>

                            <li><a class="dropdown-item" href="tour-homepage.html">Tour Homepage</a></li>
                            <li><a class="dropdown-item" href="cruise-homepage.html">Cruise Homepage</a></li>
                            <li><a class="dropdown-item" href="car-homepage.html">Car Homepage</a></li>

                            <li><a class="dropdown-item" href="travel-agency-homepage.html">Travel Agency Page</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('news')}}" class="nav-link {{$blog_menu}}"   >News</a>
                    </li>
                    <li class="nav-item ">
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
            <h2 id="web-name"><span><i class="fa fa-plane"></i></span>Star Travel</h2>

            <div id="main-menu">
                <div id="dismiss">
                    <button class="btn" id="closebtn">&times;</button>
                </div>
                <div class="list-group panel">
                    <a href="#home-links" class="items-list active" data-toggle="collapse" aria-expanded="false">
                        <span><i class="fa fa-home link-icon"></i></span>Home<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu text-danger" id="home-links">
                        <a class="items-list active" href="index.html">Main Homepage</a>
                        <a class="items-list" href="flight-homepage.html">Flight Homepage</a>
                        <a class="items-list" href="hotel-homepage.html">Hotel Homepage</a>
                        <a class="items-list" href="tour-homepage.html">Tour Homepage</a>
                        <a class="items-list" href="cruise-homepage.html">Cruise Homepage</a>
                        <a class="items-list" href="car-homepage.html">Car Homepage</a>
                        <a class="items-list" href="landing-page.html">Landing Page</a>
                        <a class="items-list" href="travel-agency-homepage.html">Travel Agency Page</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#flights-links" data-toggle="collapse"><span><i class="fa fa-plane link-icon"></i></span>Flights<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="flights-links">
                        <a class="items-list" href="flight-homepage.html">Flight Homepage</a>
                        <a class="items-list" href="flight-listing-left-sidebar.html">List View Left Sidebar</a>
                        <a class="items-list" href="flight-listing-right-sidebar.html">List View Right Sidebar</a>
                        <a class="items-list" href="flight-grid-left-sidebar.html">Grid View Left Sidebar</a>
                        <a class="items-list" href="flight-grid-right-sidebar.html">Grid View Right Sidebar</a>
                        <a class="items-list" href="flight-detail-left-sidebar.html">Detail Left Sidebar</a>
                        <a class="items-list" href="flight-detail-right-sidebar.html">Detail Right Sidebar</a>
                        <a class="items-list" href="flight-booking-left-sidebar.html">Booking Left Sidebar</a>
                        <a class="items-list" href="flight-booking-right-sidebar.html">Booking Right Sidebar</a>
                        <a class="items-list" href="flight-search-result.html">Search Result</a>
                        <a class="items-list" href="flight-offers.html">Hot Offers</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#hotels-links" data-toggle="collapse"><span><i class="fa fa-building link-icon"></i></span>Hotels<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="hotels-links">
                        <a class="items-list" href="hotel-homepage.html">Hotel Homepage</a>
                        <a class="items-list" href="hotel-listing-left-sidebar.html">List View Left Sidebar</a>
                        <a class="items-list" href="hotel-listing-right-sidebar.html">List View Right Sidebar</a>
                        <a class="items-list" href="hotel-grid-left-sidebar.html">Grid View Left Sidebar</a>
                        <a class="items-list" href="hotel-grid-right-sidebar.html">Grid View Right Sidebar</a>
                        <a class="items-list" href="hotel-detail-left-sidebar.html">Detail Left Sidebar</a>
                        <a class="items-list" href="hotel-detail-right-sidebar.html">Detail Right Sidebar</a>
                        <a class="items-list" href="hotel-booking-left-sidebar.html">Booking Left Sidebar</a>
                        <a class="items-list" href="hotel-booking-right-sidebar.html">Booking Right Sidebar</a>
                        <a class="items-list" href="hotel-search-result.html">Search Result</a>
                        <a class="items-list" href="hotel-offers.html">Hot Offers</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#tours-links" data-toggle="collapse"><span><i class="fa fa-globe link-icon"></i></span>Tours<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="tours-links">
                        <a class="items-list" href="tour-homepage.html">Tour Homepage</a>
                        <a class="items-list" href="tour-listing-left-sidebar.html">List View Left Sidebar</a>
                        <a class="items-list" href="tour-listing-right-sidebar.html">List View Right Sidebar</a>
                        <a class="items-list" href="tour-grid-left-sidebar.html">Grid View Left Sidebar</a>
                        <a class="items-list" href="tour-grid-right-sidebar.html">Grid View Right Sidebar</a>
                        <a class="items-list" href="tour-detail-left-sidebar.html">Detail Left Sidebar</a>
                        <a class="items-list" href="tour-detail-right-sidebar.html">Detail Right Sidebar</a>
                        <a class="items-list" href="tour-booking-left-sidebar.html">Booking Left Sidebar</a>
                        <a class="items-list" href="tour-booking-right-sidebar.html">Booking Right Sidebar</a>
                        <a class="items-list" href="tour-search-result.html">Search Result</a>
                        <a class="items-list" href="tour-offers.html">Hot Offers</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#cruise-links" data-toggle="collapse"><span><i class="fa fa-ship link-icon"></i></span>Cruise<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="cruise-links">
                        <a class="items-list" href="cruise-homepage.html">Cruise Homepage</a>
                        <a class="items-list" href="cruise-listing-left-sidebar.html">List View Left Sidebar</a>
                        <a class="items-list" href="cruise-listing-right-sidebar.html">List View Right Sidebar</a>
                        <a class="items-list" href="cruise-grid-left-sidebar.html">Grid View Left Sidebar</a>
                        <a class="items-list" href="cruise-grid-right-sidebar.html">Grid View Right Sidebar</a>
                        <a class="items-list" href="cruise-detail-left-sidebar.html">Detail Left Sidebar</a>
                        <a class="items-list" href="cruise-detail-right-sidebar.html">Detail Right Sidebar</a>
                        <a class="items-list" href="cruise-booking-left-sidebar.html">Booking Left Sidebar</a>
                        <a class="items-list" href="cruise-booking-right-sidebar.html">Booking Right Sidebar</a>
                        <a class="items-list" href="cruise-search-result.html">Search Result</a>
                        <a class="items-list" href="cruise-offers.html">Hot Offers</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#cars-links" data-toggle="collapse"><span><i class="fa fa-car link-icon"></i></span>Cars<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="cars-links">
                        <a class="items-list" href="car-homepage.html">Car Homepage</a>
                        <a class="items-list" href="car-listing-left-sidebar.html">List View Left Sidebar</a>
                        <a class="items-list" href="car-listing-right-sidebar.html">List View Right Sidebar</a>
                        <a class="items-list" href="car-grid-left-sidebar.html">Grid View Left Sidebar</a>
                        <a class="items-list" href="car-grid-right-sidebar.html">Grid View Right Sidebar</a>
                        <a class="items-list" href="car-detail-left-sidebar.html">Detail Left Sidebar</a>
                        <a class="items-list" href="car-detail-right-sidebar.html">Detail Right Sidebar</a>
                        <a class="items-list" href="car-booking-left-sidebar.html">Booking Left Sidebar</a>
                        <a class="items-list" href="car-booking-right-sidebar.html">Booking Right Sidebar</a>
                        <a class="items-list" href="car-search-result.html">Search Result</a>
                        <a class="items-list" href="car-offers.html">Hot Offers</a>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#features-links" data-toggle="collapse"><span><i class="fa fa-puzzle-piece link-icon"></i></span>Features<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu mega-sub-menu" id="features-links">
                        <a class="items-list" href="#header-style-links" data-toggle="collapse">Header<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="header-style-links">
                            <a class="items-list" href="feature-header-style-1.html">Header Style 1</a>
                            <a class="items-list" href="feature-header-style-2.html">Header Style 2</a>
                            <a class="items-list" href="feature-header-style-3.html">Header Style 3</a>
                            <a class="items-list" href="feature-header-style-4.html">Header Style 4</a>
                            <a class="items-list" href="feature-header-style-5.html">Header Style 5</a>
                            <a class="items-list" href="feature-header-style-6.html">Header Style 6</a>
                        </div>
                        <a class="items-list" href="#page-title-style-links" data-toggle="collapse">Page Title<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="page-title-style-links">
                            <a class="items-list" href="feature-page-title-style-1.html">Page Title Style 1</a>
                            <a class="items-list" href="feature-page-title-style-2.html">Page Title Style 2</a>
                            <a class="items-list" href="feature-page-title-style-3.html">Page Title Style 3</a>
                            <a class="items-list" href="feature-page-title-style-4.html">Page Title Style 4</a>
                            <a class="items-list" href="feature-page-title-style-5.html">Page Title Style 5</a>
                            <a class="items-list" href="feature-page-title-style-6.html">Page Title Style 6</a>
                        </div>
                        <a class="items-list" href="#footer-style-links" data-toggle="collapse">Footer<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="footer-style-links">
                            <a class="items-list" href="feature-footer-style-1.html">Footer Style 1</a>
                            <a class="items-list" href="feature-footer-style-2.html">Footer Style 2</a>
                            <a class="items-list" href="feature-footer-style-3.html">Footer Style 3</a>
                            <a class="items-list" href="feature-footer-style-4.html">Footer Style 4</a>
                            <a class="items-list" href="feature-footer-style-5.html">Footer Style 5</a>
                        </div>
                        <a class="items-list" href="#f-blog-links" data-toggle="collapse">Blog<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="f-blog-links">
                            <a class="items-list" href="blog-listing-left-sidebar.html">Blog Listing Left Sidebar</a>
                            <a class="items-list" href="blog-listing-right-sidebar.html">Blog Listing Right Sidebar</a>
                            <a class="items-list" href="blog-detail-left-sidebar.html">Blog Detail Left Sidebar</a>
                            <a class="items-list" href="blog-detail-right-sidebar.html">Blog Detail Right Sidebar</a>
                        </div>
                        <a class="items-list" href="#f-gallery-links" data-toggle="collapse">Gallery<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="f-gallery-links">
                            <a class="items-list" href="gallery-masonry.html">Gallery Masonry</a>
                            <a class="items-list" href="gallery-2-columns.html">Gallery 2 Columns</a>
                            <a class="items-list" href="gallery-3-columns.html">Gallery 3 Columns</a>
                            <a class="items-list" href="gallery-4-columns.html">Gallery 4 Columns</a>
                        </div>
                        <a class="items-list" href="#f-forms-links" data-toggle="collapse">Forms<span><i class="fa fa-caret-down arrow"></i></span></a>
                        <div class="collapse sub-menu mega-sub-menu-links" id="f-forms-links">
                            <a class="items-list" href="login-1.html">Login 1</a>
                            <a class="items-list" href="login-2.html">Login 2</a>
                            <a class="items-list" href="registration-1.html">Registration 1</a>
                            <a class="items-list" href="registration-2.html">Registration 2</a>
                            <a class="items-list" href="forgot-password-1.html">Forgot Password 1</a>
                            <a class="items-list" href="forgot-password-2.html">Forgot Password 2</a>
                        </div>
                    </div><!-- end sub-menu -->

                    <a class="items-list" href="#pages-links" data-toggle="collapse"><span><i class="fa fa-clone link-icon"></i></span>Pages<span><i class="fa fa-chevron-down arrow"></i></span></a>
                    <div class="collapse sub-menu" id="pages-links">
                        <div class="list-group-heading ">Standard <span>Pages</span></div>
                        <a class="items-list" href="about-us-1.html">About Us 1</a>
                        <a class="items-list" href="about-us-2.html">About Us 2</a>
                        <a class="items-list" href="services-1.html">Services 1</a>
                        <a class="items-list" href="services-2.html">Services 2</a>
                        <a class="items-list" href="team-1.html">Our Team 1</a>
                        <a class="items-list" href="team-2.html">Our Team 2</a>
                        <a class="items-list" href="contact-us-1.html">Contact Us 1</a>
                        <a class="items-list" href="contact-us-2.html">Contact Us 2</a>
                        <div class="list-group-heading ">User <span>Dashboard</span></div>
                        <a class="items-list" href="dashboard-1.html">Dashboard 1</a>
                        <a class="items-list" href="dashboard-2.html">Dashboard 2</a>
                        <a class="items-list" href="user-profile.html">User Profile</a>
                        <a class="items-list" href="booking.html">Booking</a>
                        <a class="items-list" href="wishlist.html">Wishlist</a>
                        <a class="items-list" href="cards.html">Cards</a>
                        <div class="list-group-heading ">Special <span>Pages</span></div>
                        <a class="items-list" href="error-page-1.html">404 Page 1</a>
                        <a class="items-list" href="error-page-2.html">404 Page 2</a>
                        <a class="items-list" href="coming-soon-1.html">Coming Soon 1</a>
                        <a class="items-list" href="coming-soon-2.html">Coming Soon 2</a>
                        <a class="items-list" href="faq-left-sidebar.html">FAQ Left Sidebar</a>
                        <a class="items-list" href="faq-right-sidebar.html">FAQ Right Sidebar</a>
                        <a class="items-list" href="testimonials-1.html">Testimonials 1</a>
                        <a class="items-list" href="testimonials-2.html">Testimonials 2</a>
                        <div class="list-group-heading ">Extra <span>Pages</span></div>
                        <a class="items-list" href="before-you-fly.html">Before Fly</a>
                        <a class="items-list" href="travel-insurance.html">Travel Insurance</a>
                        <a class="items-list" href="travel-guide.html">Travel Guide</a>
                        <a class="items-list" href="holidays.html">Holidays</a>
                        <a class="items-list" href="thank-you.html">Thank You</a>
                        <a class="items-list" href="payment-success.html">Payment Success</a>
                        <a class="items-list" href="pricing-table-1.html">Pricing Table 1</a>
                        <a class="items-list" href="pricing-table-2.html">Pricing Table 2</a>
                        <a class="items-list" href="popup-ad.html">Popup Ad</a>
                    </div><!-- end sub-menu -->

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
                            <li><a href="#">Flight Tickets</a></li>
                            <li><a href="#">Hotel Reservation</a></li>
                            <li><a href="#">Hotel Accommodation</a></li>
                            <li><a href="#">Tour packages</a></li>
                            <li><a href="#">Visa services</a></li>
                            <li><a href="#">Travel Insurance</a></li>
                            <li><a href="#">Private Jet Charter</a></li>
                        </ul>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-links ftr-pad-left">
                        <h3 class="footer-heading">RESOURCES</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 footer-widget ftr-about">
                        <h3 class="footer-heading">ABOUT US</h3>
                        <p>AIRFLOURISH Travels and Tours is a foremost Destination Management Company. We are strategically positioned to provide all of your travel and hospitality needs.</p>
                        <ul class="social-links list-inline list-unstyled">
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-pinterest-p"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>
                            <li class="list-inline-item"><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></li>
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

    @yield('ads')

@include('includes.scripts')
