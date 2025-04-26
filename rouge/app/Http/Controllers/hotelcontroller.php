<?php



namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hotelcontroller extends Controller
{
    
    public function search(Request $request)
    {
        $hotel = Hotel::query();

        if ($request->filled('nom_hotel')) {
            $hotel->where('nom_hotel', 'like', '%' . $request->nom_hotel . '%');
        }

        if ($request->filled('disponibilite')) {
            $hotel->where('disponibilite', '>=', $request->disponibilite);
        }

        $hotels= $hotel->paginate(9);
        $equipement= Equipement::all();
        return view('touriste.hebergement', compact('hotels', 'equipement'));
    }

    
    
    public function index()
    {
        $userId = Auth::id(); 
        $hotels = Hotel::where('hebergeur_id', $userId)->with('equipements')->get();
    
        return view('hebergeur.afficherhebergement', compact('hotels'));
    }


    
    public function afficherForm()
    {
        $equipement = Equipement::all(); 
        
        return view('hebergeur.form', compact('equipement'));
    }

   
    
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une annonce.');
        }
    
        $request->validate([
            'nom_hotel' => 'required|string',
            'description' => 'required|string',
            'prix_nuit' => 'required|numeric',
            'nombre_chambre' => 'required|integer',
            'nombre_salle_debain' => 'required|integer', 
            'adress' => 'required|string',
            'ville' => 'required|string',
            'image' => 'required|string',
            'disponibilite' => 'required|date|after_or_equal:today',
            'equipement' => 'nullable|array',
        ]);
    
        $userId = Auth::id();
        $hotel = Hotel::create([
            'nom_hotel' => $request->nom_hotel,
            'description' => $request->description,
            'prix_nuit' => $request->prix_nuit,
            'nombre_chambre' => $request->nombre_chambre,
            'nombre_salle_debain' => $request->nombre_salle_debain,
            'adress' => $request->adress,
            'ville' => $request->ville,
            'image' => $request->image,
            'disponibilite' => $request->disponibilite,
            'hebergeur_id' => $userId,
        ]);
    
        if ($request->has('equipement')) {
            $hotel->equipements()->attach($request->equipement); 
        }
    
        return redirect()->route('hebergeur.hebergement')->with('success', 'Annonce ajoutée avec succès.');
    }
   
    public function edit($id)
    {
        $userId = Auth::id();
        
        $hotel = Hotel::where('hebergeur_id', $userId)->where('id', $id)->with('equipements') ->first(); 
        
        if (!$hotel) {
            return redirect()->route('hebergeur.hebergement')->with('error', 'Annonce introuvable.');
        }
    
        $equipement = Equipement::all();
    
        $equipementsSelectionnes = $hotel->equipements ? $hotel->equipements->pluck('id')->toArray() : [];
    
        return view('hebergeur.edithebergement', compact('hotel', 'equipement', 'equipementsSelectionnes'));
    }
    
    
    

    
    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $hotel = Hotel::where('hebergeur_id', $userId)->where('id', $id)->first();
        
        if (!$hotel) {
            return redirect()->route('hebergeur.hebergement')->with('error', 'Annonce introuvable ou vous n\'êtes pas autorisé à la modifier.');
        }
        $request->validate([
            'nom_hotel' => 'required|string|max:255',
            'description' => 'required|string',
            'prix_nuit' => 'required|numeric|min:0',
            'nombre_chambre' => 'required|integer|min:0',
            'nombre_salle_debain' => 'required|integer|min:0',
            'adress' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'disponibilite' => 'required|date',
            'equipement' => 'array',
        ]);

        $hotel->update([
            'nom_hotel' => $request->nom_hotel,
            'prix_nuit' => $request->prix_nuit,
            'description' => $request->description,
            'nombre_chambre' => $request->nombre_chambre,
            'nombre_salle_debain' => $request->nombre_salle_debain,
            'adress' => $request->adress,
            'ville' => $request->ville,
            'disponibilite' => $request->disponibilite,
            'image' => $request->image,
        ]);

        $hotel->equipements()->sync($request->equipement ?? []);

        return redirect()->route('hebergeur.hebergement')->with('success', 'Annonce mise a jour avec succes');
    }

        
    public function destroy($id)
    {
        $hotel = Hotel::where('id', $id)->first();

        $hotel->delete();

        return redirect()->route('hebergeur.hebergement');
    }




}

