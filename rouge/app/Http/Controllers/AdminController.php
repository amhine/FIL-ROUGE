<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\Interface\EquipementInterface;

class AdminController extends Controller
{
    protected $equipementRepository;

    public function __construct(EquipementInterface $equipementRepository)
    {
        $this->equipementRepository = $equipementRepository;
    }

    public function index(Request $request)
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $inactiveUsers = User::where('status', 'inactive')->count();

        $roleFilter = $request->query('role');
        $statusFilter = $request->query('status');

        $query = User::with('role')->where('id_role', '!=', 1);
        
        if ($roleFilter) {
            $query->where('id_role', $roleFilter);
        }
        
        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }

        $users = $query->paginate(10);
        $roles = Role::where('id', '!=', 1)->get();

        $totalHotels = DB::table('hotels')->count();
        $availableHotels = DB::table('hotels')
            ->where('disponibilite', '>=', now()->toDateString())
            ->count();
        $recentHotels = DB::table('hotels')
            ->select('nom_hotel', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $query = DB::table('hotels')
            ->join('users', 'hotels.hebergeur_id', '=', 'users.id')
            ->select(
                'hotels.*',
                'users.name as proprietaire_nom',
                'users.email as proprietaire_email'
            );

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

        $hebergements = $query->orderBy('hotels.created_at', 'desc')->paginate(10);

        $villes = DB::table('hotels')
            ->select('ville')
            ->distinct()
            ->orderBy('ville')
            ->pluck('ville');

        $totalRestaurants = DB::table('restaurants')->count();
        $restaurantsByType = DB::table('restaurants')
            ->select('type_cuisine', DB::raw('count(*) as count'))
            ->groupBy('type_cuisine')
            ->get();
        $recentRestaurants = DB::table('restaurants')
            ->select('nom_resteau', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $query = DB::table('restaurants')
            ->select('id', 'nom_resteau', 'localisation', 'type_cuisine', 'image', 'prix', 'description', 'created_at', 'updated_at');

        if ($request->has('type_cuisine') && $request->type_cuisine) {
            $query->where('type_cuisine', $request->type_cuisine);
        }

        if ($request->has('recherche_resto') && $request->recherche_resto) {
            $searchTerm = $request->recherche_resto;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom_resteau', 'like', "%{$searchTerm}%")
                  ->orWhere('localisation', 'like', "%{$searchTerm}%")
                  ->orWhere('type_cuisine', 'like', "%{$searchTerm}%");
            });
        }

        $restaurants = $query->orderBy('created_at', 'desc')->paginate(10);

        $typesCuisine = DB::table('restaurants')
            ->select('type_cuisine')
            ->distinct()
            ->orderBy('type_cuisine')
            ->pluck('type_cuisine');

        $equipements = $this->equipementRepository->all();

        return view('admin.dashboard', compact(
            'totalUsers', 'activeUsers', 'inactiveUsers',
            'users', 'roles', 'roleFilter', 'statusFilter',
            'totalHotels', 'availableHotels', 'recentHotels', 'hebergements', 'villes',
            'totalRestaurants', 'restaurantsByType', 'recentRestaurants', 'restaurants', 'typesCuisine',
            'equipements'
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
            return redirect()->route('dashboard')
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
            return redirect()->route('dashboard')
                             ->with('error', 'Hébergement non trouvé');
        }
        DB::table('hotel_equipe')->where('hotel_id', $id)->delete();
        DB::table('reservations_hotels')->where('hotels_id', $id)->delete();
        DB::table('hotels')->where('id', $id)->delete();
    
        return redirect()->route('dashboard')
                         ->with('success', 'Hébergement supprimé avec succès');
    }

    public function showRestaurant($id)
    {
        $resteau = DB::table('restaurants')
            ->join('users', 'restaurants.id_resteau', '=', 'users.id')
            ->select(
                'restaurants.*',
                'users.name as restaurants_nom',
                'users.email as restaurants_email'
            )
            ->where('restaurants.id', $id)
            ->first();
    
        if (!$resteau) {
            return redirect()->route('dashboard')
                             ->with('error', 'Restaurant non trouvé');
        }
    
        return view('admin.restaurants-details', compact('resteau'));
    }

    public function deleteRestaurant($id)
    {
        $restaurants = DB::table('restaurants')->where('id', $id)->first();
        
        if (!$restaurants) {
            return redirect()->route('dashboard')
                             ->with('error', 'Restaurant non trouvé');
        }

        DB::table('reservations_resteaux')->where('id_resteau', $id)->delete();
        DB::table('restaurants')->where('id', $id)->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Restaurant supprimé avec succès');
    }
}