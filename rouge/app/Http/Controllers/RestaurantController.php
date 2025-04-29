<?php

namespace App\Http\Controllers;

use App\Models\ReservationResteau;
use App\Repository\Interface\RestaurantInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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

        $resteau = $this->restaurantRepository->search($filters);

        return view('touriste.restaurant', compact('resteau'));
    }

    public function index()
    {
        $userId = Auth::id();
        $resteau = $this->restaurantRepository->all()->where('id_resteau', $userId);

        return view('restaurateur.restaurant', compact('resteau'));
    }

    public function showRestaurants()
    {
        $restaurants = $this->restaurantRepository->all()->paginate(9);
        $user = Auth::user();

        return view('touriste.restaurants', compact('restaurants', 'user'));
    }

    public function afficherForm()
    {
        return view('restaurateur.form_reservation');
    }


    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une annonce.');
        }
    
        $request->validate([
            'nom_resteau' => 'required|string',
            'localisation' => 'required|string',
            'type_cuisine' => 'required|string',
            'image' => 'required|string',
            'prix' => 'required|integer', 
            'description' => 'required|string',
        ]);
    
        $userId = Auth::id();
        $resteauData = [
            'nom_resteau' => $request->nom_resteau,
            'localisation' => $request->localisation,
            'type_cuisine' => $request->type_cuisine,
            'image' => $request->image,
            'prix' => $request->prix,
            'description' => $request->description,
            'id_resteau' => $userId,
        ];

        $resteau = $this->restaurantRepository->create($resteauData);
    
    
        return redirect()->route('resteau.resteaurant')->with('success', 'Annonce ajoutée avec succès.');
    }

    public function edit($id)
    {
        $userId = Auth::id();
        
        $resteaux = $this->restaurantRepository->find($id); 
        
        if ($resteaux->id_resteau !== $userId) {
            return redirect()->route('resteau.resteaurant')->with('error', 'Annonce introuvable.');
        }
    
        
    
    
        return view('restaurateur.editresteaurant', compact('resteaux'));
    }


    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $resteau = $this->restaurantRepository->find($id);

        if ($resteau->id_resteau  !== $userId) {
            return redirect()->route('resteau.resteaurant')->with('error', 'Annonce introuvable ou vous n\'êtes pas autorisé à la modifier.');
        }

        $request->validate([
            'nom_resteau' => 'required|string',
            'localisation' => 'required|string',
            'type_cuisine' => 'required|string',
            'image' => 'required|string',
            'prix' => 'required|integer',
            'description' => 'required|string',
        ]);

       $resteauData = [
            'nom_resteau' => $request->nom_resteau,
            'localisation' => $request->localisation,
            'type_cuisine' => $request->type_cuisine,
            'image' => $request->image,
            'prix' => $request->prix,
            'description' => $request->description,
        ];

        $this->restaurantRepository->update($id, $resteauData);
        return redirect()->route('resteau.resteaurant')->with('success', 'Annonce mise a jour avec succes');
    }


    public function destroy($id)
    {
        $userId = Auth::id();
        $hotel = $this->restaurantRepository->find($id);

        if ($hotel->id_resteau !== $userId) {
            return redirect()->route('resteau.resteaurant')->with('error', 'Annonce introuvable ou vous n\'êtes pas autorisé à la supprimer.');
        }

        $today = Carbon::today();
        $hasReservations = ReservationResteau::where('id_resteau', $id)
            ->where('status', 'confirmer')
            ->where('date_debut', '>=', $today)
            ->exists();

        if ($hasReservations) {
            return redirect()->route('resteau.resteaurant')->with('alert', 'Impossible de supprimer l\'annonce : des réservations confirmées existent pour aujourd\'hui ou après.');
        }

        $this->restaurantRepository->delete($id);

        return redirect()->route('resteau.resteaurant')->with('success', 'Annonce supprimée avec succès.');
    }


}