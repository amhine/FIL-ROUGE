<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\EquipementInterface;

class EquipementController extends Controller
{
    protected $equipementRepository;

    public function __construct(EquipementInterface $equipementRepository)
    {
        $this->equipementRepository = $equipementRepository;
    }

    public function index()
    {
        $equipement = $this->equipementRepository->all();
        return view('touriste.hebergement', compact('equipement'));
    }
}
