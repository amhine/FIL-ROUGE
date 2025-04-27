<?php

namespace App\Http\Controllers;

use App\Repository\Interface\RestaurantInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    protected $restaurantRepository;

    public function __construct(RestaurantInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function search(Request $request)
    {
        $filters = [
            'nom_restaurant' => $request->nom_restaurant,
            'localisation' => $request->localisation,
            'type_cuisine' => $request->type_cuisine,
        ];

        $restaurants = $this->restaurantRepository->search($filters);

        return view('touriste.restaurant', compact('restaurants'));
    }

    public function index()
    {
        $userId = Auth::id();
        $restaurants = $this->restaurantRepository->all()->where('restaurateur_id', $userId);

        return view('restaurateur.restaurant', compact('restaurants'));
    }

    public function showRestaurants()
    {
        $restaurants = $this->restaurantRepository->all()->paginate(9);
        $user = Auth::user();

        return view('touriste.restaurants', compact('restaurants', 'user'));
    }
}