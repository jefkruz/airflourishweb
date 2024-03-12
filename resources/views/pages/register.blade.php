@include('includes.head')

<body>
<!--====== LOADER =====-->
<div class="loader"></div>

<section>
    <div class="colored-border"></div>
    <div id="full-page-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full-page-title">
                        <h3 class="company-name"><span><i class="fa fa-plane"></i>Air</span>Flourish</h3>
                        <p>  </p>

                    </div><!-- end full-page-title -->

                    <div class="custom-form custom-form-fields">
                        <h3>Register</h3>
                        @include('includes.alerts')
                        <form action="" method="post">
                            <input type="hidden" name="referral_id" value="{{$refer->id}}" required>
                            @csrf
                            @if($refer->username != 'airflourish')
                                <div class="lg-booking-form-heading">

                                    <h3>You are being referred by <b>{{ucwords($refer->first_name .' '.$refer->last_name)}}</b></h3>
                                </div><!-- end lg-bform-heading -->
                            @endif

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name')}}"  required/>
                                <span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{old('last_name')}}"  required/>
                                <span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}"  required/>
                                <span><i class="fa fa-user"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control"  name="email" value="{{old('email')}}" placeholder="Email"  required/>
                                <span><i class="fa fa-envelope"></i></span>
                            </div>

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Phone Number"  inputmode="tel" value="{{old('phone')}}" name="phone"/>
                                    <span><i class="fa fa-phone"></i></span>
                                </div>


                            <div class="form-group">
                                <select class="country    form-control "  name="country" required>
                                    @foreach($countries as $country)
                                        <option value="{{$country->name}}" @if (old('country') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-orange btn-block">Register</button>
                        </form>

                        <div class="other-links">
                            <p class="link-line">Already Have An Account ? <a href="{{route('login')}}">Login</a></p>
                            <br>


                            {{--                            <a class="simple-link" href="#">Forgot Password ?</a>--}}
                        </div><!-- end other-links -->
                    </div><!-- end custom-form -->

                    <p class="full-page-copyright">© <script>document.write(new Date().getFullYear());</script> Airflourish Travels. All rights reserved.</p>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end full-page-form -->
    <div class="colored-border"></div>
</section>
<!-- Page Scripts Starts -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/bootstrap-rtl-4.4.1.min.js')}}"></script>
<script src="{{asset('js/custom-navigation.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.country').select2();
    });
</script>
<!-- Page Scripts Ends -->
</body>
</html>


