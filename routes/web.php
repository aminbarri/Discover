<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\platController;
use App\Http\Controllers\ReserHCntroller;
use App\Http\Controllers\reservationVController;
use App\Http\Controllers\PlatRestauController;
use App\Http\Controllers\confirmEmailController;





Route::get('/', function () {
    return view('main');
})->name('main');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

//Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['admin','auth']);
    
Route::get('/dashboard', [UserController::class, 'show'])->name('dashboard')->middleware(['admin','auth']);
Route::get('/showclient', [UserController::class, 'showclient'])->name('showclient')->middleware(['admin','auth']);
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware(['admin','auth']);
Route::get('/verify_email/{hash}', [UserController::class, 'verifyemail']);

Route::get('/signup', [UserController::class, 'create'])->name('signup')->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/hotel', [HotelController::class, 'show'])->name('hotels_show')->middleware('auth');
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels_index');
Route::get('/reservationh/{id_hotel}', [HotelController::class, 'showsingle'])->name('reserver_hotel')->middleware('auth');
Route::get('/hotel/create', [HotelController::class, 'create'])->name('hotels_create')->middleware('auth');
Route::post('/hotel/store', [HotelController::class, 'store'])->name('hotels_store')->middleware('auth');
Route::delete('/hotel/{id}', [HotelController::class, 'destroy'])->name('hotels_destroy')->middleware('auth');
Route::get('/hotel/{id}/edit', [HotelController::class, 'edit'])->name('hotels_edit')->middleware('auth');
Route::put('/hotel/{id}', [HotelController::class, 'update'])->name('hotels_update')->middleware('auth');


Route::get('/restau', [RestaurantController::class, 'show'])->name('restau')->middleware('auth');
Route::get('/restau/create', [RestaurantController::class, 'create'])->name('restau_create')->middleware('auth');
Route::post('/restau/store', [RestaurantController::class, 'store'])->name('restau_store')->middleware('auth');
Route::delete('/restau/{id}', [RestaurantController::class, 'destroy'])->name('restau_destroy')->middleware('auth');
Route::get('/restau/{id}/edit', [RestaurantController::class, 'edit'])->name('restau_edit')->middleware('auth');
Route::put('/restau/{id}', [RestaurantController::class, 'update'])->name('restau_update')->middleware('auth');


Route::get('/destination', [DestinationController::class, 'show'])->name('dest')->middleware('auth');
Route::get('/destination/create', [DestinationController::class, 'create'])->name('dest_create')->middleware('auth');
Route::post('/destination/store', [DestinationController::class, 'store'])->name('dest_store')->middleware('auth');
Route::delete('/destination/{id}', [DestinationController::class, 'destroy'])->name('dest_destroy')->middleware('auth');
Route::get('/destination/{id}/edit', [DestinationController::class, 'edit'])->name('dest_edit')->middleware('auth');
Route::put('/destination/{id}', [DestinationController::class, 'update'])->name('dest_update')->middleware('auth');


Route::get('/voyage', [VoyageController::class, 'show'])->name('voyage')->middleware('auth');
Route::get('/voyages', [VoyageController::class, 'index'])->name('voyage_index');
Route::get('/voyages/{id}', [VoyageController::class, 'showsingle'])->name('voyage_showsingle');
Route::get('/voyage/create', [VoyageController::class, 'create'])->name('voyage_create')->middleware('auth');
Route::post('/voyage/store', [VoyageController::class, 'store'])->name('voyage_store')->middleware('auth');
Route::delete('/voyage/{id}', [VoyageController::class, 'destroy'])->name('voyage_destroy')->middleware('auth');
Route::get('/voyage/{id}/edit', [VoyageController::class, 'edit'])->name('voyage_edit')->middleware('auth');
Route::put('/voyage/{id}', [VoyageController::class, 'update'])->name('voyage_update')->middleware('auth');

Route::get('/contact', [MessageController::class, 'create'])->name('message_create');
Route::post('/contact/store', [MessageController::class, 'store'])->name('message_store');
Route::get('/message', [MessageController::class, 'show'])->name('message')->middleware('auth');
Route::get('/message/{id}', [MessageController::class, 'index'])->name('message_show')->middleware('auth');
Route::delete('/message/{id}', [MessageController::class, 'destroy'])->name('messagess.destroy')->middleware('auth');



Route::get('/plat/create', [platController::class, 'create'])->name('plat_create')->middleware('auth');
Route::get('/platlist/{id}', [platController::class, 'index'])->name('plat_list')->middleware('auth');
Route::post('/plat/store', [platController::class, 'store'])->name('plat_store')->middleware('auth');
Route::get('/plat', [platController::class, 'show'])->name('plat')->middleware('auth');
Route::get('/plat/{id}/edit', [platController::class, 'edit'])->name('plat_edit')->middleware('auth');
Route::put('/plat/{id}', [platController::class, 'update'])->name('plat_update')->middleware('auth');
Route::delete('/plat/{id}', [platController::class, 'destroy'])->name('plat_destroy')->middleware('auth');

Route::post('/reservationh/store', [ReserHCntroller::class, 'store'])->name('reservationh_store')->middleware('auth');
Route::get('/Resirvation/list', [ReserHCntroller::class, 'show'])->name('reservationh_show')->middleware('auth');
Route::get('/Resirvation/{id}/edit', [ReserHCntroller::class, 'edit'])->name('reservationh_edit')->middleware('auth');
Route::put('/Resirvation/{id}', [ReserHCntroller::class, 'update'])->name('reservationh_update')->middleware('auth');
Route::delete('/Resirvation/{id}', [ReserHCntroller::class, 'destroy'])->name('reservation_destroy')->middleware('auth');


Route::get('/Resirvationv/list', [reservationVController::class, 'show'])->name('reservationv_show')->middleware('auth');
Route::post('/reservationv/store', [reservationVController::class, 'store'])->name('reservationv_store')->middleware('auth');
Route::get('/Resirvationv/{id}/edit', [reservationVController::class, 'edit'])->name('reservationv_edit')->middleware('auth');
Route::put('/reservationv/{id}', [reservationVController::class, 'update'])->name('reservationv_update')->middleware('auth');
Route::delete('/reservationv/{id}', [reservationVController::class, 'destroy'])->name('reservationv_destroy')->middleware('auth');

Route::get('/addplat/{id}', [PlatRestauController::class, 'show'])->name('addplt.show')->middleware('auth');
Route::get('/addplat/store/{id_plat}/{id_rest}', [PlatRestauController::class, 'store'])->name('addplt.store')->middleware('auth');
Route::delete('/addplat/{id_plat}/{id_rest}', [PlatRestauController::class, 'destroy'])->name('addplt.destroy')->middleware('auth');


Route::get('/confirmation', [confirmEmailController::class, 'index'])->name('confirmation_email');
