<?php

namespace App\Models;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    public function bookingCode()
    {
        $prefix = 'HOTEL';
        $u = new MainController();
        return $u->generateBookingCode($prefix);
    }
}
