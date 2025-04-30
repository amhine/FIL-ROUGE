<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use app\Models\FavoriHotel;

class Hotel extends Model
{
    use HasFactory;
    
    protected $table = 'hotels';

    protected $fillable = [
        'nom_hotel',
        'description',
        'prix_nuit',
        'nombre_chambre',
        'nombre_salle_debain',
        'adress',
        'ville',
        'image',
        'disponibilite',
        'hebergeur_id',
    ];


    public function hebergeur()
    {
        return $this->belongsTo(User::class, 'hebergeur_id');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'hotel_equipe', 'hotel_id', 'equipe_id');
    }

    public function reservations()
    {
        return $this->hasMany(ReservationHotel::class, 'hotels_id');
    }

   
    public function favorites()
    {
        return $this->hasMany(FavoriHotel::class, 'id_hotels', 'id');
    }
   
   
    
    public function isFavorited()
    {
        $user = Auth::user();
        if (!$user) return false;
    
        return $user->favoritesHotels()->where('id_hotels', $this->id)->exists();
    }
   
}
