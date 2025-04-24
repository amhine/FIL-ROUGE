<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Restaurant extends Model
{
    use HasFactory;

    
    protected $table = 'restaurants';
    protected $fillable = [
        'nom_resteau',
        'localisation',
        'type_cuisine',
        'capaciter',
        'image',
        'id_resteau',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_resteau');
    }

    public function reservations()
    {
        return $this->hasMany(ReservationResteau::class, 'id_resteau');
    }

   
    public function favorites()
    {
        return $this->hasMany(FavoriResteau::class, 'id_resteau', 'id');
    }
    
  
    public function isFavorited()
    {
        $user = Auth::user();
        if (!$user) return false;
    
        return $user->favoritesRestaurants()->where('favori_resteaux.id_resteau', $this->id)->exists();
    }

  
}
