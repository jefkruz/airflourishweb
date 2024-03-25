<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Login:: {{env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="AirFlourish Limited" name="description" />
    <meta content="Department of Corporate Affairs" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{url('images/favicon.png')}}">
    <!-- Bootstrap Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="{{url('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App Css-->
    <link href="{{url('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h3 class="text-danger">Login</h3>

                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{route('home')}}">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('images/favicon.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            <form class="needs-validation" >

                                @csrf



                                <div class="mb-3">
                                    <label  class="form-label">Email Address<span class="text-danger">*</span></label>

                                    <input type="email" class="form-control"  name="email" value="{{old('email')}}"   required/>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Password<span class="text-danger">*</span></label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control"  name="password">
                                    </div>
                                </div>



                                <div class="mt-4 d-grid">
                                    <button class="btn btn-danger waves-effect waves-light" type="submit">Register</button>
                                </div>

                                <div class="mt-4 text-center d-grid">
                                    <h5 class="font-size-14 mb-3 text-center">OR</h5>
                                    <a class="btn  btn-outline-primary waves-effect waves-light"  href="https://accounts.kingsch.at/?client_id=com.kingschat&scopes=[%22conference_calls%22]&post_redirect=true&redirect_uri={{route('authLogin')}}" > <img src="https://kingsch.at/h/css/images/favicon.ico" alt="">
                                        Login with KingsChat</a>

                                </div>

                                <div class="mt-4 text-center">
                                    <a href="#" class="text-muted"><i class="fa fa-lock"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
                        <p>Don't have an account ? <a href="{{route('register')}}" class="fw-medium text-primary"> Signup now </a> </p>
                        <p>© <script>document.write(new Date().getFullYear())</script> {{env('APP_NAME')}} <i class="mdi mdi-heart text-danger"></i> </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- App js -->

<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</body>
</html>

