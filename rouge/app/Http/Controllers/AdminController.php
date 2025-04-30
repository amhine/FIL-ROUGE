<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   

    public function index(Request $request)
    {
        
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $inactiveUsers = User::where('status', 'inactive')->count();

        $roleFilter = $request->query('role');
        $statusFilter = $request->query('status');

        $query = User::with('role');
        
        if ($roleFilter) {
            $query->where('id_role', $roleFilter);
        }
        
        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }

        
        $users = $query->paginate(10);
        $roles = Role::all();

        $query = DB::table('hotels')
        ->join('users', 'hotels.hebergeur_id', '=', 'users.id')
        ->select(
            'hotels.*',
            'users.name as proprietaire_nom',
            'users.email as proprietaire_email'
        );

    // Appliquer les filtres si présents dans la requête
    if ($request->has('ville') && $request->ville) {
        $query->where('hotels.ville', $request->ville);
    }

   

    if ($request->has('recherche') && $request->recherche) {
        $searchTerm = $request->recherche;
        $query->where(function($q) use ($searchTerm) {
            $q->where('hotels.nom_hotel', 'like', "%{$searchTerm}%")
              ->orWhere('hotels.adress', 'like', "%{$searchTerm}%")
              ->orWhere('hotels.ville', 'like', "%{$searchTerm}%")
              ->orWhere('users.name', 'like', "%{$searchTerm}%")
              ->orWhere('users.email', 'like', "%{$searchTerm}%");
        });
    }
    $hebergements = $query->orderBy('hotels.created_at', 'desc')
                              ->paginate(10);
    
        // Récupérer la liste des villes pour le filtre
        $villes = DB::table('hotels')
                    ->select('ville')
                    ->distinct()
                    ->orderBy('ville')
                    ->pluck('ville');

        return view('admin.dashboard', compact(
            'totalUsers', 'activeUsers', 'inactiveUsers',
            'users', 'roles', 'roleFilter', 'statusFilter', 'hebergements',
            'villes'
        ));
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return redirect()->route('dashboard')->with('message', 'User status updated.');
    }



    public function showHebergement($id)
    {
        $hotel = DB::table('hotels')
            ->join('users', 'hotels.hebergeur_id', '=', 'users.id')
            ->select(
                'hotels.*',
                'users.name as proprietaire_nom',
                'users.email as proprietaire_email'
            )
            ->where('hotels.id', $id)
            ->first();
    
        if (!$hotel) {
            return redirect()->route('admin.hebergements')
                             ->with('error', 'Hébergement non trouvé');
        }
    
        $equipements = DB::table('equipements')
        ->join('hotel_equipe', 'equipements.id', '=', 'hotel_equipe.equipe_id')
        ->where('hotel_equipe.hotel_id', $id)
        ->get();
        
    
        
    
        return view('admin.hebergement-details', compact('hotel', 'equipements'));
    }
    
  
    
    public function deleteHebergement($id)
    {
        $hebergement = DB::table('hotels')->where('id', $id)->first();
        
        if (!$hebergement) {
            return redirect()->route('admin.hebergements')
                             ->with('error', 'Hébergement non trouvé');
        }
        DB::table('hotel_equipe')->where('hotel_id', $id)->delete();

        DB::table('reservations_hotels')->where('hotels_id', $id)->delete();
        
        DB::table('hotels')->where('id', $id)->delete();
    
        return redirect()->route('admin.hebergements')
                         ->with('success', 'Hébergement supprimé avec succès');
    }
}