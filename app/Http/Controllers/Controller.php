<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Ville;
use App\Models\Type_marque;
use App\Models\Annonce;
use App\Models\Annonce_photo;
use App\Models\Annonce_contact;
use App\Models\Annonce_refresh;
use App\Models\Annonce_error;
use App\Models\Formule;
use App\Models\User_formule;
use App\Models\Credit_auto;
use App\Models\Parametrage;
use App\Models\Signal_annonce;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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


        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
                        ->where('annonces.statut', '=', 'en ligne')
                        // ->sortByDesc('annonces.created_at')
                        ->orderBy('annonces.created_at', 'Desc')
                        ->get();
        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                                        ->orderBy('created_at', 'asc') // Adjust the ordering as needed
                                        ->first();
            // Set the photo property
            $value->photo = $firstPhoto->image_chemin;
            $value->nbre_photo = Annonce_photo::where('annonce_id', '=', $value->id)->count();
        }

        $vanns = $anns->where('type_annonce', '=', 'vente')->take(12);
        $lanns = $anns->where('type_annonce', '=', 'location')->take(12);
        $tanns = $anns->take(20);

        $formules = Formule::all();

        $formule_user = null;
        
        if (Auth::check()) {
            $formule_user = User_formule::join('users', 'users.id', '=', 'user_formules.user_id')
                            ->join('formules', 'formules.id', '=', 'user_formules.formule_id')
                            ->where('user_formules.user_id', '=', Auth::user()->id)
                            ->where('user_formules.statut', '=', 'en cours')
                            ->select('formules.id as formule_id')
                            ->first();
        }
        

        return view('index',['marques'=>$marques, 'vanns'=>$vanns, 'lanns'=>$lanns, 'types'=>$types, 'tanns'=>$tanns,'formules'=>$formules, 'formule_user' => $formule_user]);
    }

}
