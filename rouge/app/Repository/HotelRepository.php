<?php

namespace App\Repository;

use App\Models\Hotel;
use App\Repository\Interface\HotelInterface;

class HotelRepository implements HotelInterface
{
    protected $model;

    public function __construct(Hotel $hotel)
    {
        $this->model = $hotel;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $hotel = $this->find($id);
        $hotel->update($data);
        return $hotel;
    }

    public function delete($id)
    {
        $hotel = $this->find($id);
        return $hotel->delete();
    }
}
