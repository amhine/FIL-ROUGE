<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriResteau extends Model
{
    use HasFactory;

    protected $table = 'favori_resteaux';

    protected $fillable = [
        'id_touriste',
        'id_resteau',
    ];

    public function tourist()
    {
        return $this->belongsTo(User::class, 'id_touriste');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'id_resteau');
    }
}
