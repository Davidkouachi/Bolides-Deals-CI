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
        $types = Type_marque::orderBy('nom', 'asc')->get();;

        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'type_marques.nom as type_marque')
                        ->latest() // Order by the latest created_at
                        ->take(10)
                        ->get();
        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
        }

        return view('index',['marques'=>$marques, 'anns'=>$anns, 'types'=>$types]);
    }

}
