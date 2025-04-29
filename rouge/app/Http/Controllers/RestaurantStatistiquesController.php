<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\ReservationResteau;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestaurantStatistiquesController extends Controller
{
    public function index()
    {
        $resteauId = Auth::id();
        $restaurants = Restaurant::where('id_resteau', $resteauId)->get();

        if ($restaurants->isEmpty()) {
            return view('restaurateur.statistique', [
                'reservations' => collect(),
                'totalReservations' => 0,
                'reservationsParMois' => [],
                'reservationsParStatut' => [],
                'statistiquesParResteau' => [], // Fixed variable name
            ])->with('message', 'Vous n\'avez pas encore d\'annonces publiées.');
        }

        $restaurantIds = $restaurants->pluck('id');
        $reservations = ReservationResteau::whereIn('id_resteau', $restaurantIds)
            ->with(['restaurant', 'tourist'])
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        $totalReservations = ReservationResteau::whereIn('id_resteau', $restaurantIds)->count();

        $reservationsParMois = ReservationResteau::whereIn('id_resteau', $restaurantIds)
            ->get()
            ->groupBy(fn($reservation) => Carbon::parse($reservation->created_at)->format('Y-m'))
            ->map(fn($group) => $group->count())
            ->toArray();

        $reservationsParStatut = ReservationResteau::whereIn('id_resteau', $restaurantIds)
            ->select('status')
            ->get()
            ->groupBy('status')
            ->map(fn($group) => $group->count())
            ->toArray();

        $statistiquesParResteau = $restaurants->mapWithKeys(function ($restaurant) {
            $restaurantReservations = ReservationResteau::where('id_resteau', $restaurant->id)->get();
            return [
                $restaurant->id => [
                    'nom_resteau' => $restaurant->nom_resteau,
                    'total_reservations' => $restaurantReservations->count(),
                    'revenu_total' => $restaurantReservations->where('status', 'confirme')->sum('prix_total'), // Fixed status spelling
                ],
            ];
        })->toArray();

        return view('restaurateur.statistique', compact(
            'reservations',
            'totalReservations',
            'reservationsParMois',
            'reservationsParStatut',
            'statistiquesParResteau'
        ));
    }

    public function detailHotel($hotelId){

        $hotelId = Auth::id();
        $resteau = Restaurant::findOrFail($hotelId);
        return view('restaurateur.details_resteau', compact('resteau'));
    }

}