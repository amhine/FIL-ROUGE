<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\hotelcontroller;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\stadeController;
use App\Http\Controllers\FavorisController;
use App\Models\Restaurant;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HebergeurStatistiquesController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\PaiementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationHotelController;
use App\Http\Controllers\ReservationResteauController;
use App\Http\Controllers\RestaurantStatistiquesController;
use App\Http\Controllers\Trajetcontroller;
use App\Models\PaiementHotel;

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
    return view('auth.login');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'createUser'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





Route::middleware(['auth','roles:Touriste'])->group(function () {
    Route::get('/home', function () {return view('touriste.home');})->name('home');
    Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.index');
    Route::post('/hotel/{id}/favorite', [FavorisController::class, 'toggleHotelFavorite'])->name('favoris.hotel');
    Route::post('/restaurant/{id}/favorite', [FavorisController::class, 'toggleRestaurantFavorite'])->name('favoris.restaurant');
    Route::post('/match/{id}/favorite', [FavorisController::class, 'toggleMatchFavorite'])->name('favoris.match');


    Route::get('/touriste/hotel', [hotelcontroller::class, 'search'])->name('hotel');
    Route::post('/reservations/hotel', [ReservationHotelController::class, 'store'])->name('reservations.hotel.store');
    Route::get('/reservations/hotel/create/{hotelId}', [ReservationHotelController::class, 'create'])->name('reservations.hotel.create');
    Route::get('/payments/hotel/{reservationId}', [PaiementController::class, 'index'])->name('paiement');
    Route::post('/payments/process', [PaiementController::class, 'processPaiement'])->name('paiement.process');
    Route::get('/payments/confirmation/{reservationId}', [PaiementController::class, 'confirmation'])->name('paiement.confirmation');


    Route::get('/touriste/resteau', [RestaurantController::class, 'search'])->name('restaurants.search');
    Route::get('/reservations/resteau/create/{resteauId}', [ReservationResteauController::class, 'create'])->name('reservations.resteau.create');
    Route::post('/reservations/resteau', [ReservationResteauController::class, 'store'])->name('reservations.resteau.store');
    Route::get('/payments/resteau/{reservationId}', [PaiementController::class, 'indexresteau'])->name('paiement.resteau');
    Route::post('/payments/process/resteau', [PaiementController::class, 'processPaiementResteau'])->name('paiement.process.resteau');
    Route::get('/payments/confirmation/{reservationId}', [PaiementController::class, 'confirmationResteau'])->name('paiement.confirmation.resteau');



    Route::get('touriste/stade',[stadeController::class,'index'])->name('stade.afficher');

    Route::get('touriste/matches', [MatcheController::class, 'index'])->name('matche');
    Route::get('touriste/matches/{id}', [MatcheController::class, 'show'])->name('matche.details');

    

    Route::get('touriste/trajets', [Trajetcontroller::class, 'index'])->name('trajet.index');
    Route::post('touriste/trajets', [TrajetController::class, 'search'])->name('trajet.search');

});




Route::middleware(['auth', 'roles:Hébergeur'])->group(function () {
    Route::get('/hebergeur/hebergement', [HotelController::class, 'index'])->name('hebergeur.hebergement');
    Route::get('/hebergeur/hebergement/ajouter', [HotelController::class, 'afficherForm'])->name('hebergeur.hebergement.ajouter');
    Route::post('/hebergeur/hebergement/store', [HotelController::class, 'store'])->name('hebergeur.hebergement.store');
    Route::get('/hebergeur/hebergement/edit/{id}', [HotelController::class, 'edit'])->name('hebergeur.hebergement.edit');
    Route::put('/hebergeur/hebergement/update/{id}', [HotelController::class, 'update'])->name('hebergeur.hebergement.update');
    Route::delete('/hebergeur/hebergement/delete/{id}', [HotelController::class, 'destroy'])->name('hebergeur.hebergement.delete');
    Route::get('/hebergeur/statistiques', [HebergeurStatistiquesController::class, 'index'])->name('hebergeur.statistiques');
    Route::get('/hebergeur/hotel/{hotelId}/detail', [HebergeurStatistiquesController::class, 'detailHotel'])->name('hebergeur.hotel.detail');
    Route::delete('/hebergeur/reservations/{id}/cancel', [HebergeurStatistiquesController::class, 'cancel'])->name('hebergement.reservations.cancel');



});
Route::middleware(['auth', 'roles:Restaurant'])->group(function () {

    Route::get('/resteau/resteaurant', [RestaurantController::class, 'index'])->name('resteau.resteaurant');
    Route::get('/resteau/resteaurant/ajouter', [RestaurantController::class, 'afficherForm'])->name('resteau.resteaurant.ajouter');
    Route::post('/resteau/resteaurant/store', [RestaurantController::class, 'store'])->name('resteau.resteaurant.store');
    Route::get('/resteau/resteaurant/edit/{id}', [RestaurantController::class, 'edit'])->name('resteau.resteaurant.edit');
    Route::put('/resteau/resteaurant/update/{id}', [RestaurantController::class, 'update'])->name('resteau.resteaurant.update');
    Route::delete('/resteau/resteaurant/delete/{id}', [RestaurantController::class, 'destroy'])->name('resteau.resteaurant.delete');
    Route::get('/resteaurant/statistiques', [RestaurantStatistiquesController::class, 'index'])->name('resteau.resteaurant.statistiques');
    Route::get('/resteaurant/hotel/{hotelId}/detail', [RestaurantStatistiquesController::class, 'detailresteau'])->name('resteaurant.resteau.detail');
    Route::delete('/resteaurant/reservations/{id}/cancel', [RestaurantStatistiquesController::class, 'cancel'])->name('reservations.cancel');
});


Route::middleware(['auth', 'roles:Admin'])->group(function () {

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('/users/{user}/toggle-status', [AdminController::class, 'toggleStatus'])->name('users.toggle-status');
Route::get('/admin/hebergements/{id}', [AdminController::class, 'showHebergement'])->name('admin.hebergements.show');
Route::delete('/admin/hebergements/{id}', [AdminController::class, 'deleteHebergement'])->name('admin.hebergements.delete');
Route::get('/admin/Restaurant/{id}', [AdminController::class, 'showRestaurant'])->name('admin.restaurants.show');
Route::delete('/admin/Restaurant/{id}', [AdminController::class, 'deleteRestaurant'])->name('admin.restaurants.delete');
Route::post('/equipement/store', [EquipementController::class, 'store'])->name('equipement.storeMultiple');
Route::delete('/equipement/{id}', [EquipementController::class, 'destroy'])->name('equipement.delete');

});