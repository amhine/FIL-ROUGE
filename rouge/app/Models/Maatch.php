<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maatch extends Model
{
    use HasFactory;

    
    protected $table = 'match';
    protected $fillable = [
        'date',
        'equipe1',
        'equipe2',
        'id_stade',
    ];

    public function stade()
    {
        return $this->belongsTo(Stade::class, 'id_stade');
    }

    public function favorites()
    {
        return $this->hasMany(FavoriMatch::class, 'id_match');
    }
}
