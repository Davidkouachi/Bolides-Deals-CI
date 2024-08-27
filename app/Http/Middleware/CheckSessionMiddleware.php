<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $lastActivity = $request->session()->get('last_activity', time());
            $sessionLifetime = config('session.lifetime') * 60;
            // Calculer le temps restant pour la session
            $timeRemaining = $sessionLifetime - (time() - $lastActivity);
            // Vérifier si la session a expiré
            if ($timeRemaining <= 0) {
                // Déconnecter l'utilisateur
                Auth::logout();
                // Rediriger avec un message d'avertissement
                return redirect('/')
                    ->with('warning', 'Votre session a expiré.');
            }
            // Stocker le temps restant dans la session
            $request->session()->put('session_time_remaining', $timeRemaining);

            // Mettre à jour l'heure de la dernière activité
            $request->session()->put('last_activity', time());
        }

        return $next($request);
    }
}
