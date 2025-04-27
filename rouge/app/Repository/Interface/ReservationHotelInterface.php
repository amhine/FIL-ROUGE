<?php

namespace App\Repository\Interface;

interface ReservationHotelInterface
{
    public function create(array $data);
    public function all();
}