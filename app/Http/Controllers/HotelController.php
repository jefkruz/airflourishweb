<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\CheckItem;
use App\Models\CheckList;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\HotelBookingPayment;
use App\Models\Programme;
use App\Models\RoomType;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{
    protected $customersTable;
    protected $bookingTable;
    protected $hotelTable;
    protected $currencyTable;
    protected $roomTable;
    public function __construct()
    {
//        if(!session('user')){
//            return to_route('login');
//        }
        $this->customersTable = (new User())->getTable();
        $this->bookingTable = (new HotelBooking())->getTable();
        $this->hotelTable = (new Hotel())->getTable();
        $this->currencyTable = (new Currency())->getTable();
        $this->roomTable = (new RoomType())->getTable();
    }


    public function deleteBooking($code)
    {
        $bookings = HotelBooking::where('booking_code',$code)->get();
        foreach($bookings as $booking){
            $booking->delete();
        }

        $route = (session('admin')) ? 'admin.hotelBookings' : 'hotel.bookings';
        return to_route($route)->with('message', 'Booking has been deleted');
    }

    public function bookings()
    {
        $customerTbl = $this->customersTable;
        $bookingTbl = $this->bookingTable;
        $hotelTbl = $this->hotelTable;
        $curTbl = $this->currencyTable;
        $m = new MenuController();
//        $bookings = HotelBooking::groupBy('booking_code')->select('*')->get();
        $bookings = HotelBooking::join($customerTbl, $customerTbl.'.id', '=', $bookingTbl.'.customer_id')
            ->join($hotelTbl, $hotelTbl.'.id', '=', $bookingTbl.'.hotel_id')
            ->join($curTbl, $curTbl.'.id', '=', $bookingTbl.'.currency_id')
            ->select(
                $bookingTbl.'.*', $customerTbl.'.title', $customerTbl.'.first_name',
                $customerTbl.'.last_name', $hotelTbl.'.name as hotel', $curTbl.'.currency'
            )->groupBy('booking_code')->get();

        $data['page_title'] = 'Hotel Bookings';
        $data['menu'] = $m->fetchMenu();
        $data['view_booking'] = (session('admin')->role == 'admin') ? 'admin.viewHotelBooking' : 'hotel.viewBooking';
        $data['bookings'] = $bookings;
        $data['create_form'] = (session('admin')->role == 'admin') ? 'admin.hotelBookingForm' : 'hotel.bookingForm';
        return view('pages.hotel_bookings', $data);
    }

    public function viewBooking($id)
    {
        $m = new MenuController();
        $bookingTbl = $this->bookingTable;
        $customerTbl = $this->customersTable;
        $curTbl = $this->currencyTable;
        $hotelTbl = $this->hotelTable;
        $roomTbl = $this->roomTable;
        $amountPaid = 0;
        $bookings = HotelBooking::join($customerTbl, $customerTbl.'.id', '=', $bookingTbl.'.customer_id')
            ->where($bookingTbl.'.booking_code', $id)
            ->join($hotelTbl, $hotelTbl.'.id', '=', $bookingTbl.'.hotel_id')
            ->join($curTbl, $curTbl.'.id', '=', $bookingTbl.'.currency_id')
            ->join($roomTbl, $roomTbl.'.id', '=', $bookingTbl.'.room_id')
            ->select(
                $bookingTbl.'.*', $customerTbl.'.title', $customerTbl.'.first_name',
                $customerTbl.'.last_name', $customerTbl.'.phone', $customerTbl.'.email',
                $hotelTbl.'.name as hotel', $curTbl.'.currency',
                $roomTbl.'.name as room_name', $roomTbl.'.rate as room_rate'
            )->get();

        $payment = HotelBookingPayment::where('booking_code', $bookings[0]->booking_code)->first();
        if($payment){
            $amountPaid = $payment->amount_paid;
        }
        $balance = $bookings->sum('total') - $amountPaid;
        $data['canDelete'] = $amountPaid == 0;
        $data['canModify'] = $balance != 0;
        $data['bank'] = BankAccount::findOrFail($bookings[0]->bank_id);
        $data['page_title'] = 'View Hotel Booking';
        $data['bookings'] = $bookings;
        $data['amount_paid'] = $bookings[0]->currency . ' ' . number_format($amountPaid, 2);
        $data['balance'] = $bookings[0]->currency . ' ' . number_format(($balance), 2);
        $data['menu'] = $m->fetchMenu();
        return view('pages.view_hotel_booking', $data);
    }

    public function showBookingForm()
    {
        $programExists = Programme::whereStatus('active')->exists();
        if(!$programExists){
            return back()->with('error', 'Please set up a program and create room allocations for the various hotels');
        }
        $bookings = session('bookings') ?? [];
        $cid = '';
        if(count($bookings)){
            $ids = [];
            foreach($bookings as $booking){
                array_push($ids, $booking['hotel_id']);
            }
//            $hotels = Hotel::orderBy('name', 'ASC')->get();
            $hotels = Hotel::whereNotIn('id', $ids)->orderBy('name', 'ASC')->get();
            $cid = $bookings[0]['customer_id'];
            $cus = User::find($cid);
            $data['customer'] = $cus;
            $data['currency'] = Currency::find($bookings[0]['currency']);
            $data['bank'] = BankAccount::find($bookings[0]['bank_id']);
            $data['cname'] = trim($cus->title . ' ' . $cus->first_name . ' ' . $cus->last_name);
        } else {
            $hotels = Hotel::orderBy('name', 'ASC')->get();
        }
        $currencies = Currency::all();

        $data['page_title'] = 'New Hotel Booking';
        $data['hotels'] = $hotels;
        $data['customers'] = User::orderBy('last_name', 'ASC')->get();
        $data['currencies'] = $currencies;
        $data['customer_route'] = session('admin')->role . '.createCustomer';
        $data['bookings'] = $bookings;
        $data['cid'] = $cid;
        return view('pages.new_hotel_booking', $data);
//        return view('pages.hotel_booking_new', $data);
    }

    public function clearBookings()
    {
        session()->remove('bookings');
        return back();
    }

    public function hotel()
    {
        $m = new MenuController();
        $data['page_title'] = 'Hotels';
        $data['menu'] = $m->fetchMenu();
        $data['viewHotel'] = (session('admin')->role == 'admin') ? 'admin.viewHotel' : 'hotel.viewHotel';
        $data['hotels'] = Hotel::all();
        return view('pages.hotels', $data);
    }

    public function viewHotel($id)
    {
        $m = new MenuController();
        $hotel = Hotel::findOrFail($id);
        $data['setting'] = Setting::first();
        $data['hotel'] = $hotel;
        $data['page_title'] = 'View Hotel :: ' . $hotel->name;
        $data['room_types'] = RoomType::where('hotel_id', $hotel->id)->get();
        $data['menu'] = $m->fetchMenu();
        return view('pages.view_hotel', $data);
    }

    public function addHotel(Request $request)
    {
        if(session('admin')->role == 'flight'){
            return back()->with('error', 'Insufficient privileges');
        }
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $hotelExists = Hotel::whereName($request->name)->exists();
        if($hotelExists){
            return back()->with('error', 'Hotel exists already');
        }

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->address= $request->address;
        $hotel->save();

        return back()->with('message', 'Hotel has been added');
    }

    public function addRoomType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
            'loyalty_point' => 'required',
            'rate' => 'required'
        ]);

        $typeExists = RoomType::where('hotel_id', $request->hotel_id)->where('name', $request->name)->exists();
        if($typeExists){
            return back()->with('error', 'Room type exists already');
        }

        $type = new RoomType();
        $type->name = $request->name;
        $type->hotel_id = $request->hotel_id;
        $type->loyalty_point = $request->loyalty_point;
        $type->rate = $request->rate;
        $type->save();

        return back()->with('message', 'Room type has been added');
    }

    public function editRoomType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hotel_id' => 'required',
            'loyalty_point' => 'required',
            'rate' => 'required',
            'id' => 'required'
        ]);

        $type = RoomType::findOrFail($request->id);

        $type->name = $request->name;
        $type->hotel_id = $request->hotel_id;
        $type->loyalty_point = $request->loyalty_point;
        $type->rate = $request->rate;
        $type->save();

        return back()->with('message', 'Room type has been updated');
    }

    public function closeHotelBooking($code)
    {
        $bookings = HotelBooking::where('booking_code', $code)->get();
        foreach($bookings as $booking){
            $booking->status = 'closed';
            $booking->save();
        }

        return back()->with('message', 'Booking has been closed');
    }

    public function logBooking(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'hotel_id' => 'required',
            'room_type' => 'required',
            'rooms' => 'required',
            'check_in' => 'required',
            'currency' => 'required',
            'bank_id' => 'required'
        ]);

        $req = $request->input() + [
            'hotel_name' => Hotel::find($request->hotel_id)->name,
            ];

        session()->push('bookings', $req);

        return back();
    }

    public function processBookingQueue()
    {
        $bookings = session('bookings');
        $b = new HotelBooking();
        $code = $b->bookingCode();
        foreach($bookings as $booking){
            $request = json_decode(json_encode($booking));
            $this->createBookingRecord($request, $code);
        }

        $route = (session('user')->role == 'admin') ? 'admin.hotelBookings' : 'hotel.bookings';

        session()->remove('bookings');

        return to_route($route)->with('message', 'Booking saved');
    }

    private function createBookingRecord($request, $code = null)
    {
        $roomType = RoomType::findOrFail($request->room_type);
        $programme = Programme::whereStatus('active')->firstOrFail();

        $adm = new AdminController();

        $booking = new HotelBooking();
        $booking->booking_code = ($code == null) ? $booking->bookingCode() : $code;
        $booking->programme_id = $programme->id;
        $booking->customer_id = $request->customer_id;
        $booking->hotel_id = $request->hotel_id;
        $booking->room_id = $request->room_type;
        $booking->rooms = $request->rooms;
        $booking->bank_id = $request->bank_id;
        $booking->rate = $adm->convertToBaseCurrency($roomType->rate, $request->currency);

        $booking->currency_id = $request->currency;

        $timestamps = explode('=>', $request->check_in);
        $checkIn = strtotime($timestamps[0]);
        $checkOut = strtotime($timestamps[1]);

        $diff = $checkOut - $checkIn;
        $nights = round($diff / (60*60*24));
        $total = $nights * $roomType->rate * $request->rooms;

        $booking->check_in = $checkIn;
        $booking->check_out = $checkOut;
        $booking->nights = $nights;
        $booking->total = $adm->convertToBaseCurrency($total, $request->currency);

        $booking->save();

        return $booking;
    }

    public function makeBooking(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'hotel_id' => 'required',
            'room_type' => 'required',
            'rooms' => 'required',
            'check_in' => 'required',
            'currency' => 'required',
            'bank_id' => 'required'
        ]);

        $bookings = session('bookings');
        $code = null;
        if($bookings && count($bookings)){
            $b = new HotelBooking();
            $code = $b->bookingCode();
            foreach($bookings as $booking){
                $req = json_decode(json_encode($booking));
                $this->createBookingRecord($req, $code);
            }

            session()->remove('bookings');
        }

        $this->createBookingRecord($request, $code);

        $route = (session('user')->role == 'admin') ? 'admin.hotelBookings' : 'hotel.bookings';



        return to_route($route)->with('message', 'Booking saved');

    }

    public function updateHotelPayment($code, Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        $bookings = HotelBooking::where('booking_code',$code)->get();

        $total = $bookings->sum('total');

        $payment = HotelBookingPayment::where('booking_code', $bookings[0]->booking_code)->first();
        if($payment){
            $amountPaid = $payment->amount_paid;
        }
        if(!$payment){
            $payment = new HotelBookingPayment();
            $payment->booking_code = $bookings[0]->booking_code;
            $amountPaid = 0;
        }

        $initialBalance = $total - $amountPaid;
        if($request->amount > $initialBalance){
            return back()->with('error', 'Incorrect amount entered');
        }

        $payment->customer_id = $bookings[0]->customer_id;
        $payment->currency_id = $bookings[0]->currency_id;
        $payment->amount_paid += $request->amount;

        $balance = $total - $payment->amount_paid;
        $payment->balance = $balance;
        $payment->save();

        foreach($bookings as $booking){
            $booking->status = ($balance == 0) ? 'full' : 'partial';
            $booking->save();
        }

        return back()->with('message', 'Booking updated');
    }
    public function checkItem()
    {
        $m = new MenuController();
        $data['page_title'] = 'Check Items';
        $data['menu'] = $m->fetchMenu();
        $data['checkitems'] = CheckItem::all();
        return view('pages.check_items', $data);
    }

    public function addCheckItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $itemExists = CheckItem::where('name', $request->name)->exists();
        if($itemExists){
            return back()->with('error', 'This Check Item  exists already');
        }
        $item = new CheckItem();
        $item->name = $request->name;
        $item->save();

        return back()->with('message', 'Check Item has been added');
    }

    public function editCheckItem(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $item = CheckItem::findOrFail($request->id);
        $item->name = $request->name;
        $item->save();

        return back()->with('message', 'Check Item has been updated');


    }

    public function inspectHotel()
    {
        $m = new MenuController();
        $data['page_title'] = 'Hotel Inspection';
        $data['menu'] = $m->fetchMenu();
        $data['items'] = CheckItem::all();
        $data['user'] = Session::get('admin');
        $user = Session::get('admin');

        if ($user->role == 'admin'){
            $data['inspections'] = CheckList::all();
        }
        else{
            $data['inspections'] = CheckList::where('user_id',$user->id)->get();
        }


        return view('pages.inspections', $data);
    }

    public function addInspection(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'facility_name' => 'required',
            'room_number' => 'required',

        ]);

        $exists = CheckList::where('facility_name', $request->input('facility_name'))
                ->where('room_number', $request->input('room_number'))
                ->exists();
        if($exists){
            return back()->with('error', 'This Room  details has been Inspected already');
        }
        else {
            $form = new CheckList();
            $form->user_id = $request->user_id;
            $form->facility_name= $request->facility_name;
            $form->room_number= $request->room_number;
            $form->remarks = json_encode($request->remarks);
            $form->comments = json_encode($request->reasons);
            $form->save();

            return back()->with('message', 'Inspection Submitted');
        }


    }
}
