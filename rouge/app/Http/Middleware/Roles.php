<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si le rôle de l'utilisateur correspond au rôle requis
        // Supposons que le rôle est stocké dans la table `roles` et lié à `users` via `id_role`
        if ($user->role && $user->role->name_role === $role) {
            return $next($request);
        }

        // Si le rôle ne correspond pas, rediriger ou retourner une erreur
        abort(403, 'Accès non autorisé. Vous n\'avez pas le rôle requis.');
    }
}