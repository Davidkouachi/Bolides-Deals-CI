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

class Controller
{
    public function index_accueil()
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
                        ->take(10)
                        ->get();
        foreach ($vanns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
        }

        $lanns = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
                        ->where('annonces.statut', '=', 'en ligne')
                        ->where('annonces.type_annonce', '=', 'location')
                        ->latest() // Order by the latest created_at
                        ->take(10)
                        ->get();
        foreach ($lanns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
        }

        return view('index',['marques'=>$marques, 'vanns'=>$vanns, 'lanns'=>$lanns, 'types'=>$types]);
    }

}
