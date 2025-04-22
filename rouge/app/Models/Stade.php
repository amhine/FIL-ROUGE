<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    use HasFactory;

    
    protected $table = 'stades';
    protected $fillable = [
        'nom_stade',
        'localisation',
        'capaciter',
        'equipements',
        'id_admin',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function matches()
    {
        return $this->hasMany(Maatch::class, 'id_stade');
    }
}
