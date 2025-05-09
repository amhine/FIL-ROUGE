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

    public function index()
    {
        $user = Auth::user();
        
        $hotels = $user->favoritesHotels()->paginate(3, ['*'], 'hotels');
        $restaurants = $user->favoritesRestaurants()->paginate(3, ['*'], 'restaurants');
        
        return view('touriste.favori', compact('hotels', 'restaurants'));
    }

    public function toggleHotelFavorite($id)
    {
        $hotel = Hotel::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecte pour gerer vos favoris.');
        }
        
        if ($user->favoritesHotels()->where('id_hotels', $id)->exists()) {
            $user->favoritesHotels()->detach($id);
            $message = 'Hotel retire des favoris.';
        } else {
            $user->favoritesHotels()->attach($id);
            $message = 'Hotel ajoute aux favoris.';
        }
        
        return redirect()->back()->with('success', $message);
    }

    public function toggleRestaurantFavorite($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez etre connecte pour gerer vos favoris.');
        }
        
        if ($user->favoritesRestaurants()->where('favori_resteaux.id_resteau', $id)->exists()) {
            $user->favoritesRestaurants()->detach($id);
            $message = 'Restaurant retiré des favoris.';
        } else {
            $user->favoritesRestaurants()->attach($id);
            $message = 'Restaurant ajoute aux favoris.';
        }
        
        return redirect()->back()->with('success', $message);
    }

    public function toggleMatchFavorite($id)
    {
        $match = Maatch::findOrFail($id);
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez etre connecte pour gerer vos favoris.');
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