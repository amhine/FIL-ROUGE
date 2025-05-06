<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Repository\Interface\UserInterface;
use App\Models\Role;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->middleware('auth', ['except' => ['showLoginForm', 'showRegisterForm', 'createUser', 'loginUser']]);
        $this->userRepository = $userRepository;
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function createUser(CreateUserRequest $request)
    {
        try {
            $validateUser = $request->validated();

            $user = $this->userRepository->create([
                'name' => $validateUser['name'],
                'email' => $validateUser['email'],
                'password' => Hash::make($validateUser['password']),
                'id_role' => $validateUser['id_role'],
            ]);
            Auth::login($user);
            switch ($user->id_role) {
                case 1:
                    return redirect()->route('dashboard')->with('success', 'Compte créé avec succès');
                case 2:
                    return redirect()->route('home')->with('success', 'Compte créé avec succès');
                case 3:
                    return redirect()->route('hebergeur.hebergement')->with('success', 'Compte créé avec succès');
                case 4:
                    return redirect()->route('resteau.resteaurant')->with('success', 'Compte créé avec succès');
                default:
                    return redirect()->route('login.form')->with('success', 'Compte créé avec succès');
            }

        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'Erreur lors de la creation du compte: ' . $th->getMessage());
        }
    }
   
   
    public function loginUser(Request $request)
    {
        try {
            $validator = validator()->make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);
            
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            $credentials = $request->only('email', 'password');
            $user = User::where('email', $request->email)->first();
            
            if ($user && $user->status === 'inactive') {
                return back()->withErrors([
                    'email' => 'Votre compte est inactif.',
                ])->withInput();
            }
    
            if (Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                $user = Auth::user();
                
                switch ($user->id_role) {
                    case 1:
                        return redirect()->route('dashboard')->with('success', 'Connexion réussie');
                    case 2:
                        return redirect()->route('home')->with('success', 'Connexion réussie');
                    case 3:
                        return redirect()->route('hebergeur.hebergement')->with('success', 'Connexion réussie');
                    case 4:
                        return redirect()->route('resteau.resteaurant')->with('success', 'Connexion réussie');
                    default:
                        return redirect()->route('login.form')->with('success', 'Connexion réussie');
                }
            }
    
            return back()->withErrors([
                'email' => 'Les informations fournies ne correspondent pas à nos enregistrements.',
            ])->withInput();
            
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erreur lors de la connexion: ' . $e->getMessage());
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Déconnexion réussie');
    }

   
}