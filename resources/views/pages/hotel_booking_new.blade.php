@extends('layouts.main')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex align-items-center">
                <img src="{{url($user->image ?? 'images/default.png')}}" alt="" class="avatar-sm rounded">
                <div class="ms-3 flex-grow-1">
                    <h3 class="mb-2 card-title">Hello, {{ucwords($user->first_name .' '.$user->last_name)}}</h3>
                    <h6 class="text-muted mb-0">Welcome to AirFlourish Reservation Portal</h6>
                </div>
                {{--                <div>--}}
                {{--                    <a href="javascript:void(0);" class="btn btn-danger"><i class="bx bx-plus align-middle"></i> Make Reservations</a>--}}
                {{--                </div>--}}
            </div>
        </div><!--end col-->

    </div>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger">
                    <h4 class="text-white text-center"><i class="fa fa-clipboard-list"></i> Create New Reservations for {{$program->name}} </h4>
                </div>
                <div class="card-body">
                    <form id="hotelBookingForm" action="{{route('newHotelBooking')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">User</label>

                                @if(count($bookings))
                                        <input type="text" class="form-control" value="{{$customer->title}} {{$customer->first_name}} :: {{$customer->email}}" disabled>
                                        <input type="hidden" name="customer_id" value="{{$customer->id}}" required>
                                    @else

                                        <select name="customer_id" id="customer_id" class="form-control" required readonly="">

{{--                                            @foreach($customers as $customer)--}}
                                                <option {{($user->id == $cid) ? 'selected' : ''}} value="{{$user->id}}">{{$user->title}} {{$user->first_name}}  </option>
{{--                                            @endforeach--}}
                                        </select>

                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">Hotel</label>
                                    <select name="hotel_id" id="hotel_id" class="form-control select2" required>
                                        <option value="">--Select hotel--</option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{$hotel->id}}">{{ucwords($hotel->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">Room Type</label>
                                    <select name="room_type" id="room_type" class="form-control select2" required>
                                        <option value="">--Select hotel first--</option>
                                    </select>
                                </div>
                            </div>

                            <div id="num_of_rooms" style="display: none" class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">Number of rooms</label>
                                    <select name="rooms" id="rooms" class="form-control" required>
                                        <option value="">--Select room type first--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">Check in</label>
                                    <input type="text" id="check_in" class="form-control" name="check_in" placeholder="Check in date" required>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="">Currency</label>
                                    @if(count($bookings))
                                        <input type="hidden" name="currency" value="{{$bookings[0]['currency']}}" required>
                                        <input type="text" value="{{$currency->currency}}" class="form-control" disabled>
                                    @else
                                        <select name="currency" id="currency" class="form-control" required>
                                            <option value="">--Select currency--</option>
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->currency}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div id="accountDiv" class="col-md-4 mb-3" style="display: none">
                                <div class="form-group">
                                    <label for="">Bank Account</label>
                                    @if(count($bookings))
                                        <input type="hidden" name="bank_id" value="{{$bank->id}}" required>
                                        <input type="text" value="{{$bank->bank}}" class="form-control" disabled>
                                    @else
                                        <select name="bank_id" id="bankAccount" class="form-control" required></select>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="row">
                @if(count($bookings))
                    <div class="col-md-12 mb-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h4 class="card-title text-light">Additional Bookings</h4>

                                        <form action="{{route('clearBookings')}}" method="post">
                                            @csrf
                                            <button class="btn btn-danger fa-pull-right">Clear Bookings</button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            @foreach($bookings as $i => $booking)
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">{{$booking['hotel_name']}}</h4>
                                            <p><small>Customer Name:</small> {{$cname}}</p>
                                            <p><small>Number of rooms: </small>{{$booking['rooms']}}</p>
                                            {{--                                    <p><small>Amount: </small>{{$booking['total']}}</p>--}}

                                            @if($i == count($bookings) - 1)
                                                <form action="{{route('processBookingQueue')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info">Checkout Now</button>
                                                </form>

                                            @endif
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Booking Summary</h4>
                            <button id="addHotelBtn" type="button" class="btn btn-outline-dark"><i class="fa fa-plus"></i> Add Another Hotel Booking</button>
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-map-pin text-primary display-4"></i>
                                </div>
                                <h3 id="bookingName"></h3>
                                <p id="bookingEmail"></p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Hotel</p>
                                        </td>
                                        <td>
                                            <h5 id="hotelDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">
                                            <p class="mb-0">Room Type</p>
                                        </td>
                                        <td style="width: 25%">
                                            <h5 id="roomTypeDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="mb-0">Number of Rooms</p>
                                        </td>
                                        <td>
                                            <h5 id="roomDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Check in:</p>
                                        </td>
                                        <td>
                                            <h5 id="checkinDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Check out:</p>
                                        </td>
                                        <td>
                                            <h5 id="checkoutDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Duration of Stay</p>
                                        </td>
                                        <td>
                                            <h5 id="durationDisplay" class="mb-0"><i class="fa fa-spinner fa-spin"></i></h5>
                                        </td>
                                    </tr>

                                    @if(!$bookings || !count($bookings))
                                        <tr class="bg-secondary text-white">
                                            <td>
                                                <p class="mb-0">Price per room</p>
                                            </td>
                                            <td>
                                                <h5 id="rateDisplay" class="mb-0 text-white text-bold"><i class="fa fa-spinner fa-spin"></i></h5>
                                            </td>
                                        </tr>

                                        <tr class="bg-primary text-white">
                                            <td>
                                                <p class="mb-0">Amount Payable</p>
                                            </td>
                                            <td>
                                                <h5 id="paymentDisplay" class="mb-0 text-white text-bold"><i class="fa fa-spinner fa-spin"></i></h5>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <button form="hotelBookingForm" type="submit" class="btn btn-dark fa-pull-right">Proceed <i class="fa fa-arrow-right"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.4.1/dist/css/tempus-dominus.css"
    />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.4.1/dist/js/tempus-dominus.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
        const bookingName = $('#bookingName');
        const bookingEmail = $('#bookingEmail');
        const customer = $('#customer_id');

        const hotelSelect = $('#hotel_id');
        const hotelDisplay = $('#hotelDisplay');
        const roomSelect = $('#room_type');

        const numOfRooms = $('#num_of_rooms');
        const rooms = $('#rooms');
        const roomDisplay = $('#roomDisplay');
        const roomTypeDisplay = $('#roomTypeDisplay');

        const checkIn = $('#check_in');
        const checkinDisplay = $('#checkinDisplay');
        const checkoutDisplay = $('#checkoutDisplay');
        const durationDisplay = $('#durationDisplay');

        const paymentDisplay = $('#paymentDisplay');
        const rateDisplay = $('#rateDisplay');
        const amountInput = $('#amount');

        const currency = $('#currency');
        const accountDiv = $('#accountDiv');
        const bankAccount = $('#bankAccount');

        const addHotelBtn = $('#addHotelBtn');
        const bookingForm = $('#hotelBookingForm');

        amountInput.mask('999999999');

        let selectedDays = 0;
        let numberOfRooms = 0;
        let room_id;

        const picker = new tempusDominus.TempusDominus(document.getElementById('check_in'), {
            localization: {
                format: 'yyyy-MM-dd HH:mm:00'
            },
            dateRange: true,
            multipleDatesSeparator: '=>',
            display: {
                calendarWeeks: true,
                sideBySide: true,
                buttons: {
                    clear: true
                },
            },
            restrictions: {
                minDate: new Date()
            }
        });

        checkIn.on('change', function(){
            const value = $(this).val();
            const range = value.split('=>');
            if(range.length === 2){
                checkinDisplay.html(range[0]);
                const x = range[1].split(' ')[0];
                checkoutDisplay.html(x + ' 12:00:00');
                const first = new Date(range[0]).getTime() / 1000;
                const second = new Date(range[1]).getTime() / 1000;
                const diff = second - first;
                const days = Math.round(diff / (60*60*24));
                selectedDays = days;
                durationDisplay.html(days + ' Day(s)');
            } else {
                checkinDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                checkoutDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                durationDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                resetCalculation();
            }

        });

        hotelSelect.on('change', function(){
            const value = $(this).val();
            if(value.length){
                hotelDisplay.html($('#hotel_id option:selected').text());
                $.ajax({
                    method:"get",
                    data: {hotel_id: value},
                    url: "{{route('fetchRooms')}}",
                    success: function(data){
                        let html = '<option value="">--Select Room--</option>';
                        for(i = 0; i < data.data.length; i++){
                            html += '<option value="' + data.data[i].id + '">' + data.data[i].name + '</option>';
                        }
                        roomSelect.html(html);
                        numOfRooms.show(500);
                    }
                });
            } else {
                roomSelect.html('<option value="">--Select hotel first--</option>');
                roomTypeDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                roomDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                hotelDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                numOfRooms.hide(500);
                resetCalculation();
            }
        });

        currency.on('change', function(){
            const value = $(this).val();
            if(
                value.length
                && room_id
                && numberOfRooms > 0
                && selectedDays > 0
            ){
                fetchRoomRate(value);
                calculateRoomPrice(value);
            } else {
                resetCalculation();
                bankAccount.empty();
            }
        });

        customer.on('change', function(){
            const value = $(this).val();
            if(value.length){
                const text = ($('#customer_id option:selected').text()).split(' :: ');
                bookingName.html(text[0]);
                bookingEmail.html(text[1]);
            } else {
                bookingName.html('<i class="fa fa-spinner fa-spin"></i>');
                bookingEmail.html('<i class="fa fa-spinner fa-spin"></i>');
            }
        });

        roomSelect.on('change', function(){
            const value = $(this).val();
            if(value.length){
                $.ajax({
                    url: "{{route('fetchAvailableRooms')}}",
                    data: {room: value},
                    method: "get",
                    success: function(data){
                        const num = Number(data.data);
                        let html = '<option value="">--Select--</option>';
                        if(num > 0){
                            for(let i = 1; i <= num; i++){
                                html += '<option value="' + i + '">' + i + ' room(s)</option>';
                            }
                        } else {
                            html += '<option value="">There are no rooms available</option>';
                        }

                        rooms.html(html);
                    }
                });
                room_id = value;
                roomTypeDisplay.html($('#room_type option:selected').text());
            } else {
                rooms.html('<option value="">--Select room type first--</option>');
                roomTypeDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
                resetCalculation();
            }
        });

        rooms.on('change', function(){
            const value = $(this).val();
            if(value.length){
                numberOfRooms = value;
                roomDisplay.html(value);
            } else {
                roomDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
            }
        });


        addHotelBtn.on('click', function(e){
            e.preventDefault();
            if(bookingForm.valid()){
                bookingForm.attr('action', '{{route('logHotelBooking')}}').submit();
            }
        });

        function fetchRoomRate(curr){
            $.ajax({
                method: "get",
                url: "{{route('fetchRoomRate')}}",
                data: {room_id: room_id, currency: curr},
                success: function(data){
                    rateDisplay.html(data.data.rate);
                    loadAccounts(data.data.accounts);

                },
                error: function (err) {
                    console.log(err);

                }
            });
        }

        function loadAccounts(accounts){
            let html = '<option value="">--Select account--</option>';
            for(let i = 0; i < accounts.length; i++){
                html += '<option value="' + accounts[i].id + '">' + accounts[i].account_number + ' :: ' + accounts[i].bank + '</option>';
            }

            bankAccount.html(html);
            accountDiv.show();
        }


        function calculateRoomPrice(curr){
            $.ajax({
                method: "get",
                url: "{{route('fetchRoomPrice')}}",
                data: {room_id: room_id, days: selectedDays, rooms: numberOfRooms, currency: curr},
                success: function(data){
                    paymentDisplay.html(data.data.pretty);

                }
            });
        }

        function resetCalculation(){
            selectedDays = 0;
            paymentDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
            rateDisplay.html('<i class="fa fa-spinner fa-spin"></i>');
        }
    </script>
@endsection

