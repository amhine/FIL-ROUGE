<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class favoricontroller extends Controller
{
    
public function toggleFavorite(Request $request, $id)
{
    $hotel = Hotel::findOrFail($id);
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
    }

    if ($user->favoris()->where('id_hotels', $id)->exists()) {
        $user->favoris()->detach($id);
        $message = 'Hotel retire des favoris.';
    } else {
        $user->favoris()->attach($id);
        $message = 'Hotel des favoris.';
    }
    

    return redirect()->back()->with('success', $message);
}

public function favoris()
{
    $user = Auth::user(); 

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos favoris.');
    }

    $hotels = $user->favoris()->paginate(9); 

    return view('touriste.favori', compact('hotels'));
}
public function toggleFavorite(Request $request, $id)
{
    $resteaux = Restaurant::findOrFail($id);
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour gérer vos favoris.');
    }

    if ($user->favorisR()->where('favori_resteaux.id_resteau', $id)->exists()) {
        $user->favorisR()->detach($id);
        $message = 'Hotel retire des favoris';
    } else {
        $user->favorisR()->attach($id);
        $message = 'Hotel ajouter des favoris';
    }
    

    return redirect()->back()->with('success', $message);
}

public function favorisR()
{
    $user = Auth::user(); 

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos favoris.');
    }

    $resteaux = $user->favorisR()->paginate(9); 

    return view('touriste.favori', compact('restaurants'));
}


}
