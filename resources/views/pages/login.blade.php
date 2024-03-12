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
                        <p><br>  </p>

                    </div><!-- end full-page-title -->

                    <div class="custom-form custom-form-fields">
                        <h3>Login</h3>
                        @include('includes.alerts')
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control"  name="login" value="{{old('login')}}" placeholder=" Email Address or Username"  required/>
                                <span><i class="fa fa-user"></i></span>
                            </div>

                            <button class="btn btn-orange btn-block">Login</button>
                        </form>

                        <div class="other-links">
                            <p class="link-line">New Here ? <a href="{{route('register')}}">Signup</a></p>
                            <br>
                            <br>
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

<!-- Page Scripts Ends -->
</body>
</html>

