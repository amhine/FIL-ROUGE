<?php

namespace App\Http\Controllers;

use App\Models\ReservationHotel;
use App\Models\PaiementHotel;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmed;
use Carbon\Carbon;

class PaiementController extends Controller
{
    public function index($reservationId)
    {
        $reservation = ReservationHotel::with('hotel')->findOrFail($reservationId);
        
        if (Auth::id() != $reservation->tourist_id) {
            return redirect()->route('hotel')->with('error', 'Vous etes pas autorise a acceder a cette page.');
        }
        
        $nombreDeNuits = $reservation->nombre_nuits;
        $prixTotal = $reservation->prix_total;
        
        return view('touriste.paiement', compact('reservation', 'nombreDeNuits', 'prixTotal'));
    }
    
    public function confirmation($reservationId)
    {
        $reservation = ReservationHotel::with(['hotel', 'tourist'])->findOrFail($reservationId);
        
        if (Auth::id() != $reservation->tourist_id) {
            return redirect()->route('hotel')->with('error', 'Vous etes pas autorise a acceder  cette page.');
        }
        
        $proprietaire = User::findOrFail($reservation->hotel->hebergeur_id);
        
        return view('touriste.confirmation', compact('reservation', 'proprietaire'));
    }
    
    public function processPaiement(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations_hotels,id',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        $reservationId = $request->reservation_id;
        $reservation = ReservationHotel::findOrFail($reservationId);
        
        if (Auth::id() != $reservation->tourist_id) {
            return redirect()->route('hotel')->with('error', 'Vous etes pas autorise a effectuer cette action.');
        }
        
        PaiementHotel::create([
            'reservation_id' => $reservationId,
            'tourist_id' => Auth::id(),
            'date_paiement' => now(),
            'prix' => $reservation->prix_total,
            'status' => 'completer',
        ]);
        
        $reservation->update([
            'status' => 'confirmer'
        ]);
        Mail::to($request->email)->send(new ReservationConfirmed($reservation));
        return redirect()->route('hotel')->with('success', 'Paiement confirme avec succes !');

    }
}