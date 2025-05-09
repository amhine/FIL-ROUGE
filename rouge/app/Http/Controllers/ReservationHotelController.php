<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ReservationHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ReservationHotelController extends Controller
{
    public function create($hotelId)
    {
        try {
            $hotel = Hotel::findOrFail($hotelId);
            
            $reservations = ReservationHotel::where('hotels_id', $hotel->id)
                ->where('status', 'confirmer')->get();
                
            $dates_indisponibles = [];
            foreach ($reservations as $reservation) {
                $current = Carbon::parse($reservation->date_debut);
                $end = Carbon::parse($reservation->date_fin);
                
                while ($current <= $end) {
                    $dates_indisponibles[] = $current->format('Y-m-d');
                    $current->addDay();
                }
            }
            
            $dates_indisponibles = array_unique($dates_indisponibles);
            
            return view('touriste.reservation_hotel', compact('hotel', 'dates_indisponibles'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de l accès à la page de réservation: ' . $e->getMessage());
            return redirect()->route('hotel')->with('error', 'Une erreur s est produite lors de l accès à la page de réservation.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'date_debut' => 'required|date|after_or_equal:today',
                'date_fin' => 'required|date|after:date_debut',
            ]);

            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver.');
            }

            $hotel = Hotel::findOrFail($request->hotel_id);
            
            $dateDebut = Carbon::parse($request->date_debut);
            $dateFin = Carbon::parse($request->date_fin);
            
            if (Carbon::parse($hotel->disponibilite)->isAfter($dateDebut)) {
                return redirect()->back()->with('error', 'Cet hôtel n\'est disponible qu\'à partir du ' . Carbon::parse($hotel->disponibilite)->format('d/m/Y'));
            }
            
            $nombreNuits = $dateDebut->diffInDays($dateFin);
            $totalPrix = $nombreNuits * $hotel->prix_nuit;

            $isUnavailable = ReservationHotel::where('hotels_id', $hotel->id)
                ->where('status', 'confirmer')
                ->where(function ($query) use ($dateDebut, $dateFin) {
                    $query->where(function ($q) use ($dateDebut, $dateFin) {
                        $q->where('date_debut', '<=', $dateFin)
                        ->where('date_fin', '>=', $dateDebut);
                    });
                })
                ->exists();

            if ($isUnavailable) {
                return redirect()->back()->with('error', 'Cet hôtel n\'est pas disponible pour les dates sélectionnées.');
            }

            $reservation = ReservationHotel::create([
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'hotels_id' => $hotel->id,
                'tourist_id' => Auth::id(),
                'status' => 'attends',
                'nombre_nuits' => $nombreNuits,
                'prix_total' => $totalPrix,
            ]);

            Log::info('Réservation créée avec succès: ID ' . $reservation->id);
            return redirect()->route('paiement', ['reservationId' => $reservation->id])->with('success', 'Réservation effectuée avec succès. Procédez au paiement pour confirmer.');
            
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la réservation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est produite lors de la création de votre réservation: ' . $e->getMessage())->withInput();
        }
    }
}