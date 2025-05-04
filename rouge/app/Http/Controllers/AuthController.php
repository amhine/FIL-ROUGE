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
            return redirect()->route('dashboard')->with('success', 'Compte cree avec succes');

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
                return redirect()->intended('dashboard')->with('success', 'Connexion réussie');
            }
    
            return back()->withErrors([
                'email' => 'Les informations  fournies ne correspondent pas à nos enregistrements.',
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