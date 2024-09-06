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
use App\Models\Annonce_vente;
use App\Models\Annonce_contact;
use App\Models\Annonce_refresh;
use App\Models\Annonce_error;
use App\Models\Annonce_formule;
use App\Models\User_formule;
use App\Models\Formule;
use App\Models\Credit_auto;
use App\Models\Parametrage;
use App\Models\Signal_annonce;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class RefreshAnnonceController extends Controller
{
    public function refresh_vente($uuid)
    {
        $marques = Marque::all();
        $villes = Ville::all();
        $types = Type_marque::all();

        $ann = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->join('users','users.id','=','annonces.user_id')
                        ->where('uuid', '=', $uuid)
                        ->select('annonces.*', 'villes.id as ville_id', 'marques.id as marque_id', 'type_marques.id as type_marque_id', 'users.phone as phone_user',)
                        ->first();

        $contact = Annonce_contact::where('annonce_id', '=', $ann->id)->first();
        $ann->whatsapp = $contact->whatsapp;
        $ann->appel = $contact->appel;
        $ann->sms = $contact->sms;

        $vente = Annonce_vente::where('annonce_id', '=', $ann->id)->first();
        $ann->credit_auto = $vente->credit_auto;
        $ann->kilometrage = $vente->kilometrage;
        $ann->hors_taxe = $vente->hors_taxe;
        $ann->troc = $vente->troc;
        $ann->negociable = $vente->negociable;
        $ann->nbre_cle = $vente->nbre_cle;
        $ann->visite_techn = $vente->visite_techn;
        $ann->assurance = $vente->assurance;
        $ann->papier = $vente->papier;

        if ($vente->credit_auto === 'oui') {
            $credit = Credit_auto::where('annonce_id', '=', $ann->id)->first();

            $ann->credit_auto_mois = $credit->nbre_mois;
            $ann->prix_apport = $credit->prix_apport;
            $ann->prix_mois = $credit->prix_mois;
        } else{

            $ann->credit_auto_mois = '0';
            $ann->prix_apport = '0';
            $ann->prix_mois = '0';
        }

        $photos = Annonce_photo::where('annonce_id', '=', $ann->id)->get();

        return view('vehicule.annonce.refresh.vente',['marques' => $marques,'villes' => $villes,'types' => $types,'ann'=>$ann,'photos'=>$photos,]);
    }

    public function refresh_location($uuid)
    {
        $marques = Marque::all();
        $villes = Ville::all();
        $types = Type_marque::all();

        $ann = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->join('users','users.id','=','annonces.user_id')
                        ->where('uuid', '=', $uuid)
                        ->select('annonces.*', 'villes.id as ville_id', 'marques.id as marque_id', 'type_marques.id as type_marque_id', 'users.phone as phone_user',)
                        ->first();

        $contact = Annonce_contact::where('annonce_id', '=', $ann->id)->first();
        $ann->whatsapp = $contact->whatsapp;
        $ann->appel = $contact->appel;
        $ann->sms = $contact->sms;

        $photos = Annonce_photo::where('annonce_id', '=', $ann->id)->get();

        return view('vehicule.annonce.refresh.location',['marques' => $marques,'villes' => $villes,'types' => $types,'ann'=>$ann,'photos'=>$photos]);
    }

    public function trait_annonce_refresh(Request $request, $uuid)
    {
        $imm = str_replace(' ', '', $request->input('imm'));

        $verf = Annonce::where('imm', '=', $imm)->where('user_id', '!=', Auth::user()->id)->first();
        if ($verf) {
            return back()->with('error', 'Cette immatriculation existe déjà.');
        }

        DB::beginTransaction();
        // Créer une nouvelle annonce
        $ann = Annonce::where('uuid','=',$uuid)->first();
        $ann->imm = str_replace(' ', '', $request->input('imm'));
        $ann->marque_id = $request->marque_id;
        $ann->type_marque_id = $request->type_marque_id;
        $ann->model = $request->model;
        $ann->transmission = $request->transmission;
        $ann->type_carburant = $request->type_carburant;
        $ann->nbre_place = $request->nbre_place;
        $ann->version = $request->version;
        $ann->couleur = $request->couleur;
        $ann->annee = $request->annee;
        $ann->cylindre = $request->cylindre;
        $ann->puiss_fiscal = $request->puiss_fiscal;
        $ann->neuf = $request->neuf;
        $ann->prix = $request->prix;
        $ann->description = $request->description;
        $ann->localisation = $request->localisation;
        $ann->ville_id = $request->ville_id;
        $ann->nbre_porte = $request->nbre_porte;
        $ann->type_annonce = $request->type_annonce;
        $ann->increment('refresh_nbre');
        $ann->refresh_date = Carbon::now();
        $ann->statut = 'en ligne';

        try {

            if (!$ann->save()) {
                return back()->with('error', 'Erreur lors du renouvelement de l\'annonce.');
            }

            $tel = Annonce_contact::where('annonce_id', '=', $ann->id)->first();
            $tel->whatsapp = $request->whatsapp;
            $tel->appel = $request->appel;
            $tel->sms = $request->sms;

            if (!$tel->save()) {
                Annonce_error::create(['motif' => 'les contacts n\'ont pas pu être mis a jour.','user_id' => Auth::user()->id]);
                throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
            }

            if ($ann->type_annonce === 'vente') {

                $vente = Annonce_vente::where('annonce_id', '=', $ann->id)->first();
                $vente->hors_taxe = $request->hors_taxe;
                $vente->kilometrage = $request->kilometrage;
                $vente->troc = $request->troc;
                $vente->papier = $request->papier;
                $vente->visite_techn = $request->visite_techn;
                $vente->assurance = $request->assurance;
                $vente->nbre_cle = $request->nbre_cle;
                $vente->negociable = $request->negociable;
                $vente->credit_auto = $request->credit_auto;

                if (!$vente->save()) {
                    Annonce_error::create(['motif' => 'les vente n\'ont pas pu être mis a jour.','user_id' => Auth::user()->id]);
                    throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
                }

                $credit = Credit_auto::where('annonce_id', '=', $ann->id)->first();
                if ($request->credit_auto === 'oui') {
                    $credit->nbre_mois = $request->credit_auto_mois;
                    $credit->prix_apport = $request->prix_apport;
                    $credit->prix_mois = $request->prix_mois;
                }else{
                    $credit->nbre_mois = '0';
                    $credit->prix_apport = '0';
                    $credit->prix_mois = '0';
                }

                if (!$credit->save()) {
                    Annonce_error::create(['motif' => 'les credits auto n\'ont pas pu être mis a jour.','user_id' => Auth::user()->id]);
                    throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
                }
            }

            // Vérification des fichiers images
            for ($i = 1; $i <= $request->nbre_photo; $i++) {
                if ($request->input('update'.$i) === '1') {

                    if ($request->hasFile('image'.$i)) {

                        $file = $request->file('image'.$i);
                        if ($file->isValid()) {
                            $filename = time() . '_' . Str::random(10) . '.' .$file->getClientOriginalName();
                        } else {
                            Annonce_error::create(['motif' => 'Une ou plusieurs images sont invalides.','user_id' => Auth::user()->id]);
                            throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
                        }

                        $path = $request->file('image' . ($i))->storeAs('public/images', $filename);

                        $photo = Annonce_photo::where('annonce_id','=',$ann->id)
                                                ->where('image_nbre','=', $i)
                                                ->first();
                        Storage::delete($photo->image_chemin);
                        
                        $photo->image_nom = $filename;
                        $photo->image_chemin = $path;
                        if (!$photo->save()) {
                            Annonce_error::create(['motif' => 'Échec de la mise à jour des images.','user_id' => Auth::user()->id]);
                            throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
                        }

                    }else {
                        Annonce_error::create(['motif' => 'Veuillez sélectionner toutes les images requises.','user_id' => Auth::user()->id]);
                        throw new \Exception('Erreur lors du renouvelement de l\'annonce.');
                    }
                }
            }

            DB::commit();
            return redirect()->route('index_mesannonces')->with('success','Renouvelement éffectuée.');

        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaction en cas d'erreur
            Annonce_error::create(['motif' => $e->getMessage(), 'user_id' => Auth::user()->id]);
            return redirect()->back()->with('error','Échec du renouvelement de l\'annonce. Veuillez bien vérifier toutes les informations saisies');
        }
    }
}
