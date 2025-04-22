<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriMatch extends Model
{
    use HasFactory;

    protected $table = 'favori_match';

    protected $fillable = [
        'id_touriste',
        'id_match',
    ];

    public function tourist()
    {
        return $this->belongsTo(User::class, 'id_touriste');
    }

    public function match()
    {
        return $this->belongsTo(Maatch::class, 'id_match');
    }
}
