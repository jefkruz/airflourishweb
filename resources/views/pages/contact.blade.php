@extends('layouts.master')
@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us-2">

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.6570362264595!2d3.3617669776859596!3d6.607840067560329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b924b6d8caddb%3A0x2e1e2f854b69fd35!2sWapsico%20Building!5e0!3m2!1sen!2sng!4v1682955998347!5m2!1sen!2sng"  allowfullscreen loading="lazy" ></iframe>
            </div><!-- end map -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-map-marker"></i></span>
                                    <h4>Find us at</h4>
                                    <p>Street # 25, California.</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-envelope"></i></span>
                                    <h4>Email us at</h4>
                                    <p>info@startravel.com</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-phone"></i></span>
                                    <h4>Call us at</h4>
                                    <p>+123 12345 123456</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->
                        </div><!-- end row -->

                        <div id="contact-form-2" class="innerpage-section-padding">
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-10 mx-auto">
                                    <div class="page-heading">
                                        <h2>Contact Us</h2>
                                        <hr class="heading-line" />
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6 contact-form-2-text">
                                            <p><strong>AIRFLOURISH</strong>  Travels and Tours is a foremost Destination Management Company. We are strategically positioned to provide all of your travel and hospitality needs.</p>
                                            <ul class="social-links list-inline list-unstyled">
                                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
                                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-pinterest-p"></i></span></a></li>
                                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>
                                            </ul>

                                        </div>

                                        <div class="col-12 col-md-6">

                                            <form id="frm_contact" name="frm_contact" method="post">

                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Name" name="txt_name" id="txt_name" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="Email"  name="txt_email" id="txt_email"/>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject"  name="txt_phone" id="txt_phone"/>
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4" placeholder="Your Message" name="txt_message" id="txt_message"></textarea>
                                                </div>
                                                <div class="col-md-12 text-center" id="result_msg"></div>
                                                <div class="text-center">
                                                    <button name="submit" id="submit" class="btn btn-orange">Send</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end contact-us -->
    </section>
    <!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-dollar"></i></span>
                        <h3>Best Price Guarantee</h3>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-lock"></i></span>
                        <h3>Safe and Secure</h3>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-thumbs-up"></i></span>
                        <h3>Best Travel Agents</h3>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->

                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-bars"></i></span>
                        <h3>Travel Guidelines</h3>
                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end best-features -->


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
