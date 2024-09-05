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

class MesannoncesController extends Controller
{
    public function index_mesannonces(Request $request)
    {
        $marques = Marque::all();
        $types = Type_marque::all();

        // Récupérez les valeurs des filtres
        $filterMarqueId = $request->input('marque');
        $filterModel = $request->input('model');
        $filterAnnee = $request->input('annee');
        $filterKmMin = $request->input('km_min');
        $filterKmMax = $request->input('km_max');
        $filterPrixMin = $request->input('prix_min');
        $filterPrixMax = $request->input('prix_max');
        $filterTypeAnnonce = $request->input('type_annonce');
        $filterStatut = $request->input('statut');
        $filterNeuf = $request->input('vneuf');

        // Créez la requête de base
        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
            ->join('marques','marques.id','=','annonces.marque_id')
            ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
            ->where('annonces.user_id','=', Auth::user()->id)
            ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
            ->orderBy('annonces.created_at', 'desc');

        // Appliquez les filtres

        // Filtrer par type d'annonce
        if (!empty($filterTypeAnnonce)) {
            if ($filterTypeAnnonce == 'tout') {
            // Pas de filtre spécifique, inclure toutes les annonces
            } else {
                // Filtrer par type spécifique
                $anns->where('annonces.type_annonce', '=', $filterTypeAnnonce);
            }
        }
        // Filtrer par véhicule neuf
        if (!empty($filterNeuf)) {
            if ($filterNeuf == 'tout') {
            // Pas de filtre spécifique, inclure toutes les annonces
            } else {
                // Filtrer par type spécifique
                $anns->where('annonces.neuf', '=', $filterNeuf);
            }
        }
        // Filtrer par statut
        if (!empty($filterStatut)) {
            if ($filterStatut == 'tout') {
            // Pas de filtre spécifique, inclure toutes les annonces
            } else {
                // Filtrer par type spécifique
                $anns->where('annonces.statut', '=', $filterStatut);
            }
        }
        // Filtrer par marque (insensible à la casse)
        if (!empty($filterMarqueId)) {
            if ($filterMarqueId == 'tout') {
            // Pas de filtre spécifique, inclure toutes les annonces
            } else {
                // Filtrer par type spécifique
                $anns->where('marques.id', '=', $request->input('marque'));
            }
        }

        // Filtrer par modèle (type_marque) (insensible à la casse)
        if (!empty($filterModel)) {
            $anns->whereRaw('LOWER(annonces.model) LIKE ?', ['%' . strtolower($filterModel) . '%']);
        }

        // Filtrer par année
        if (!empty($filterAnnee)) {
            if ($filterAnnee == 'tout') {
            // Pas de filtre spécifique, inclure toutes les annonces
            } else {
                // Filtrer par type spécifique
                $anns->where('annonces.annee', '=', $request->input('annee'));
            }
        }

        // Filtrer par kilométrage (min et max)
        if (!empty($filterKmMin)) {
            $anns->where('annonces.kilometrage', '>=', $request->input('km_min'));
        }
        if (!empty($filterKmMax)) {
            $anns->where('annonces.kilometrage', '<=', $request->input('km_max'));
        }

        // Filtrer par prix (min et max)
        if (!empty($filterPrixMin)) {
            $anns->where('annonces.prix', '>=', $request->input('prix_min'));
        }
        if (!empty($filterPrixMax)) {
            $anns->where('annonces.prix', '<=', $request->input('prix_max'));
        }

        // Paginer les résultats après avoir appliqué les filtres
        $anns = $anns->paginate(30);

        // Ajouter la première photo à chaque annonce
        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                ->orderBy('created_at', 'asc')
                ->first();

            $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
            $value->nbre_photo = Annonce_photo::where('annonce_id', '=', $value->id)->count();
        }

        return view('vehicule.mes_annonces.index', [
            'marques' => $marques, 
            'types' => $types, 
            'anns' => $anns,
            'filterMarqueId' => $filterMarqueId,
            'filterModel' => $filterModel,
            'filterAnnee' => $filterAnnee,
            'filterKmMin' => $filterKmMin,
            'filterKmMax' => $filterKmMax,
            'filterPrixMin' => $filterPrixMin,
            'filterPrixMax' => $filterPrixMax,
            'filterTypeAnnonce' => $filterTypeAnnonce,
            'filterStatut' => $filterStatut,
            'filterNeuf' => $filterNeuf,
        ]);

    }

    public function index_mesannonces_detail($id, $uuid)
    {
        $data_qrcode = route('index_detail', $uuid);
        $qrCode = new QrCode($data_qrcode);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $imgqr = $result->getDataUri();

        $ann = Annonce::join('villes','villes.id','=','annonces.ville_id')
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                        ->join('users','users.id','=','annonces.user_id')
                        ->where('annonces.user_id', $id)
                        ->where('uuid', $uuid)
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque', 'users.name as nom_user', 'users.prenom as prenom_user', 'users.email as email_user', 'users.image_chemin as photo_user')
                        ->first();

            if($ann->type_annonce === 'vente') {
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
                }
            }

            $contact = Annonce_contact::where('annonce_id', '=', $ann->id)->first();
            $ann->whatsapp = $contact ? $contact->whatsapp : null;
            $ann->appel = $contact ? $contact->appel : null;
            $ann->sms = $contact ? $contact->sms : null;


            $formule = Annonce_formule::where('annonce_id', '=', $ann->id)->first();

            if ($formule) {

                $ann->nbre_photo = $formule->nbre_photo;
                $ann->duree_vie = $formule->duree_vie;
                $ann->nbre_refresh = $formule->nbre_refresh;
                $ann->tete_liste = $formule->tete_liste;
                $ann->top_annonce = $formule->top_annonce;
            }

        $photos = Annonce_photo::where('annonce_id', '=', $ann->id)->get();

        return view('vehicule.mes_annonces.detail',['imgqr'=>$imgqr, 'data_qrcode'=>$data_qrcode, 'ann'=>$ann, 'photos'=>$photos,]);
    }

    public function trait_dispo($uuid)
    {
        $verf = Annonce::where('uuid', '=', $uuid)->first();

        if ($verf) {
            $verf->statut = 'en ligne';

            if ($verf->save()) {
                return redirect()->back()->with('car', 'Véhicule Disponible');
            }else{
                return redirect()->back()->with('error', 'une erreur est survenu, veuillez réssayer plutard');
            }

        }else{
            return redirect()->back()->with('error', 'une erreur est survenu, veuillez réssayer plutard');
        }
    }

    public function trait_indispo($uuid)
    {
        $verf = Annonce::where('uuid', '=', $uuid)->first();

        if ($verf) {
            $verf->statut = 'indisponible';

            if ($verf->save()) {
                return redirect()->back()->with('car', 'Véhicule Indisponible');
            }else{
                return redirect()->back()->with('error', 'une erreur est survenu, veuillez réssayer plutard');
            }

        }else{
            return redirect()->back()->with('error', 'une erreur est survenu, veuillez réssayer plutard');
        }
    }

    public function delete_ann($uuid)
    {
        // Démarrer une transaction
        DB::beginTransaction();

        try {
            // Rechercher l'annonce par son UUID
            $annonce = Annonce::where('uuid', $uuid)->firstOrFail();

            // Supprimer les images associées
            $photos = Annonce_photo::where('annonce_id', $annonce->id)->get();
            foreach ($photos as $photo) {
                // Supprimer le fichier image du stockage
                if (Storage::exists($photo->image_chemin)) {
                    if (!Storage::delete($photo->image_chemin)) {
                        // Si la suppression échoue, lever une exception
                        throw new \Exception('Erreur lors de la suppression de l\'image : ' . $photo->image_chemin);
                    }
                }

                // Supprimer l'enregistrement de la photo dans la base de données
                if (!$photo->delete()) {
                    // Si la suppression échoue, lever une exception
                    throw new \Exception('Erreur lors de la suppression de l\'enregistrement de l\'image');
                }
            }

            // Supprimer l'annonce
            if (!$annonce->delete()) {
                // Si la suppression de l'annonce échoue, lever une exception
                throw new \Exception('Erreur lors de la suppression de l\'annonce');
            }

            // Si tout se passe bien, valider la transaction
            DB::commit();

            return redirect()->route('index_mesannonces')->with('suppr', 'Annonce supprimée avec succès');
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction
            DB::rollBack();
            // Retourner un message d'erreur avec l'exception capturée
            return redirect()->route('index_mesannonces')->with('error', $e->getMessage());
        }
    }

    public function update_vente($uuid)
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

        return view('vehicule.annonce.update.vente',['marques' => $marques,'villes' => $villes,'types' => $types,'ann'=>$ann,'photos'=>$photos,]);
    }

    public function update_location($uuid)
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

        return view('vehicule.annonce.update.location',['marques' => $marques,'villes' => $villes,'types' => $types,'ann'=>$ann,'photos'=>$photos]);
    }

    public function trait_annonce_update(Request $request, $uuid)
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

        try {

            if (!$ann->save()) {
                return back()->with('error', 'Erreur lors de la mise à jour de l\'annonce.');
            }

            $tel = Annonce_contact::where('annonce_id', '=', $ann->id)->first();
            $tel->whatsapp = $request->whatsapp;
            $tel->appel = $request->appel;
            $tel->sms = $request->sms;

            if (!$tel->save()) {
                Annonce_error::create(['motif' => 'les contacts n\'ont pas pu être mis a jour.','user_id' => Auth::user()->id]);
                throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
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
                    throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
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
                    throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
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
                            throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
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
                            throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
                        }

                    }else {
                        Annonce_error::create(['motif' => 'Veuillez sélectionner toutes les images requises.','user_id' => Auth::user()->id]);
                        throw new \Exception('Erreur lors de la mise à jour de l\'annonce.');
                    }
                }
            }

            DB::commit();
            return redirect()->route('index_mesannonces')->with('success','Mise à jour éffectuée.');

        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaction en cas d'erreur
            Annonce_error::create(['motif' => $e->getMessage(), 'user_id' => Auth::user()->id]);
            return redirect()->route('index_mesannonces')->with('error','Échec de la mise à jour de l\'annonce.');
        }
    }
}
