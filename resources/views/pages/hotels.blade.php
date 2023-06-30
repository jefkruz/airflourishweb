@extends('layouts.master')

@section('content')

    <!--=================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-hotel-grid-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{$page_title}}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('hotels')}}">Home</a></li>
                        <li class="breadcrumb-item">{{$page_title}}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="hotel-grid" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-9 col-xl-9 content-side">
                        <div class="row">

                            @foreach ($hotels as $hotel)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="grid-block main-block h-grid-block">
                                    <div class="main-img h-grid-img">
                                        <a href="#">
                                            <img src="{{asset('storage/'.$hotel->image)}}" class="img-fluid" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
{{--                                                <li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>--}}
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end h-grid-img -->

                                    <div class="block-info h-grid-info">
                                        <div class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </div><!-- end rating -->

                                        <h3 class="block-title"><a href="#">{{ucwords($hotel->name)}}</a></h3>
                                        <p class="block-minor">{{ucwords($hotel->address)}}</p>
{{--                                        <p></p>--}}
{{--                                        <div class="grid-btn">--}}
{{--                                            <a href="hotel-detail-left-sidebar.html" class="btn btn-orange btn-block btn-lg">View More</a>--}}
{{--                                        </div><!-- end grid-btn -->--}}
                                    </div><!-- end h-grid-info -->
                                </div><!-- end h-grid-block -->
                            </div><!-- end columns -->
                                @endforeach

                        </div><!-- end row -->

{{--                        <div class="pages">--}}
{{--                            <ol class="pagination justify-content-center">--}}
{{--                                <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>--}}
{{--                                <li class="active"><a href="#">1</a></li>--}}
{{--                                <li><a href="#">2</a></li>--}}
{{--                                <li><a href="#">3</a></li>--}}
{{--                                <li><a href="#">4</a></li>--}}
{{--                                <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>--}}
{{--                            </ol>--}}
{{--                        </div><!-- end pages -->--}}
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
        </div><!-- end hotel-grid -->
    </section><!-- end innerpage-wrapper -->

@endsection
