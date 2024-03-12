@extends('layouts.master')
@section('content')




    <!--========================= FLEX SLIDER =====================-->
    <section class="flexslider-container mb-4" id="flexslider-container-1">

        <div class="flexslider slider" id="slider-1">
            <ul class="slides">
                @foreach ($slides as $slide)
                    <li class="item-{{ $slide->id }}" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{ asset('storage/' . $slide->image) }}) 50% 0%;background-size:cover;height:100%;">
                        <div class=" meta">
                            <div class="container">
                                <h2>{{ $slide->subtitle }}</h2>
                                <h1>{{ $slide->title }}</h1>
                            </div><!-- end container -->
                        </div><!-- end meta -->
                    </li><!-- end item -->
                @endforeach

            </ul>
        </div><!-- end slider -->
        <div class="search-tabs" id="search-tabs-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link" href="#flights"
                                                           data-toggle="tab"><span><i class="fa fa-plane"></i></span><span
                                        class="d-md-inline-flex d-none st-text">Flights</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#hotels" data-toggle="tab"><span><i
                                            class="fa fa-building"></i></span><span
                                        class="d-md-inline-flex d-none st-text">Hotels</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#tours" data-toggle="tab"><span><i
                                            class="fa fa-suitcase"></i></span><span
                                        class="d-md-inline-flex d-none st-text">Tours</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#cruise" data-toggle="tab"><span><i
                                            class="fa fa-ship"></i></span><span
                                        class="d-md-inline-flex d-none st-text">Cruise</span></a></li>
                            <li class="nav-item"><a class="nav-link" href="#cars" data-toggle="tab"><span><i
                                            class="fa fa-car"></i></span><span
                                        class="d-md-inline-flex d-none st-text">Cars</span></a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="flights" class="tab-pane in active">
                                <form>
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" placeholder="From">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" placeholder="To">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1"
                                                               placeholder="Leaving on">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd2"
                                                               placeholder="Returning on">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Adults</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end flights -->

                            <div id="hotels" class="tab-pane">
                                <form>
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                                            <div class="row">

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1"
                                                               placeholder="Check In">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd2"
                                                               placeholder="Check Out">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                                            <div class="row">

                                                <div class="col-12 col-md-12 col-lg-4">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            <option selected>Rooms</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-4">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            <option selected>Adults</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-4">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            <option selected>Kids</option>
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end hotels -->

                            <div id="tours" class="tab-pane">
                                <form>
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-3 col-xl-4">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control"
                                                       placeholder="City,Country" />
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-3 col-xl-3">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-3">
                                            <div class="row">

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            <option selected>Adults</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            <option selected>Kids</option>
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end tours -->

                            <div id="cruise" class="tab-pane">
                                <form>
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" placeholder="From">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" placeholder="To">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1"
                                                               placeholder="Check In">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd2"
                                                               placeholder="Check Out">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Adults</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end columns -->
                                </form>
                            </div><!-- end cruises -->

                            <div id="cars" class="tab-pane">
                                <form>
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-7 col-xl-6">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-4">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control"
                                                               placeholder="Country" />
                                                        <i class="fa fa-globe"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-md-6 col-lg-4">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control"
                                                               placeholder="City" />
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-md-12 col-lg-4">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control"
                                                               placeholder="Location" />
                                                        <i class="fa fa-street-view"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1"
                                                               placeholder="Check In">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd2"
                                                               placeholder="Check Out">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end cars -->

                        </div><!-- end tab-content -->

                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-tabs -->


    </section><!-- end flexslider-container -->


    <!--==================== VIDEO BANNER ===================-->
    <section id="video-banner" class="banner-padding back-size ">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h2>Watch Video </h2>
                    {{--                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>--}}
                    <div class="margin-small py-5 mt-5 m-sm-0 "></div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn video-btn" id="play-button" data-toggle="modal" data-src="{{asset('videos/PROMO.mp4')}}" data-target="#myModal"><span><i class="fa fa-play mt-0 m-sm-0"></i></span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <!-- 16:9 aspect ratio -->

                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always">></iframe>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end video-banner -->

    <!--=============== HOTEL OFFERS ===============-->
    <section id="hotel-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>Hotels Offers</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">

                        @foreach($hotels as $hotel)
                        <div class="item">
                            <div class="main-block hotel-block">
                                <div class="main-img">
                                    <a href="#">
                                        <img src="{{asset('storage/'.$hotel->image)}}" class="img-fluid" alt="{{$hotel->name}}" />
                                    </a>
{{--                                    <div class="main-mask">--}}
{{--                                        <ul class="list-unstyled list-inline offer-price-1">--}}
{{--                                            <li class="list-inline-item price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>--}}
{{--                                            <li class="list-inline-item rating">--}}
{{--                                                <span><i class="fa fa-star orange"></i></span>--}}
{{--                                                <span><i class="fa fa-star orange"></i></span>--}}
{{--                                                <span><i class="fa fa-star orange"></i></span>--}}
{{--                                                <span><i class="fa fa-star orange"></i></span>--}}
{{--                                                <span><i class="fa fa-star lightgrey"></i></span>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div><!-- end main-mask -->--}}
                                </div><!-- end offer-img -->

                                <div class="main-info hotel-info">
                                    <div class="arrow">
                                        <a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                    </div><!-- end arrow -->

                                    <div class="main-title hotel-title">
                                        <a href="#">{{ucwords($hotel->name)}}</a>
                                        <p>{{ucwords($hotel->location)}}</p>
                                    </div><!-- end hotel-title -->
                                </div><!-- end hotel-info -->
                            </div><!-- end hotel-block -->
                        </div><!-- end item -->
                        @endforeach

                    </div><!-- end owl-hotel-offers -->

                    <div class="view-all text-center">
                        <a href="{{route('hotels')}}" class="btn btn-orange">View All</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end hotel-offers -->


    <!--======================= BEST FEATURES =====================-->
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-dollar"></i></span>
                        <h3>Best Price Guarantee</h3>
                        <p>Book with confidence knowing that Airflourish offers the best prices. If you find a lower price for the same hotel or flight elsewhere, we'll match or beat it. Enjoy competitive rates without compromising on quality.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-lock"></i></span>
                        <h3>Safe and Secure</h3>
                        <p>At Airflourish, we prioritize your safety. We employ stringent security measures to safeguard your personal information and ensure secure transactions. Book with confidence, knowing that your data is protected at all times.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-thumbs-up"></i></span>
                        <h3>Best Travel Agents</h3>
                        <p>Airflourish partners with top travel agents who provide expert advice and personalized assistance. Trust their knowledge and experience to make your journey unforgettable</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-bars"></i></span>
                        <h3>Travel Guidelines</h3>
                        <p>Airflourish offers up-to-date travel guidelines for a seamless trip. From destination-specific requirements to health and safety recommendations, our guidelines provide essential information to plan your journey confidently.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end best-features -->


    <!--=============== TOUR OFFERS ===============-->
    <section id="tour-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>Tour Offers</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-tour-offers">

                        @foreach($tours as $tour)
                        <div class="item">
                            <div class="main-block tour-block">
                                <div class="main-img">
                                    <a href="#">
                                        <img src="{{asset('storage/'.$tour->image)}}" class="img-fluid" alt="{{$tour->title}}" />
                                    </a>
                                </div><!-- end offer-img -->

                                <div class="offer-price-2">
                                    <ul class="list-unstyled">
                                        <li class="price">${{number_format($tour->price)}}<a href="#" >
                                                <span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                    </ul>
                                </div><!-- end offer-price-2 -->

                                <div class="main-info tour-info">
                                    <div class="main-title tour-title">
                                        <a href="#">{{ucwords($tour->title)}} </a>
                                        <p> {{ucwords($tour->location)}}</p>
                                        <div class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star grey"></i></span>
                                        </div>
                                    </div><!-- end tour-title -->
                                </div><!-- end tour-info -->
                            </div><!-- end tour-block -->
                        </div><!-- end item -->
                        @endforeach

                    </div><!-- end owl-tour-offers -->

                    <div class="view-all text-center">
                        <a href="{{route('tours')}}" class="btn btn-orange">View All</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end tour-offers -->






    <!--==================== TESTIMONIALS ====================-->
    <section id="testimonials" class="section-padding back-size">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading white-heading">
                        <h2>Testimonials</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner text-center">
                            @foreach($quotes as $index => $quote)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <blockquote>{{$quote->body}}</blockquote>
                                <div class="rating">
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star lightgrey"></i></span>
                                </div><!-- end rating -->

                                <small>{{$quote->name}}</small>
                            </div><!-- end item -->
                            @endforeach


                        </div><!-- end carousel-inner -->

                        <ol class="carousel-indicators mx-auto">
                            @foreach($quotes as $index => $quote)
                            <li data-target="#quote-carousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"><img src="{{asset('storage/'.$quote->image)}}" class="img-fluid d-block"  alt="client-img">
                            </li>
                            @endforeach

                        </ol>

                    </div><!-- end quote-carousel -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end testimonials -->


    <!--================ LATEST BLOG ==============-->
    <section id="latest-blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>Our Latest News</h2>
                        <hr class="heading-line" />
                    </div>

                    <div class="row">
                        @foreach($news as $post)
                            @php  $post->slug = 'news/'.$post->slug;@endphp
                            <div class="col-md-6 col-lg-4">
                                <div class="main-block latest-block">
                                    <div class="main-img latest-img">
                                        <a href="{{$post->slug}}">
                                            <img src="{{asset('storage/'.$post->image)}}" class="img-fluid" alt="{{$post->title}}" />
                                        </a>
                                    </div><!-- end latest-img -->

                                    <div class="latest-info">
                                        <ul class="list-unstyled">
                                            <li><span><i class="fa fa-calendar-minus-o"></i></span>{{$post->created_at->format('d M Y')}}<span class="author">by: <a href="{{$post->slug}}">Administrator</a></span></li>
                                        </ul>
                                    </div><!-- end latest-info -->

                                    <div class="main-info latest-desc">
                                        <div class="row">
                                            <div class="col-10 col-md-10 main-title">
                                                <a href="{{$post->slug}}">{{ucwords($post->title)}}</a>
                                                <p>{!! html_entity_decode(Str::limit($post->body, 200)) !!}</p>
                                            </div><!-- end columns -->
                                        </div><!-- end row -->

                                        <span class="arrow"><a href="{{$post->slug}}"><i class="fa fa-angle-right"></i></a></span>
                                    </div><!-- end latest-desc -->
                                </div><!-- end latest-block -->
                            </div><!-- end columns -->
                        @endforeach

                    </div><!-- end row -->

                    <div class="view-all text-center">
                        <a href="{{route('news')}}" class="btn btn-orange">View All</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end latest-blog -->



    <!--========================= NEWSLETTER-1 ==========================-->
    <section id="newsletter-1" class="section-padding back-size newsletter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h2>Subscribe Our Newsletter</h2>
                    <p>Subscibe to receive our interesting updates</p>
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg" placeholder="Enter your email address" required/>
                                <span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                            </div>
                        </div>
                    </form>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end newsletter-1 -->

@endsection

@section('ads')
    <div id="popup-ad" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="popup-ad-text">
                                <h4>Get</h4>
                                <h2><span>20%</span> off</h2>
                                <h4>on all flights booking</h4>
                                <p>Why pay more when you can save big on your flights? Take advantage of this limited time offer and book your flights with Airflourish today! </p>
                                <a href="#" class="btn btn-orange">Book Now</a>
                            </div><!-- end popup-ad-text -->
                        </div><!-- end columns -->

                        <div class="col-12 col-md-6">
                            <div class="popup-ad-img">
                                <img src="{{asset('images/about-content-2.png')}}" class="img-fluid" />
                            </div><!-- end popup-ad-img -->
                        </div><!-- end columns -->
                    </div><!-- end row -->

                </div><!-- end modal-bpdy -->
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end popup-ad -->
    </div>
@endsection
