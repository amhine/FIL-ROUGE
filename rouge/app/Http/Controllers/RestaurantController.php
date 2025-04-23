<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class RestaurantController extends Controller
{

    public function search(Request $request)
    {
        $resteaux = Restaurant::query();
    
        if ($request->filled('nom_resteau')) {
            $resteaux->where('nom_resteau', 'like', '%' . $request->nom_resteau . '%');
        }
    
        if ($request->filled('localisation')) {
            $resteaux->where('localisation', 'like', '%' . $request->localisation . '%');
        }
        if ($request->filled('type_cuisine')) {
            $resteaux->where('type_cuisine', 'like', '%' . $request->type_cuisine . '%');
        }


        $resteau = $resteaux->paginate(9);
        
        return view('touriste.restaurant', compact('resteau'));
    }
    // public function index()
    // {
    //     $userId = Auth::id(); 
    //     $resteau = Restaurant::where('id_resteau', $userId)->get();
    
    //     return view('rest.restaurant', compact('restaurants'));
    // }
    public function toggleFavorite(Request $request, $id)
    {
        $hotel = Restaurant::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
        }

        if ($user->favorisR()->where('id_resteau', $id)->exists()) {
            $user->favorisR()->detach($id);
        } else {
            $user->favorisR()->attach($id);
        }
        

        return redirect()->back()->with('success', $message);
    }

    public function favorisR()
    {
        $user = Auth::user(); 
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos favoris.');
        }
    
        $hotels = $user->favorisR()->paginate(9); 
    
        return view('touriste.favori', compact('hotels'));
    }

}
