<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\EquipementInterface;
use Illuminate\Support\Facades\Validator;


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

   
    public function create()
    {
        return view('admin.dashbord');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'equipements.*.nom_equipe' => 'required|string',
            'equipements.*.image' => 'required|string', 
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        try {
            foreach ($request->equipements as $equipement) {
                $data = [
                    'nom_equipe' => $equipement['nom_equipe'],
                    'image' => $equipement['image'], 
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
    
                $this->equipementRepository->create($data);
            }
    
            return redirect()->route('dashboard')
                ->with('success', 'Équipements ajoutés avec succès');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est produite lors dajout des équipements')
                ->withInput();
        }
    }
    public function destroy($id)
    {
        $this->equipementRepository->delete($id);
        return redirect()->route('dashboard')->with('success', 'Équipement supprimé avec succès');
    }
}
