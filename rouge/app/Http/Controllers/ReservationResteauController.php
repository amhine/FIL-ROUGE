<?php

namespace App\Http\Controllers;

use App\Models\ReservationResteau;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ReservationResteauController extends Controller
{
    public function create($resteauId)
    {
        try {
            $resteau = Restaurant::findOrFail($resteauId);
            
            $reservations = ReservationResteau::where('id_resteau', $resteau->id)
                ->where('status', 'confirmer')
                ->get();
                
            $heures_indisponibles = [];
            foreach ($reservations as $reservation) {
                if (Carbon::parse($reservation->date_debut)->isToday() || Carbon::parse($reservation->date_debut)->isFuture()) {
                    $heures_indisponibles[] = Carbon::parse($reservation->date_debut)->format('Y-m-d H:i');
                }
            }
            
            $heures_indisponibles = array_unique($heures_indisponibles);
            
            return view('touriste.reservation_resteau', compact('resteau', 'heures_indisponibles'));
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'accès à la page de réservation: ' . $e->getMessage());
            return redirect()->route('restaurants.search')->with('error', 'Une erreur sest produite lors de lacces a la page de reservation.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_resteau' => 'required|exists:restaurants,id',
                'date_debut' => 'required|date_format:Y-m-d H:i|after_or_equal:now', 
            ]);

            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Vous devez etre connecte pour reserver.');
            }

            $resteau = Restaurant::findOrFail($request->id_resteau);
            
            $dateDebut = Carbon::parse($request->date_debut);
            
            if (Carbon::parse($resteau->disponibilite)->isAfter($dateDebut)) {
                return redirect()->back()->with('error', 'Ce restaurant nest disponible qua partir du ' . Carbon::parse($resteau->disponibilite)->format('d/m/Y H:i'));
            }

            $isUnavailable = ReservationResteau::where('id_resteau', $resteau->id)
                ->where('status', 'confirmer')
                ->where('date_debut', $dateDebut)
                ->exists();

            if ($isUnavailable) {
                return redirect()->back()->with('error', 'Ce restaurant nest pas disponible pour lheure selectionnee.');
            }

            $reservation = ReservationResteau::create([
                'date_debut' => $dateDebut,
                'date_fin' => $dateDebut->copy()->addHours(2),
                'id_resteau' => $resteau->id,
                'tourist_id' => Auth::id(),
                'status' => 'attends',
            ]);

            Log::info('Réservation de restaurant créée avec succès: ID ' . $reservation->id);
            return redirect()->route('paiement.resteau', ['reservationId' => $reservation->id])->with('success', 'Reservation effectuee avec succes. Procedez au paiement pour confirmer.');
            
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la réservation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur sest produite lors de la creation de votre reservation.');
        }
    }
}