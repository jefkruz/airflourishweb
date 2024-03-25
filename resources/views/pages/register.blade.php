<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Register :: {{env('APP_NAME')}}</title>
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
                                    <h3 class="text-danger">Register</h3>
                                    @if($refer->username != 'airflourish')
                                        <div class="text-primary">

                                            <h5>You are being referred by <b class="text-danger">{{ucwords($refer->first_name .' '.$refer->last_name)}}</b></h5>
                                        </div><!-- end lg-bform-heading -->
                                    @endif
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
                            @include('includes.alerts')

                            <form class="needs-validation">

                                @csrf
                                <input type="hidden" name="referral_id" value="{{$refer->id}}" required>

                                <div class="mb-3">
                                    <label  class="form-label">First name<span class="text-danger">*</span></label>

                                    <input type="text" class="form-control"  name="first_name" value="{{old('first_name')}}"  required/>

                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Last Name<span class="text-danger">*</span></label>

                                    <input type="text" class="form-control"  name="last_name" value="{{old('last_name')}}"  required/>

                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Unique Username</label>

                                    <input type="text" class="form-control"  name="username" value="{{old('username')}}"  required/>

                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Email Address<span class="text-danger">*</span></label>

                                    <input type="email" class="form-control"  name="email" value="{{old('email')}}"   required/>
                                </div>

                                <div class="mb-3">
                                    <label  class="form-label">Phone Number<span class="text-danger">*</span></label>

                                    <input type="text" class="form-control"   inputmode="tel" value="{{old('phone')}}" name="phone"/>

                                </div>


                                <div class="mb-3">
                                    <label  class="form-label">Country</label>
                                    <select class=" form-control     country "  name="country" required>
                                        @foreach($countries as $country)
                                            <option value="{{$country->name}}" @if (old('country') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password<span class="text-danger">*</span></label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control"  name="password">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control"  name="password_confirmation">
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
                                    <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-danger"> Login</a> </p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">

                    <div>
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

<script>
    $(document).ready(function() {
        $('.country').select2();
    });
</script>
</body>
</html>

