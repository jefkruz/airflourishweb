<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Currency;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\Programme;
use App\Models\RoomAllocation;
use App\Models\RoomType;
use App\Models\Setting;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function fetchHotel(Request $request)
    {
        $request->validate([
            'hotel' => 'required'
        ]);

        $hotel = Hotel::find($request->hotel);
        $programme = Programme::whereStatus('active')->first();
        $room_types = RoomType::where('hotel_id', $request->hotel)->orderBy('name', 'ASC')->get();
        $allocations = [];
        foreach($room_types as $room){
            $arr = ['name' => $room->name, 'id' => $room->id, 'allocation' => $hotel->allocations($programme->id, $room->id)->allocation];
            array_push($allocations, $arr);
        }

        return response(['status' => true, 'data' => [
            'hotel' => $hotel,
            'rooms' => $allocations
        ]], 200);
    }
    public function fetchHotelAllocations(Request $request)
    {
        $request->validate([
            'programme_id' => 'required',
            'hotel_id' => 'required'
        ]);

        $hotel = Hotel::findOrFail($request->hotel_id);

        $room_types = RoomType::where('hotel_id', $request->hotel_id)->orderBy('name', 'ASC')->get();
        $allocations = [];
        foreach($room_types as $room){
            $arr = ['name' => $room->name, 'id' => $room->id, 'allocation' => $hotel->allocations($request->programme_id, $room->id)];
            array_push($allocations, $arr);
        }

        return response(['data' => $allocations], 200);
    }

    public function fetchAvailableRooms(Request $request)
    {
        $request->validate([
            'room' => 'required'
        ]);

        $programme = Programme::whereStatus('active')->first();
        $allocation = RoomAllocation::where('programme_id', $programme->id)->where('room_id', $request->room)->first();

        $taken = 0;
        $alreadyBooked = HotelBooking::where('programme_id', $programme->id)
            ->where('room_id', $request->room)->where('status', '!=', 'closed')->get();
        foreach($alreadyBooked as $item){
            $taken += $item->rooms;
        }
        $rooms = ($allocation) ? ($allocation->allocation - $taken) : 0;
        return response(['data' => $rooms], 200);
    }

    public function fetchRoomTypes(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required'
        ]);

        $room_types = RoomType::where('hotel_id', $request->hotel_id)->orderBy('name', 'ASC')->get();

        return response(['data' => $room_types], 200);
    }

    public function fetchRoomPrice(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'days' => 'required',
            'rooms' => 'required',
            'currency' => 'required'
        ]);

        $setting = Setting::first();
        $customerCurrency = Currency::findOrFail($request->currency);
        $platformCurrency = Currency::whereCurrency($setting->base_currency)->firstOrFail();
        $room = RoomType::findOrFail($request->room_id);

        $price = $room->rate * $request->days * $request->rooms;

        $converted = ($price / $platformCurrency->exchange) * $customerCurrency->exchange;
        return response(['data' => [
            'raw' => $converted,
            'pretty' => $customerCurrency->currency . ' ' . number_format($converted, 2)
        ]], 200);
    }

    public function fetchRoomRate(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'currency' => 'required'
        ]);

        $setting = Setting::first();
        $customerCurrency = Currency::findOrFail($request->currency);
        $platformCurrency = Currency::whereCurrency($setting->base_currency)->firstOrFail();

        $rate = RoomType::findOrFail($request->room_id)->rate;
        $converted = ($rate / $platformCurrency->exchange) * $customerCurrency->exchange;

        $accounts = BankAccount::where('currency_id', $request->currency)->get();

        return response(['data' => [
            'rate' => $customerCurrency->currency . ' ' . number_format($converted, 2),
            'accounts' => $accounts
        ]]);
    }
}
