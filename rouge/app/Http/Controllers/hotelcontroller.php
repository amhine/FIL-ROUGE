<?php



namespace App\Http\Controllers;

use App\Models\Equipement;
use App\Repository\Interface\EquipementInterface;
use App\Repository\Interface\HotelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hotelcontroller extends Controller
{
  
    protected $hotelRepository;
    protected $equipementRepository;

    public function __construct(HotelInterface $hotelRepository, EquipementInterface $equipementRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->equipementRepository = $equipementRepository;
    }

    public function search(Request $request)
    {
        $filters = [
            'nom_hotel' => $request->nom_hotel,
            'disponibilite' => $request->disponibilite,
        ];

        $hotels = $this->hotelRepository->search($filters);
        $equipement = $this->equipementRepository->all();

        return view('touriste.hebergement', compact('hotels', 'equipement'));
    }
    
    
    public function index()
    {
        $userId = Auth::id(); 
        $hotels =$this->hotelRepository->all()->where('hebergeur_id', $userId);
    
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
        $hotelData = [
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
        ];

        $hotel = $this->hotelRepository->create($hotelData);
    
        if ($request->has('equipement')) {
            $hotel->equipements()->attach($request->equipement); 
        }
    
        return redirect()->route('hebergeur.hebergement')->with('success', 'Annonce ajoutée avec succès.');
    }
   
    public function edit($id)
    {
        $userId = Auth::id();
        
        $hotel = $this->hotelRepository->find($id); 
        
        if ($hotel->hebergeur_id !== $userId) {
            return redirect()->route('hebergeur.hebergement')->with('error', 'Annonce introuvable.');
        }
    
        $equipement = Equipement::all();
    
        $equipementsSelectionnes = $hotel->equipements ? $hotel->equipements->pluck('id')->toArray() : [];
    
        return view('hebergeur.edithebergement', compact('hotel', 'equipement', 'equipementsSelectionnes'));
    }
    
    
    

    
    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $hotel = $this->hotelRepository->find($id);

        if ($hotel->hebergeur_id !== $userId) {
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

       $hotelData = [
            'nom_hotel' => $request->nom_hotel,
            'description' => $request->description,
            'prix_nuit' => $request->prix_nuit,
            'nombre_chambre' => $request->nombre_chambre,
            'nombre_salle_debain' => $request->nombre_salle_debain,
            'adress' => $request->adress,
            'ville' => $request->ville,
            'image' => $request->image,
            'disponibilite' => $request->disponibilite,
        ];

        $this->hotelRepository->update($id, $hotelData);
        $hotel->equipements()->sync($request->equipement ?? []);
        return redirect()->route('hebergeur.hebergement')->with('success', 'Annonce mise a jour avec succes');
    }

        
    public function destroy($id)
    {
        $userId = Auth::id();
        $hotel = $this->hotelRepository->find($id);

        if ($hotel->hebergeur_id !== $userId) {
            return redirect()->route('hebergeur.hebergement')->with('error', 'Annonce introuvable ou vous n\'êtes pas autorisé à la supprimer.');
        }

        $this->hotelRepository->delete($id);

        return redirect()->route('hebergeur.hebergement')->with('success', 'Annonce supprimée avec succès.');
    }



}

