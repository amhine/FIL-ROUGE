<?php

namespace App\Repository;

use App\Models\ReservationHotel;
use App\Repository\Interface\ReservationHotelInterface;

class ReservationHotelRepository implements ReservationHotelInterface
{
    protected $model;

    public function __construct(ReservationHotel $reservation)
    {
        $this->model = $reservation;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->with(['hotel','tourist'])->get();
    }
}