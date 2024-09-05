<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Annonce;
use App\Models\Annonce_photo;
use App\Models\Annonce_vente;
use App\Models\Parametrage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CheckPapierJourMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::today();
        $anns = Annonce::join('annonce_ventes', 'annonce_ventes.annonce_id', '=', 'annonces.id')
                        ->where('annonces.type_annonce', '=', 'vente')
                        ->where('annonce_ventes.papier', '=', 'oui')
                        ->select(
                            'annonces.id as annonce_id',
                            'annonce_ventes.assurance as assurance',
                            'annonce_ventes.visite_techn as visite_techn')
                        ->get();

        foreach ($anns as $key => $value) {

            $assuranceDate = $value->assurance ? Carbon::parse($value->assurance) : null;
            $visiteDate = $value->visite_techn ? Carbon::parse($value->visite_techn) : null;

            if (($assuranceDate && $assuranceDate < $today) || 
                ($visiteDate && $visiteDate < $today)) {
                Annonce_vente::where('annonce_id', $value->annonce_id)->update(['papier' => 'non']);
            }

        }

        return $next($request);
    }
}
