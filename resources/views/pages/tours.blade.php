@extends('layouts.master')


@section('content')



    <!--================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-tour-grid-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{$page_title}}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">{{$page_title}}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="tour-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-9 col-xl-9 content-side">

                        @foreach($tours as $tour)
                        <div class="list-block main-block t-list-block">
                            <div class="list-content">
                                <div class="main-img list-img t-list-img">
                                    <a href="#">
                                        <img src="{{asset('storage/'.$tour->image)}}" class="img-fluid" alt="{{$tour->title}}" />
                                    </a>
                                    <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="list-inline-item price">${{number_format($tour->price)}}<span class="divider">|</span><span class="pkg">{{$tour->days}} Days Tour</span></li>
                                            <li class="list-inline-item rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star lightgrey"></i></span>
                                            </li>
                                        </ul>
                                    </div><!-- end main-mask -->
                                </div><!-- end t-list-img -->

                                <div class="list-info t-list-info">
                                    <h3 class="block-title"><a href="#">Orlando</a></h3>
                                    <p class="block-minor">{{$tour->people}}</p>
                                    <p>{{$tour->description}}</p>
                                    <a href="#" class="btn btn-orange btn-lg">View More</a>
                                </div><!-- end t-list-info -->
                            </div><!-- end list-content -->
                        </div><!-- end t-list-block -->

                        @endforeach
                    <!-- end pages -->
                    </div><!-- end columns -->

                    <div class="col-12 col-md-12 col-lg-3 side-bar right-side-bar">

                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="side-bar-block contact">
                                <h2 class="side-bar-heading">Contact Us</h2>
                                <div class="c-list">
                                    <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                    <div class="text"><p > <a href="mailto:info.sales@airflourish.com" class="text-danger">info.sales@airflourish.com</a></p></div>
                                </div><!-- end c-list -->

                                <div class="c-list">
                                    <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                    <div class="text"><p> <a href="tel:+234 913 4779 928" class="text-danger">+234 913 4779 928</a></p></div>
                                </div><!-- end c-list -->

                                <div class="c-list">
                                    <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                    <div class="text"><p>Address: 21/23 Billings Way Oregun.</p></div>
                                </div><!-- end c-list -->
                            </div><!-- end side-bar-block -->
                        </div>

                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end tour-listing -->
    </section><!-- end innerpage-wrapper -->


@endsection
