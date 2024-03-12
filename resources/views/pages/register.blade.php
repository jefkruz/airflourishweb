@extends('layouts.master')
@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us-2">


            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">


                        <div id="contact-form-2" class="innerpage-section-padding">
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-10 mx-auto">
                                    <div class="page-heading">
                                        <h2>Register</h2>
                                        <hr class="heading-line" />
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-9 col-xl-10 content-side">
                                            @include('includes.alerts')
                                            <form class="lg-booking-form"  action="" method="post">
                                                <input type="hidden" name="referral_id" value="{{$refer->id}}" required>
                                                @csrf
                                                @if($refer->username != 'airflourish')
                                                <div class="lg-booking-form-heading">

                                                    <h3>You are being referred by <b>{{ucwords($refer->first_name .' '.$refer->last_name)}}</b></h3>
                                                </div><!-- end lg-bform-heading -->
                                                @endif
                                                <div class="personal-info">

                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control"  name="first_name" required value="{{old('first_name')}}"/>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control"  value="{{old('last_name')}}" name="last_name"/>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control " value="{{old('username')}}" name="username"/>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email Address</label>
                                                                <input type="email" class="form-control" value="{{old('email')}}" name="email"/>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <input type="text" class="form-control"  inputmode="tel" value="{{old('phone')}}" name="phone"/>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="country  form-control  mb-3"  name="country" required>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->name}}" @if (old('country') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>                                                            </div>
                                                        </div><!-- end columns -->
                                                     </div><!-- end row -->


                                                </div><!-- end personal-info -->



                                                <div class="checkbox">
                                                    <label> Not Registered, <a href="{{route('login')}}">click here to login</a></label>
                                                </div><!-- end checkbox -->

                                                <button type="submit" class="btn btn-orange" >Register</button>
                                            </form>

                                        </div><!-- end columns -->

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


@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.country').select2();
        });
    </script>
@endsection
