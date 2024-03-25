@extends('layouts.main')

@section('content')

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex align-items-center">
                <img src="{{url($user->image ?? 'images/default.png')}}" alt="" class="avatar-sm rounded">
                <div class="ms-3 flex-grow-1">
                    <h3 class="mb-2 card-title">Hello, {{ucwords($user->first_name .' '.$user->last_name)}}</h3>
                    <h6 class="text-muted mb-0">Make Reservations for {{$program->name}}</h6>
                </div>
{{--                <div>--}}
{{--                    <a href="javascript:void(0);" class="btn btn-danger"><i class="bx bx-plus align-middle"></i> Make Reservations</a>--}}
{{--                </div>--}}
            </div>
        </div><!--end col-->

    </div>
    <hr>

@endsection
@section('script')


@endsection
