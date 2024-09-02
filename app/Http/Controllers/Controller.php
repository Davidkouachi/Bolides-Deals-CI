<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Ville;
use App\Models\Type_marque;
use App\Models\Annonce;
use App\Models\Annonce_photo;
use App\Models\Annonce_error;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller
{
    public function index_accueil(Request $request)
    {
        $marques = Marque::orderBy('marque', 'asc')->get();
        foreach ($marques as $value) {
            $value->nbre_ann = Annonce::where('marque_id', '=', $value->id)
                                    ->where('statut', '=', 'en ligne')
                                    ->count();
        }

        $types = Type_marque::orderBy('nom', 'asc')->get();

        $vanns = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
                        ->where('annonces.statut', '=', 'en ligne')
                        ->where('annonces.type_annonce', '=', 'vente')
                        ->latest() // Order by the latest created_at
                        ->take(12)
                        ->get();
        foreach ($vanns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
            $value->nbre_photo = Annonce_photo::where('annonce_id', '=', $value->id)->count();
        }

        $lanns = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
                        ->where('annonces.statut', '=', 'en ligne')
                        ->where('annonces.type_annonce', '=', 'location')
                        ->latest() // Order by the latest created_at
                        ->take(12)
                        ->get();
        foreach ($lanns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
            $value->nbre_photo = Annonce_photo::where('annonce_id', '=', $value->id)->count();
        }

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

        return view('index',['marques'=>$marques, 'vanns'=>$vanns, 'lanns'=>$lanns, 'types'=>$types]);
    }

}
