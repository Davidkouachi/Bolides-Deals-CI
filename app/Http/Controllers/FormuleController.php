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
use App\Models\Annonce_error;
use App\Models\Parametrage;
use App\Models\Signal_annonce;
use App\Models\Formule;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FormuleController extends Controller
{
    public function trait_formule(Request $request)
    {
        $verf = Formule::where('nom', '=', $request->nom)->first();

        if ($verf) {
            return back()->with('error', 'Cette formule existe déjà');
        }

        $add = new Formule();
        $add->nbre_photo = $request->nbre_photo;
        $add->duree_vie = $request->duree_vie;
        $add->nbre_refresh = $request->nbre_refresh;
        $add->badge = $request->badge;
        $add->tete_liste = $request->tete_liste;
        $add->top_annonce = $request->top_annonce;
        $add->stat = $request->stat;
        $add->nom = $request->nom;
        $add->couleur = $request->couleur;
        $add->gratuit = $request->gratuit;
        $add->prix = $request->prix;

        if ($add->save()) {
            return back()->with('success', 'Formule enregistrer');
        }else {
            return back()->with('error', 'Echec de l\'enregistrement');
        }
    }

    public function trait_formule_update(Request $request, $id)
    {
        $verf = Formule::where('nom', '=', $request->nom)->where('id', '!=', $id)->first();

        if ($verf) {
            return back()->with('error', 'Cette formule existe déjà');
        }

        $add = Formule::find($id);
        $add->nbre_photo = $request->nbre_photo;
        $add->duree_vie = $request->duree_vie;
        $add->nbre_refresh = $request->nbre_refresh;
        $add->badge = $request->badge;
        $add->tete_liste = $request->tete_liste;
        $add->top_annonce = $request->top_annonce;
        $add->stat = $request->stat;
        $add->nom = $request->nom;
        $add->couleur = $request->couleur;
        $add->gratuit = $request->gratuit;
        $add->prix = $request->prix;

        if ($add->save()) {
            return back()->with('success', 'Mise à jour éffectuée');
        }else {
            return back()->with('error', 'Echec de la mise à jour');
        }
    }
}
