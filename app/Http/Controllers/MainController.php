<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Currency;
use App\Models\FlightBooking;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\Programme;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function dashboard()
    {

        $data['page_title'] = 'Dashboard';
        $data['user'] = session('user');
        $data['dash_menu'] = true;
        $data['programs'] = Programme::whereStatus('active')->get();
        return view('pages.dashboard',$data);
    }

    public function booking( $id, $slug)
    {
        $data['program'] = Programme::find($id);
        $programExists = Programme::where('id',$id)->whereStatus('active')->first();
        if(!$programExists){
            return back()->with('error', 'This programme is no longer Availabe');
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

        $data['bookings'] = $bookings;
        $data['cid'] = $cid;
        $data['page_title'] = 'Reservations';
        $data['user'] = session('user');

        return view('pages.hotel_booking_new',$data);
    }

    public function addCurrency(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'name' => 'required',
            'rate' => 'required'
        ]);

        $currencyExists = Currency::where('name', $request->name)->orWhere('currency', $request->currency)->exists();
        if($currencyExists){
            return back()->with('error', 'Currency exists');
        }

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->currency = $request->currency;
        $currency->rate = $request->rate;
        $currency->save();

        return back()->with('message', 'Currency added');
    }

    public function generateBookingCode($prefix, $flight = false)
    {
        $str = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $code = $prefix . '-' . substr($shuffled, 5, 5) . rand(10000, 99999);
        while(true){
            $codeExists = ($flight)
                ? FlightBooking::where('booking_code', $code)->exists()
                : HotelBooking::where('booking_code', $code)->exists();
            if(!$codeExists){
                break;
            }
            $this->generateBookingCode($prefix, $flight);
        }

        return $code;
    }

    public function convertToBaseCurrency($amount, $currency_id)
    {
        $setting = Setting::first();
        $platformCurrency = Currency::whereCurrency($setting->base_currency)->firstOrFail();
        $currency = Currency::findOrFail($currency_id);

        return ceil(($amount / $platformCurrency->exchange) * $currency->exchange);
    }
}
