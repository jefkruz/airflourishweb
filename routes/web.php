<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('register/{username}', [HomeController::class, 'showRegistration'])->name('referralRegister');

Route::get('register', [HomeController::class,'showRegistration'])->name('register');
Route::post('register', [HomeController::class,'register']);
Route::get('login', [HomeController::class,'showLogin'])->name('login');
Route::get('logout', [HomeController::class,'logout'])->name('logout');
Route::post('login', [HomeController::class,'login']);
Route::get('hotels', [HomeController::class,'hotels'])->name('hotels');
Route::get('services', [HomeController::class,'services'])->name('services');
Route::get('tours', [HomeController::class,'tours'])->name('tours');
Route::get('contact-us', [HomeController::class,'contact'])->name('contact-us');
Route::get('news/{slug}', [HomeController::class, 'viewNews']);
Route::get('news', [HomeController::class, 'news'])->name('news');

Route::group(['middleware' => 'isLoggedIn'], function() {
    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
