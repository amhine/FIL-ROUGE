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
            
            // Récupérer les réservations existantes pour cet hôtel
            $reservations = ReservationHotel::where('hotels_id', $hotel->id)
                ->where('status', 'confirmer')
                ->get();
                
            // Calculer les dates indisponibles
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
            Log::error('Erreur lors de l\'accès à la page de réservation: ' . $e->getMessage());
            return redirect()->route('hotel')->with('error', 'Une erreur s\'est produite lors de l\'accès à la page de réservation.');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validation avec messages personnalisés
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'date_debut' => 'required|date|after_or_equal:today',
                'date_fin' => 'required|date|after:date_debut',
            ], [
                'hotel_id.required' => 'L\'identifiant de l\'hôtel est requis.',
                'hotel_id.exists' => 'Cet hôtel n\'existe pas.',
                'date_debut.required' => 'La date de début est requise.',
                'date_debut.date' => 'Le format de la date de début est invalide.',
                'date_debut.after_or_equal' => 'La date de début doit être aujourd\'hui ou une date future.',
                'date_fin.required' => 'La date de fin est requise.',
                'date_fin.date' => 'Le format de la date de fin est invalide.',
                'date_fin.after' => 'La date de fin doit être postérieure à la date de début.',
            ]);

            // Vérification de l'authentification
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver.');
            }

            // Récupération de l'hôtel
            $hotel = Hotel::findOrFail($request->hotel_id);
            
            $dateDebut = Carbon::parse($request->date_debut);
            $dateFin = Carbon::parse($request->date_fin);
            
            // Vérifier que l'hôtel est disponible à partir de la date indiquée
            if (Carbon::parse($hotel->disponibilite)->isAfter($dateDebut)) {
                return redirect()->back()->with('error', 'Cet hôtel n\'est disponible qu\'à partir du ' . Carbon::parse($hotel->disponibilite)->format('d/m/Y'));
            }
            
            $nombreNuits = $dateDebut->diffInDays($dateFin);
            $totalPrix = $nombreNuits * $hotel->prix_nuit;

            // Vérifier la disponibilité de l'hôtel pour les dates sélectionnées
            $isUnavailable = ReservationHotel::where('hotels_id', $hotel->id)
                ->where('status', 'confirmer')
                ->where(function ($query) use ($dateDebut, $dateFin) {
                    $query->whereBetween('date_debut', [$dateDebut, $dateFin])
                          ->orWhereBetween('date_fin', [$dateDebut, $dateFin])
                          ->orWhere(function ($q) use ($dateDebut, $dateFin) {
                              $q->where('date_debut', '<=', $dateDebut)
                                ->where('date_fin', '>=', $dateFin);
                          });
                })
                ->exists();

            if ($isUnavailable) {
                return redirect()->back()->with('error', 'Cet hôtel n\'est pas disponible pour les dates sélectionnées.');
            }

            // Créer la réservation
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
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Rediriger avec les erreurs de validation
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la réservation: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création de votre réservation: ' . $e->getMessage())->withInput();
        }
    }
}