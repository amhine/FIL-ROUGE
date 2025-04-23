<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriHotel extends Model
{
    use HasFactory;
    protected $table = 'favori_hotels';

    protected $fillable = [
        'id_touriste',
        'id_hotels',
    ];

    public function tourist()
    {
        return $this->belongsTo(User::class, 'id_touriste');
    }



    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotels');
    }
}
