<?php
// app/Http/Controllers/FavorisController.php
namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Maatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Page d'index des favoris
    public function index()
    {
        $user = Auth::user();
        
        $hotels = $user->favoritesHotels()->paginate(3, ['*'], 'hotels');
        $restaurants = $user->favoritesRestaurants()->paginate(3, ['*'], 'restaurants');
        $matches = $user->favoritesMatches()->paginate(3, ['*'], 'matches');
        
        return view('touriste.favori', compact('hotels', 'restaurants', 'matches'));
    }

    // Toggle favoris pour les hôtels
    public function toggleHotelFavorite($id)
    {
        $hotel = Hotel::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
        }
        
        if ($user->favoritesHotels()->where('id_hotels', $id)->exists()) {
            $user->favoritesHotels()->detach($id);
            $message = 'Hôtel retiré des favoris.';
        } else {
            $user->favoritesHotels()->attach($id);
            $message = 'Hôtel ajouté aux favoris.';
        }
        
        return redirect()->back()->with('success', $message);
    }

    // Toggle favoris pour les restaurants
    public function toggleRestaurantFavorite($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
        }
        
        if ($user->favoritesRestaurants()->where('id_resteau', $id)->exists()) {
            $user->favoritesRestaurants()->detach($id);
            $message = 'Restaurant retiré des favoris.';
        } else {
            $user->favoritesRestaurants()->attach($id);
            $message = 'Restaurant ajouté aux favoris.';
        }
        
        return redirect()->back()->with('success', $message);
    }

    // Toggle favoris pour les matchs
    public function toggleMatchFavorite($id)
    {
        $match = Maatch::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
        }
        
        if ($user->favoritesMatches()->where('id_match', $id)->exists()) {
            $user->favoritesMatches()->detach($id);
            $message = 'Match retiré des favoris.';
        } else {
            $user->favoritesMatches()->attach($id);
            $message = 'Match ajouté aux favoris.';
        }
        
        return redirect()->back()->with('success', $message);
    }







}