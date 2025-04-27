<?php

namespace App\Repository;

use App\Models\Hotel;
use App\Repository\Interface\HotelInterface;

class HotelRepository implements HotelInterface
{
    protected $hotel;

    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function all()
    {
        return $this->hotel->with('equipements')->get();
    }

    public function find($id)
    {
        return $this->hotel->with('equipements')->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->hotel->create($data);
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
    public function search(array $filters)
    {
        $query = $this->hotel->query()->with('equipements');

        if (!empty($filters['nom_hotel'])) {
            $query->where('nom_hotel', 'like', '%' . $filters['nom_hotel'] . '%');
        }

        if (!empty($filters['disponibilite'])) {
            $query->where('disponibilite', '>=', $filters['disponibilite']);
        }

        return $query->paginate(9);
    }
}
