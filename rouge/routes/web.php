<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\hotelcontroller;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\stadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('touriste.restaurant');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'createUser'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');




Route::get('/touriste/hotel', [hotelcontroller::class, 'search'])->name('hotel');
Route::get('/touriste/resteau', [RestaurantController::class, 'search'])->name('restaurants.search');
Route::get('touriste/stade',[stadeController::class,'index'])->name('stade.afficher');


