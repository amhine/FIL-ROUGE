<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementResteau extends Model
{
    use HasFactory;
    protected $table = 'paiements_resteaux';

    protected $fillable = [
        'reservation_id',
        'tourist_id',
        'date_paiement',
    ];

    public function reservation()
    {
        return $this->belongsTo(ReservationResteau::class, 'reservation_id');
    }

    public function tourist()
    {
        return $this->belongsTo(User::class, 'tourist_id');
    }
}
