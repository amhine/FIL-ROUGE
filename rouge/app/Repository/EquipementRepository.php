<?php

namespace App\Repository;

use App\Models\Equipement;
use App\Repository\Interface\EquipementInterface;

class EquipementRepository implements EquipementInterface
{
    protected $model;

    public function __construct(Equipement $equipement)
    {
        $this->model = $equipement;
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
        $equipement = $this->find($id);
        $equipement->update($data);
        return $equipement;
    }

    public function delete($id)
    {
        $equipement = $this->find($id);
        return $equipement->delete();
    }
}
