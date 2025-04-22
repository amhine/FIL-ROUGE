<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationResteau extends Model
{
    use HasFactory;

    protected $table = 'reservations_resteaux';

    protected $fillable = [
        'date_debut',
        'date_fin',
        'status',
        'id_resteau',
        'tourist_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'id_resteau');
    }

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }

    public function paiement()
    {
        return $this->hasOne(PaiementResteau::class, 'reservation_id');
    }
}
