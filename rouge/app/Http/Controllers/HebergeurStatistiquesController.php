<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ReservationHotel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HebergeurStatistiquesController extends Controller
{
    public function index()
    {
        $hebergeurId = Auth::id();
        $hotels = Hotel::where('hebergeur_id', $hebergeurId)->get();

        if ($hotels->isEmpty()) {
            return view('hebergeur.statistique', [
                'reservations' => collect(),
                'totalReservations' => 0,
                'reservationsParMois' => [],
                'reservationsParStatut' => [],
                'statistiquesParHotel' => [],
            ])->with('message', 'Vous navez pas encore dannonces publies.');
        }

        $hotelIds = $hotels->pluck('id');
        $reservations = ReservationHotel::whereIn('hotels_id', $hotelIds)
            ->with(['hotel', 'tourist'])
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10); 

        $totalReservations = ReservationHotel::whereIn('hotels_id', $hotelIds)->count();

        $reservationsParMois = ReservationHotel::whereIn('hotels_id', $hotelIds)
            ->get()
            ->groupBy(fn($date) => Carbon::parse($date->created_at)->format('Y-m'))
            ->map(fn($item) => $item->count())
            ->toArray();

        $reservationsParStatut = ReservationHotel::whereIn('hotels_id', $hotelIds)
            ->get()
            ->groupBy('status')
            ->map(fn($item) => $item->count())
            ->toArray();

        $statistiquesParHotel = $hotels->mapWithKeys(function ($hotel) use ($hotelIds) {
            $hotelReservations = ReservationHotel::where('hotels_id', $hotel->id)->get();
            return [
                $hotel->id => [
                    'nom_hotel' => $hotel->nom_hotel,
                    'total_reservations' => $hotelReservations->count(),
                    'revenu_total' => $hotelReservations->where('status', 'confirmer')->sum('prix_total'),
                    'nuits_reservees' => $hotelReservations->where('status', 'confirmer')->sum('nombre_nuits'),
                ],
            ];
        })->toArray();

        return view('hebergeur.statistique', compact(
            'reservations',
            'totalReservations',
            'reservationsParMois',
            'reservationsParStatut',
            'statistiquesParHotel'
        ));
    }

    

    public function detailHotel($hotelId)
    {
        $hotel = Hotel::where('id', $hotelId)
                    ->where('hebergeur_id', Auth::id())
                    ->with('equipements') 
                    ->firstOrFail();

        return view('hebergeur.details_hotel', compact('hotel'));
    }
    public function cancel($id)
    {
        $hotel = ReservationHotel::findOrFail($id);
        $hotel-> update(['status' => 'annuler']);
        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }
}