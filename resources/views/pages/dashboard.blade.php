@extends('layouts.main')

@section('content')

    <div class="row">

        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-danger p-3">
                                <h5 class="text-danger">Welcome Back !</h5>
                                <p>AirFlourish Dashboard</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{$user->image ?? 'images/default.png'}}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ucwords($user->first_name . ' '. $user->last_name)}}</h5>
                            <p class="text-muted mb-0 text-truncate"> {{ '@'.$user->username}}</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">0</h5>
                                        <p class="text-muted mb-0">Referrals</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">0</h5>
                                        <p class="text-muted mb-0">Bookings</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p hidden id="registration">{{url('register/'.$user->username)}}</p>
                                    <button class="btn  btn-danger waves-effect waves-light " onclick="copyToClipboard('Thanks','Your Referral Link has been copied','success','#registration')">Copy Referral Registration  Link  <i class="fa fa-copy ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Available Programmes </h4>
                </div>
            </div>
            <div class="row">
                @foreach($programs as $program)
                <div class="col-xl-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">

                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate  text-center font-size-15"><a href="javascript: void(0);" class="text-dark">{{$program->name}}</a></h5>

                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <a href="{{route('booking',[$program->id,$program->slug])}}" class="btn  btn-danger float-end"><i class="fa-solid fa-thumbtack"></i> Reserve Rooms</a>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end row -->

        </div>
    </div>

@endsection
@section('script')

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
