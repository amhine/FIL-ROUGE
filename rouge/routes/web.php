<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\hotelcontroller;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\stadeController;
use App\Http\Controllers\FavorisController;
use App\Models\Restaurant;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MatcheController;
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
// Route::get('/favoris', [hotelcontroller::class, 'favoris'])->name('favoris.index');
// Route::post('/favoris/{id}', [hotelcontroller::class, 'Favorite'])->name('favoris');

// Route::get('/hotel/{id}/favorite', [HotelController::class, 'toggleFavorite'])->name('favoris.hebergement');

// Route::get('/favoris', [HotelController::class, 'favoris'])->name('favoris.index');

// Routes pour les favoris
Route::middleware(['auth'])->group(function () {
    Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.index');
    
    Route::post('/hotel/{id}/favorite', [FavorisController::class, 'toggleHotelFavorite'])->name('favoris.hotel');
    Route::post('/restaurant/{id}/favorite', [FavorisController::class, 'toggleRestaurantFavorite'])->name('favoris.restaurant');
    Route::post('/match/{id}/favorite', [FavorisController::class, 'toggleMatchFavorite'])->name('favoris.match');
});



Route::get('/matches', [MatcheController::class, 'index'])->name('matche');

// Route::get('/resteau/{id}/favorite', [RestaurantController::class, 'toggleFavorite'])->name('favoris.restaurant');