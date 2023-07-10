@extends('layouts.master')


@section('content')

    <!--=============== PAGE-COVER ==============-->
    <section class="page-cover" id="cover-services">
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
        <div id="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-heading">
                            <h2>Our Services</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->

                        <div class="row">
                            @foreach($services as $service)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="service-block-1">
                                    <div class="service-icon-1">
                                        <span><i class="fa {{$service->icon}}"></i></span>
                                    </div><!-- end service-icon-1 -->

                                    <div class="service-text-1">
                                        <h3>{{ucwords($service->name)}}</h3>
                                        <p>{{$service->body}}</p>
                                    </div><!-- end service-text-1 -->
                                </div><!-- end service-block-1 -->
                            </div><!-- end columns -->
                            @endforeach

                        </div><!-- end row -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end services-section -->


        <div id="why-us" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="page-heading innerpage-heading">
                            <h2>Why Choose Us</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->

                        <div class="row">

                            <div class="col-12 col-md-12 col-lg-7 col-xl-7" id="why-us-tabs">

                                <ul class="nav nav-tabs">
                                    <li class="nav-item active"><a class="nav-link" href="#tb-happy-client" data-toggle="tab"><span><i class="fa fa-smile-o"></i></span>Satisfaction</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tb-satisfaction" data-toggle="tab"><span><i class="fa fa-thumbs-o-up"></i></span>Time and Cost Savings</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tb-daily-tours" data-toggle="tab"><span><i class="fa fa-plane"></i></span>Extensive Travel Options</a></li>
                                </ul><!-- end nav-tabs -->

                                <div class="tab-content">

                                    <div id="tb-happy-client" class="tab-pane in active">
                                         <p>At Airflourish, customer satisfaction is a top priority. We strive to exceed our clients'
                                             expectations by providing exceptional service and personalized attention.
                                             Our team of experienced travel professionals works diligently to understand the unique needs and preferences of each client,
                                             tailoring our services to ensure their utmost satisfaction.</p>
                                            <p> We believe that happy clients are the cornerstone of our success,
                                             and we continuously seek to improve and enhance our services based on client feedback and suggestions.
                                             With a focus on delivering a seamless and enjoyable travel experience,
                                             Airflourish aims to create long-lasting relationships with satisfied clients who can rely on us for all their travel needs.</p>

                                    </div><!-- end tb-happy-client -->

                                    <div id="tb-satisfaction" class="tab-pane">
                                        <p>Airflourish is designed to save clients valuable time and money during the travel planning process. Our user-friendly platform simplifies the booking process, enabling clients to search for and compare hotel and flight options effortlessly. By consolidating multiple options in one place, clients can conveniently review prices, availability, and other essential details, making informed decisions without having to navigate multiple websites. </p>
                                        <p>Additionally, Airflourish's best price guarantee ensures competitive rates, allowing clients to secure cost-effective travel arrangements. With the streamlined and cost-efficient services offered by Airflourish, clients can enjoy significant time and financial savings.</p>
                                    </div><!-- end tb-satisfaction -->

                                    <div id="tb-daily-tours" class="tab-pane">
                                        <p>Airflourish offers a wide range of travel options, providing customers with a diverse selection to choose from. Whether it's hotels or flights, we collaborate with a vast network of trusted travel partners to offer an extensive inventory of options.</p>
                                        <p>This allows our clients to find accommodations and transportation that align with their preferences, budget, and specific travel requirements. By providing a comprehensive array of choices, Airflourish ensures that clients can tailor their travel experiences to suit their individual needs, ensuring maximum satisfaction.</p>

                                    </div><!-- end b-daily-tours -->

                                </div><!-- end tab-content -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-12 col-lg-5 col-xl-5" id="progress-bars">

                                <div class="bar">
                                    <h4>Satisfied Clients</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress_percent" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%"><span>90%</span></div>
                                    </div><!-- end progress -->
                                </div><!-- end bar -->

                                <div class="bar">
                                    <h4>Packages</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress_percent" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width:86%"><span>86%</span></div>
                                    </div><!-- end progress -->
                                </div><!-- end bar -->

                                <div class="bar">
                                    <h4>Accomodation</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress_percent" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%"><span>75%</span></div>
                                    </div><!-- end progress -->
                                </div><!-- end bar -->

                                <div class="bar">
                                    <h4>Price Guarantee</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress_percent" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width:83%"><span>83%</span></div>
                                    </div><!-- end progress -->
                                </div><!-- end bar -->

                            </div><!-- end columns -->

                        </div><!-- end row -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end why-us -->

    </section><!-- end innerpage-wrapper -->

@endsection
