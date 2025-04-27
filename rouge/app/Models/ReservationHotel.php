<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationHotel extends Model
{
    use HasFactory;


    
    protected $table = 'reservations_hotels';
    protected $fillable = [
        'date_debut',
        'date_fin',
        'hotels_id',
        'tourist_id',
        'status',
        'nombre_nuits',
       'prix_total',
    ];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotels_id');
    }

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }

    public function paiement()
    {
        return $this->hasOne(PaiementHotel::class, 'reservation_id');
    }
}
