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
        $hotels = Hotel::where('hebergeur_id', $userId)->with('equipement')->get();
    
        return view('hebergeur.hebergement', compact('hotels'));
    }


    
    public function afficherForm()
    {
        $equipement = Equipement::all(); 
        
        return view('hebergeur.form', compact('equipement'));
    }

   
    // public function store(Request $request)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une annonce.');
    //     }

    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'prixparnuit' => 'required|numeric|min:0',
    //         'nbrchambre' => 'required|integer|min:0',
    //         'nbrsallesebain' => 'required|integer|min:0',
    //         'adress' => 'required|string|max:255',
    //         'ville' => 'required|string|max:255',
    //         'image' => 'required|string',
    //         'disponibilite' => 'required|date',
    //         'equipement' => 'array', 
    //     ]);

    //     $userId = Auth::id();
    //     $annonce = Annonce::create([
    //         'titre' => $request->titre,
    //         'description' => $request->description,
    //         'prixparnuit' => $request->prixparnuit,
    //         'nbrchambre' => $request->nbrchambre,
    //         'nbrsallesebain' => $request->nbrsallesebain,
    //         'adress' => $request->adress,
    //         'ville' => $request->ville,
    //         'image' => $request->image,
    //         'disponibilite' => $request->disponibilite,
    //         'id_proprietaire' => $userId,
    //     ]);

    //     if ($request->has('equipement')) {
    //         $annonce->equipement()->attach($request->equipement);
    //     }

    //     return redirect()->route('annonce.proprietaire')->with('success', 'Annonce ajoutée avec succès.');
    // }

    /**
     * Affiche le formulaire de modification d'une annonce
     */
    // public function edit($id)
    // {
    //     $userId = Auth::id();
        
    //     $annonce = Annonce::where('id_proprietaire', $userId)->where('id', $id)->with('equipement') ->first(); 
        
    //     if (!$annonce) {
    //         return redirect()->route('annonce.proprietaire')->with('error', 'Annonce introuvable.');
    //     }
    
    //     $equipement = Equipement::all();
    
    //     $equipementsSelectionnes = $annonce->equipement ? $annonce->equipement->pluck('id')->toArray() : [];
    
    //     return view('proprietaire.editannonce', compact('annonce', 'equipement', 'equipementsSelectionnes'));
    // }
    
    
    

    /**
     * Met à jour une annonce existante
     */
    // public function update(Request $request, $id)
    // {
    //     $annonce = Annonce::findOrFail($id);

    //     $request->validate([
    //         'titre' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'prixparnuit' => 'required|numeric|min:0',
    //         'nbrchambre' => 'required|integer|min:0',
    //         'nbrsallesebain' => 'required|integer|min:0',
    //         'adress' => 'required|string|max:255',
    //         'ville' => 'required|string|max:255',
    //         'disponibilite' => 'required|date',
    //         'equipement' => 'array',
    //     ]);

    //     $annonce->update([
    //         'titre' => $request->titre,
    //         'prixparnuit' => $request->prixparnuit,
    //         'description' => $request->description,
    //         'nbrchambre' => $request->nbrchambre,
    //         'nbrsallesebain' => $request->nbrsallesebain,
    //         'adress' => $request->adress,
    //         'ville' => $request->ville,
    //         'disponibilite' => $request->disponibilite,
    //     ]);

    //     $annonce->equipement()->sync($request->equipement ?? []);

    //     return redirect()->route('annonce.proprietaire')->with('success', 'Annonce mise à jour avec succès.');
    // }

    /**
     * Supprime une annonce
     */
//    public function destroy($id)
// {
//     $annonce = Annonce::where('id', $id)->first();

//     $annonce->delete();

//     return redirect()->route('annonce.proprietaire');
// }





// public function Favorite(Request $request, $id)
// {
//     $hotel = Hotel::findOrFail($id);
//     $user = Auth::user();

//     if ($user->favoris()->where('id_hotel', $id)->exists()) {
//         $user->favoris()->detach($id);
//         $message = 'Annonce retirée des favoris.';
//     } else {
//         $user->favoris()->attach($id);
//         $message = 'Annonce ajoutée aux favoris.';
//     }

//     return redirect()->route('favoris.index')->with('success', $message);
// }

//     public function favoris()
//     {
//         $user = Auth::user(); 
    
//         if (!$user) {
//             return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos favoris.');
//         }
    
//         $hotels = $user->favoris()->paginate(9); 
    
//         return view('touriste.favori', compact('annonces'));
//     }
    

}

