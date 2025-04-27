<?php

namespace App\Repository;

use App\Models\Restaurant;
use App\Repository\Interface\RestaurantInterface;

class RestaurantRepository implements RestaurantInterface
{
    protected $model;

    public function __construct(Restaurant $restaurant)
    {
        $this->model = $restaurant;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $restaurant = $this->find($id);
        $restaurant->update($data);
        return $restaurant;
    }

    public function delete($id)
    {
        $restaurant = $this->find($id);
        return $restaurant->delete();
    }

    public function search(array $filters)
    {
        $query = $this->model->query();

        if (!empty($filters['nom_restaurant'])) {
            $query->where('nom_restaurant', 'like', '%' . $filters['nom_restaurant'] . '%');
        }

        if (!empty($filters['localisation'])) {
            $query->where('localisation', 'like', '%' . $filters['localisation'] . '%');
        }

        if (!empty($filters['type_cuisine'])) {
            $query->where('type_cuisine', 'like', '%' . $filters['type_cuisine'] . '%');
        }

        return $query->paginate(9);
    }
}