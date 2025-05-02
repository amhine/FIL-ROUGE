<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrajetController extends Controller
{
    public function index()
    {
        $json = Storage::get('trajet.json');
        $data = json_decode($json, true);

        $cities = $data['cities'];
        $transportModes = $data['transportModes'];

        return view('touriste.trajet', compact('cities', 'transportModes'));
    }

    public function search(Request $request)
    {
        $json = Storage::get('trajet.json');
        $data = json_decode($json, true);
    
        $cities = $data['cities'];
        $transportModes = collect($data['transportModes']); 
        $routes = $data['routes'];
    
       
        $validated = $request->validate([
            'departure' => 'required|string',
            'arrival' => 'required|string|different:departure',
            'transport' => 'nullable|string'
        ]);
    
        $departure = $request->input('departure');
        $arrival = $request->input('arrival');
        $transport = $request->input('transport');
    
        $departureCity = collect($cities)->firstWhere('id', $departure);
        $arrivalCity = collect($cities)->firstWhere('id', $arrival);
    
        if (!$departureCity || !$arrivalCity) {
            return redirect()->back()->with('error', 'Ville de départ ou d\'arrivée invalide.');
        }
    
        $filteredRoutes = collect($routes)->filter(function ($route) use ($departure, $arrival) {
            return $route['departure'] === $departure && $route['arrival'] === $arrival;
        })->values()->toArray();
    
        if (empty($filteredRoutes)) {
            return redirect()->back()->with('error', 'Aucun trajet trouvé entre ces villes.');
        }
    
        if ($transport) {
            $filteredRoutes = array_filter($filteredRoutes, function ($route) use ($transport) {
                return isset($route['duration'][$transport]) && $route['duration'][$transport] !== null;
            });
        }
    
        if (empty($filteredRoutes)) {
            return redirect()->back()->with('error', 'Aucun trajet disponible pour le mode de transport sélectionné.');
        }
    
        return view('touriste.trajet', [
            'cities' => $cities,
            'transportModes' => $transportModes,
            'routes' => $filteredRoutes,
            'departureCity' => $departureCity,
            'arrivalCity' => $arrivalCity,
            'transport' => $transport
        ]);
    }
}