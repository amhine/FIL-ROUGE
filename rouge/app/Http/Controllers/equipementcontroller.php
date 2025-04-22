<?php
namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function index()
    {
        $equipement = Equipement::all();
        return view('touriste.hebergement', compact('equipement'));
    }
}
