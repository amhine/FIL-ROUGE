<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role',
    ];


   


    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'id_resteau');
    }

    public function stades()
    {
        return $this->hasMany(Stade::class, 'id_admin');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'hebergeur_id');
    }

    public function hotelReservations()
    {
        return $this->hasMany(ReservationHotel::class, 'tourist_id');
    }

    public function restaurantReservations()
    {
        return $this->hasMany(ReservationResteau::class, 'tourist_id');
    }

    public function hotelPaiements()
    {
        return $this->hasMany(PaiementHotel::class, 'tourist_id');
    }

    public function restaurantPaiements()
    {
        return $this->hasMany(PaiementResteau::class, 'tourist_id');
    }

    public function favoriteHotels()
    {
        return $this->hasMany(FavoriHotel::class, 'id_touriste');
    }

    public function favoriteRestaurants()
    {
        return $this->hasMany(FavoriResteau::class, 'id_touriste');
    }

    public function favoriteMatches()
    {
        return $this->hasMany(FavoriMatch::class, 'id_touriste');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
