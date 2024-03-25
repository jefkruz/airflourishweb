<?php

namespace App\Models;

use App\Http\Controllers\AdminController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model
{
    use HasFactory;

    public function bookingCode()
    {
        $prefix = 'FLIGHT';
        $u = new AdminController();
        return $u->generateBookingCode($prefix);
    }
}
