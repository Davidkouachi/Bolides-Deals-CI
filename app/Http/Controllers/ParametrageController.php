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

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ParametrageController extends Controller
{
    public function trait_nbre_jours_ligne (Request $request)
    {
        $verf = Parametrage::find('1');
        $verf->nbre_jours_ligne = $request->nbre_jours_ligne;

        if ($verf->save()) {
            return redirect()->back()->with('success','Mise à jour éffectuée');
        } else {
            return redirect()->back()->with('error','Echec de la mise à jour');
        }
        

    }

    public function trait_nbre_jours_delete (Request $request)
    {
        $verf = Parametrage::find('1');
        $verf->nbre_jours_delete = $request->nbre_jours_delete;

        if ($verf->save()) {
            return redirect()->back()->with('success','Mise à jour éffectuée');
        } else {
            return redirect()->back()->with('error','Echec de la mise à jour');
        }
    }

    public function trait_nbre_refresh (Request $request)
    {
        $verf = Parametrage::find('1');
        $verf->nbre_refresh = $request->nbre_refresh;

        if ($verf->save()) {
            return redirect()->back()->with('success','Mise à jour éffectuée');
        } else {
            return redirect()->back()->with('error','Echec de la mise à jour');
        }
    }

    public function trait_nbre_photo(Request $request)
    {
        $verf = Parametrage::find('1');
        $verf->nbre_photo = $request->nbre_photo;

        if ($verf->save()) {
            return redirect()->back()->with('success','Mise à jour éffectuée');
        } else {
            return redirect()->back()->with('error','Echec de la mise à jour');
        }
    }
}
