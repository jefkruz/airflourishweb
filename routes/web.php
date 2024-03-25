<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// -----------------------------AUTH ROUTES----------------------------------------//
Route::get('register/{username}', [AuthController::class, 'showRegistration'])->name('referralRegister');
Route::get('register', [AuthController::class,'showRegistration'])->name('register');
Route::post('register', [AuthController::class,'register']);
Route::get('login', [AuthController::class,'showLogin'])->name('login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('login', [AuthController::class,'login']);
Route::get('kc/user/{token}', [AuthController::class, 'successfulKcLogin'])->name('kc.login');
//AUTH ROUTES END


Route::post('hotels/hotel_bookings', [HotelController::class, 'makeBooking'])->name('newHotelBooking');
Route::post('hotels/hotel_bookings', [HotelController::class, 'makeBooking'])->name('newHotelBooking');
Route::post('hotels/add_hotel', [HotelController::class, 'logBooking'])->name('logHotelBooking');
Route::post('hotels/process_booking_queue', [HotelController::class, 'processBookingQueue'])->name('processBookingQueue');
Route::delete('hotels/hotel_bookings/{code}', [HotelController::class, 'deleteBooking'])->name('deleteHotelBooking');
Route::patch('hotels/hotel_bookings/{code}', [HotelController::class, 'updateHotelPayment'])->name('updateHotelPayment');
Route::patch('hotels/close_bookings/{code}', [HotelController::class, 'closeHotelBooking'])->name('closeHotelBooking');
Route::post('hotels/bookings/clear', [HotelController::class, 'clearBookings'])->name('clearBookings');
Route::post('bank/account', [BankController::class, 'store'])->name('createBankAccount');
Route::delete('bank/account/{id}', [BankController::class, 'delete'])->name('deleteBankAccount');

// -----------------------------WEB ROUTES----------------------------------------//

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('hotels', [HomeController::class,'hotels'])->name('hotels');
Route::get('services', [HomeController::class,'services'])->name('services');
Route::get('tours', [HomeController::class,'tours'])->name('tours');
Route::get('contact-us', [HomeController::class,'contact'])->name('contact-us');
Route::get('news/{slug}', [HomeController::class, 'viewNews']);
Route::get('news', [HomeController::class, 'news'])->name('news');

// WEB ROUTES END


Route::group(['middleware' => 'isLoggedIn'], function() {
    Route::get('dashboard', [MainController::class,'dashboard'])->name('dashboard');
    Route::get('bookings/{id}/{slug}', [MainController::class,'booking'])->name('booking');


    Route::group(['prefix' => 'ajax'], function(){
        Route::get('hotel', [AjaxController::class, 'fetchHotel'])->name('ajaxGetHotel');
        Route::get('hotel/rooms', [AjaxController::class, 'fetchRoomTypes'])->name('fetchRooms');
        Route::get('rooms/price', [AjaxController::class, 'fetchRoomPrice'])->name('fetchRoomPrice');
        Route::get('rooms/rate', [AjaxController::class, 'fetchRoomRate'])->name('fetchRoomRate');
        Route::get('rooms/available', [AjaxController::class, 'fetchAvailableRooms'])->name('fetchAvailableRooms');
        Route::get('hotel/allocations', [AjaxController::class, 'fetchHotelAllocations'])->name('fetchHotelAllocation');
    });

});




Route::get('clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});


