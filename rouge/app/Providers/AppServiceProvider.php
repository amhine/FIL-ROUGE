<?php

namespace App\Providers;

use App\Repository\EquipementRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interface\UserInterface;
use App\Repository\UserRepository;
use App\Repository\Interface\HotelInterface;
use App\Repository\HotelRepository;
use App\Repository\Interface\EquipementInterface;
use App\Repository\Interface\RestaurantInterface;
use App\Repository\RestaurantRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
 
    $this->app->bind(UserInterface::class, UserRepository::class);
    $this->app->bind(HotelInterface::class, HotelRepository::class);
    $this->app->bind(EquipementInterface::class, EquipementRepository::class);
    $this->app->bind(RestaurantInterface::class,RestaurantRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
