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
}
