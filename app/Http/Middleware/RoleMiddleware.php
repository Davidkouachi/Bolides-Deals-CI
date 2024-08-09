<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('index_accueil')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        $user = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('users.id', '=', Auth::user()->id)
                    ->select('users.*','roles.nom as role')
                    ->first();

        // Vérifiez le rôle de l'utilisateur
        if ($user->role !== $role) {
            return redirect()->route('index_accueil')->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
        }

        // Passe la requête au prochain middleware/handler
        return $next($request);
    }
}


