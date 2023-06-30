@extends('layouts.master')

@section('content')
    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1 class="page-title">{{$page_title}}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{route('home')}}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{route('news')}}" class="text-white">News</a></li>
                        <li class="breadcrumb-item">{{$page_title}}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--==== INNERPAGE-WRAPPER =====-->
    <section class="innerpage-wrapper">
        <div id="blog-details" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-9 col-xl-9 content-side">
                        <div class="space-right">

                            <div class="blog-post">
                                <div class="main-img blog-post-img">
                                    <img src="{{asset('storage/'.$news->image)}}" class="img-fluid" alt="{{$news->title}}" />
                                    <div class="main-mask blog-post-info">
                                        <ul class="list-inline list-unstyled blog-post-info">
                                            <li class="list-inline-item list-inline-item"><span><i class="fa fa-calendar"></i></span>{{$news->created_at->format('d M Y')}}</li>
                                            <li class="list-inline-item list-inline-item"><span><i class="fa fa-user"></i></span>By: <a href="#">Administrator</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end blog-post-img -->

                                <div class="blog-post-detail">
                                    <h2 class="blog-post-title">{{ucwords($news->title)}}</h2>
                                <p>{!! html_entity_decode($news->body) !!}</p>
                                </div><!-- end blog-post-detail -->
                            </div><!-- end blog-post -->

                        </div><!-- end space-right -->
                    </div><!-- end columns -->

                    <div class="col-12 col-md-12 col-lg-3 col-xl-3 side-bar blog-sidebar right-side-bar">

                        <div class="row">
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

                        </div><!-- end row -->


                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end blog-postings -->
    </section><!-- end innerpage-wrapper -->


@endsection
