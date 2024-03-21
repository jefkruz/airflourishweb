@extends('layouts.master')
@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="dashboard" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="dashboard-heading">
                            <h2>Travel <span>Profile</span></h2>
                            <p>Hi {{$user->first_name. ' ' . $user->last_name}}, Welcome to AirFlourish  Travels!</p>
                            <p hidden id="referrals" >{{url('register'.'/'.$user->username)}}</p>
                            <button class="btn btn-orange btn-outline btn-block btn-lg"  onclick="copyToClipboard('Thank You',' Your Referral Link has been copied','success','#referrals')">Copy your Referral  Link</button>

                        </div><!-- end dashboard-heading -->

                        <div class="dashboard-wrapper">
                            <div class="row">

                                <div class="col-12 col-md-2 col-lg-2 dashboard-nav">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item active"><a class="nav-link" href="{{route('dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                        <li class="nav-item"><a class="nav-link" href="user-profile.html"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="booking.html"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                        <li class="nav-item"><a class="nav-link" href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li>
                                    </ul>
                                </div><!-- end columns -->

                                <div class="col-12 col-md-10 col-lg-10 dashboard-content">
{{--                                    <h2 class="dash-content-title">Click the button below to copy your Referral Link</h2>--}}

                                    <div class="row info-stat">

                                        <div class="col-md-6 col-lg-3">
                                            <div class="stat-block">
                                                <span><i class="fa fa-tachometer"></i></span>
                                                <h3>1548</h3>
                                                <p>Miles</p>
                                            </div><!-- end stat-block -->
                                        </div><!-- end columns -->

                                        <div class="col-md-6 col-lg-3">
                                            <div class="stat-block">
                                                <span><i class="fa fa-globe"></i></span>
                                                <h3>12%</h3>
                                                <p>World</p>
                                            </div><!-- end stat-block -->
                                        </div><!-- end columns -->

                                        <div class="col-md-6 col-lg-3">
                                            <div class="stat-block">
                                                <span><i class="fa fa-building"></i></span>
                                                <h3>312</h3>
                                                <p>Cities</p>
                                            </div><!-- end stat-block -->
                                        </div><!-- end columns -->

                                        <div class="col-md-6 col-lg-3">
                                            <div class="stat-block">
                                                <span><i class="fa fa-paper-plane"></i></span>
                                                <h3>102</h3>
                                                <p>Trips</p>
                                            </div><!-- end stat-block -->
                                        </div><!-- end columns -->

                                    </div><!-- end row -->

                                    <div class="dashboard-listing recent-activity">
                                        <h3 class="dash-listing-heading">Recent Activites</h3>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bars"></i></td>
                                                    <td class="dash-list-text recent-ac-text">Your listing <span>The Star Travel</span> has been approved!</td>
                                                    <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                    <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>The Star Travel</span></td>
                                                    <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                    <td class="dash-list-text recent-ac-text">Someone bookmarked your Norma <span>Spa Center</span> listing!</td>
                                                    <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                    <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>Auto Repair Shop</span></td>
                                                    <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                    <td class="dash-list-text recent-ac-text">Someone bookmarked your <span>The Star Apartment</span> listing!</td>
                                                    <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- end table-responsive -->
                                    </div><!-- end recent-activity -->

                                    <div class="dashboard-listing invoices">
                                        <h3 class="dash-listing-heading">Invoices</h3>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                    <td class="dash-list-text invoice-text">
                                                        <h4 class="invoice-title">Professional Plan</h4>
                                                        <ul class="list-unstyled list-inline invoice-info">
                                                            <li class="list-inline-item invoice-status red">Unpaid</li>
                                                            <li class="list-inline-item invoice-order"> Order: #00214</li>
                                                            <li class="list-inline-item invoice-date"> Date: 25/08/2017</li>
                                                        </ul>
                                                    </td>
                                                    <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                    <td class="dash-list-text invoice-text">
                                                        <h4>Extended Plan</h4>
                                                        <ul class="list-unstyled list-inline invoice-info">
                                                            <li class="list-inline-item invoice-status green">Paid</li>
                                                            <li class="list-inline-item invoice-order"> Order: #00214</li>
                                                            <li class="list-inline-item invoice-date"> Date: 25/08/2017</li>
                                                        </ul>
                                                    </td>
                                                    <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                    <td class="dash-list-text invoice-text">
                                                        <h4>Extended Plan</h4>
                                                        <ul class="list-unstyled list-inline invoice-info">
                                                            <li class="list-inline-item invoice-status red">Unpaid</li>
                                                            <li class="list-inline-item invoice-order"> Order: #00214</li>
                                                            <li class="list-inline-item invoice-date"> Date: 25/08/2017</li>
                                                        </ul>
                                                    </td>
                                                    <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                </tr>

                                                <tr>
                                                    <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                    <td class="dash-list-text invoice-text">
                                                        <h4>Basic Plan</h4>
                                                        <ul class="list-unstyled list-inline invoice-info">
                                                            <li class="list-inline-item invoice-status red">Unpaid</li>
                                                            <li class="list-inline-item invoice-order"> Order: #00214</li>
                                                            <li class="list-inline-item invoice-date"> Date: 25/08/2017</li>
                                                        </ul>
                                                    </td>
                                                    <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- end table-responsive -->
                                    </div><!-- end invoices -->
                                </div><!-- end columns -->

                            </div><!-- end row -->
                        </div><!-- end dashboard-wrapper -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end dashboard -->
    </section>


    <!-- end innerpage-wrapper -->

    <!--===== INNERPAGE-WRAPPER ====-->
{{--    <section class="innerpage-wrapper">--}}
{{--        <div id="popup-ad-page" class="section-padding">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 col-md-12">--}}
{{--                        <h3 class=" mg-bot-30">Click on the button also enable Popup-Ad to show.</h3>--}}
{{--                        <button class="btn btn-orange btn-lg" data-toggle="modal" data-target="#popup-ad">Toggle Popup Ad</button>--}}
{{--                        <div id="popup-ad" class="modal fade" role="dialog">--}}
{{--                            <div class="modal-dialog">--}}
{{--                                <div class="modal-content">--}}

{{--                                    <div class="modal-body">--}}
{{--                                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}

{{--                                        <div class="row">--}}
{{--                                            <div class="col-12 col-md-6">--}}
{{--                                                <div class="popup-ad-text">--}}

{{--                                                    <h2><span class="text-success">SUCCESS</span></h2>--}}
{{--                                                    <h4>Thank You {{$user->first_name. ' ' . $user->last_name}}</h4>--}}
{{--                                                    <p>Your unique Referral Link has been copied</p>--}}

{{--                                                </div><!-- end popup-ad-text -->--}}
{{--                                            </div><!-- end columns -->--}}

{{--                                            <div class="col-12 col-md-6">--}}
{{--                                                <div class="popup-ad-img">--}}
{{--                                                    <img src="{{asset('images/success.png')}}" class="img-fluid" />--}}
{{--                                                </div><!-- end popup-ad-img -->--}}
{{--                                            </div><!-- end columns -->--}}
{{--                                        </div><!-- end row -->--}}

{{--                                    </div><!-- end modal-body -->--}}
{{--                                </div><!-- end modal-content -->--}}
{{--                            </div><!-- end modal-dialog -->--}}
{{--                        </div><!-- end popup-ad -->--}}

{{--                    </div><!-- end columns -->--}}
{{--                </div><!-- end row -->--}}
{{--            </div><!-- end container -->--}}
{{--        </div><!-- end popup-ad-page -->--}}
{{--    </section><!-- end innerpage-wrapper -->--}}


@endsection
@section('scripts')

    <script>
        function copyToClipboard(h1,h5,animicon,element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            /*sweet allert*/
            Swal.fire(
                h1,
                h5,
                animicon
            )
        }
    </script>

@endsection
