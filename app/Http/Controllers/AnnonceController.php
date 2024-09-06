<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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


class AnnonceController extends Controller
{
    public function index_annonce(Request $request)
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
        $filterNeuf = $request->input('vneuf');

        // Créez la requête de base
        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
            ->join('marques','marques.id','=','annonces.marque_id')
            ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
            ->where('annonces.statut','=','en ligne')
            ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
            ->orderBy('annonces.refresh_date', 'desc');

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

        $anns->nbre_vente = $anns->where('type_annonce', '=', 'vente')->count();
        $anns->nbre_location = $anns->where('type_annonce', '=', 'location')->count();

        // Ajouter la première photo à chaque annonce
        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                ->orderBy('created_at', 'asc')
                ->first();

            $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
            $value->nbre_photo = Annonce_photo::where('annonce_id', '=', $value->id)->count();
        }

        return view('vehicule.annonce.index', [
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
            'filterNeuf' => $filterNeuf,
        ]);
    }

    public function index_detail(Request $request, $uuid)
    {
        $types = Type_marque::all();

        $data_qrcode = url()->current();
        // $data_qrcode = 'http://192.168.1.2:8000/Detail%20Annonces/'.$uuid;
        $qrCode = new QrCode($data_qrcode);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $imgqr = $result->getDataUri();

        $ann = Annonce::join('villes','villes.id','=','annonces.ville_id')
                    ->join('marques','marques.id','=','annonces.marque_id')
                    ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                    ->join('users','users.id','=','annonces.user_id')
                    ->where('uuid', $uuid)
                    ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.id as marque_id', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque', 'type_marques.id as type_marque_id', 'users.id as user_id', 'users.name as nom_user', 'users.prenom as prenom_user', 'users.id as user_id', 'users.email as email_user', 'users.image_chemin as photo_user')
                    ->first();

        if ($ann) {

            if (!($ann->statut === 'en ligne')) {
                return redirect()->route('index_annonce')->with('warning', 'Cette annonce n\'existe plus ou le véhicule est indisponible');
            }

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
            $ann->whatsapp = $contact->whatsapp;
            $ann->appel = $contact->appel;
            $ann->sms = $contact->sms;

            $photos = Annonce_photo::where('annonce_id', '=', $ann->id)->get();
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $ann->id)->orderBy('created_at', 'asc')->first();
            $ann->image_url = $firstPhoto ? $firstPhoto->image_chemin : null;

            $cookieConsent = $request->query('cookieConsent');
            // Vérifiez que l'utilisateur n'est pas l'auteur de l'annonce
            if (!(Auth::check() && Auth::user()->id === $ann->user_id)) {
                // Nom du cookie unique pour cette annonce et pour le consentement spécifique
                $uniqueCookieName = 'annonce_' . $ann->id . '_vue_' . $cookieConsent;

                // Vérifiez si le cookie existe
                if (!$request->cookie($uniqueCookieName)) {
                    // Incrémentez le compteur de vues
                    $ann->increment('views');

                    // Définir un cookie pour suivre la visite
                    Cookie::queue($uniqueCookieName, 'true', 60 * 24 * 30); // Cookie valide pendant 30 jours
                }
            }

            $sims = Annonce::join('villes','villes.id','=','annonces.ville_id')
                ->join('marques','marques.id','=','annonces.marque_id')
                ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
                ->where('annonces.statut','=','en ligne')
                ->where('annonces.type_marque_id','=', $ann->type_marque_id)
                ->where('annonces.marque_id','=', $ann->marque_id)
                ->where('annonces.annee','=', $ann->annee)
                ->where('annonces.id','!=', $ann->id)
                ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
                ->latest() // Order by the latest created_at
                ->take(10)
                ->get();

            foreach ($sims as $value) {
                $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)->orderBy('created_at', 'asc')->first();
                $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
            }

            return view('vehicule.annonce.detail',['imgqr'=>$imgqr, 'data_qrcode'=>$data_qrcode, 'ann'=>$ann, 'photos'=>$photos, 'sims'=>$sims, 'types'=>$types]);

        }else {

            return redirect()->route('index_annonce')->with('warning', 'Cette annonce n\'existe plus');

        }
    }

    public function index_annonce_new_vente()
    {
        $marques = Marque::orderBy('marque', 'asc')->get();
        $villes = Ville::all();
        $types = Type_marque::all();
        $para = Parametrage::find('1');
        $formule = User_formule::join('users', 'users.id', '=', 'user_formules.user_id')
                            ->join('formules', 'formules.id', '=', 'user_formules.formule_id')
                            ->where('user_formules.user_id', '=', Auth::user()->id)
                            ->where('user_formules.statut', '=', 'en cours')
                            ->select(
                                'formules.nbre_photo as nbre_photo',
                                'formules.duree_vie as nbre_jours_ligne',
                                'formules.nbre_refresh as nbre_refresh',
                            )
                            ->first();
        if ($formule) {
            $nbre_photo = $formule->nbre_photo;
            $souscrit = 'oui';
        }else {
            $nbre_photo = $para->nbre_photo;
            $souscrit = 'non';
        }

        return view('vehicule.annonce.new.vente',['marques' => $marques,'villes' => $villes,'types' => $types,'para'=>$para, 'formule' => $formule, 'nbre_photo' => $nbre_photo, 'souscrit' => $souscrit,]);
    }

    public function index_annonce_new_location()
    {
        $marques = Marque::orderBy('marque', 'asc')->get();
        $villes = Ville::all();
        $types = Type_marque::all();
        $para = Parametrage::find('1');
        $formule = User_formule::join('users', 'users.id', '=', 'user_formules.user_id')
                            ->join('formules', 'formules.id', '=', 'user_formules.formule_id')
                            ->where('user_formules.user_id', '=', Auth::user()->id)
                            ->where('user_formules.statut', '=', 'en cours')
                            ->select(
                                'formules.nbre_photo as nbre_photo',
                                'formules.duree_vie as nbre_jours_ligne',
                                'formules.nbre_refresh as nbre_refresh',
                            )
                            ->first();
        if ($formule) {
            $nbre_photo = $formule->nbre_photo;
            $souscrit = 'oui';
        }else {
            $nbre_photo = $para->nbre_photo;
            $souscrit = 'non';
        }

        return view('vehicule.annonce.new.location',['marques' => $marques,'villes' => $villes,'types' => $types,'para'=>$para, 'formule' => $formule, 'nbre_photo' => $nbre_photo, 'souscrit' => $souscrit,]);
    }

    public function trait_annonce(Request $request)
    {

        $imm = str_replace(' ', '', $request->input('imm'));

        $verf = Annonce::where('imm', '=', $imm)->first();
        if ($verf) {
            return back()->with('error', 'Ce véhicule existe déjà.');
        }

        $para = Parametrage::find('1');

        DB::beginTransaction();
        // Créer une nouvelle annonce
        $ann = new Annonce();
        $ann->imm = str_replace(' ', '', $request->input('imm'));
        $ann->marque_id = $request->marque_id;
        $ann->user_id = Auth::user()->id;
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
        $ann->statut = 'en ligne';
        $ann->localisation = $request->localisation;
        $ann->ville_id = $request->ville_id;
        $ann->uuid = (string) Str::uuid();
        $ann->nbre_porte = $request->nbre_porte;
        $ann->type_annonce = $request->type_annonce;
        $ann->refresh_date = Carbon::now();

        try {

            if (!$ann->save()) {
                return back()->with('error', 'Erreur lors de la publication de l\'annonce.');
            }

            if ($request->type_annonce === 'vente') {

                $vente = new Annonce_vente();
                $vente->hors_taxe = $request->hors_taxe;
                $vente->kilometrage = $request->kilometrage;
                $vente->troc = $request->troc;
                $vente->papier = $request->papier;
                $vente->visite_techn = $request->visite_techn;
                $vente->assurance = $request->assurance;
                $vente->nbre_cle = $request->nbre_cle;
                $vente->negociable = $request->negociable;
                $vente->credit_auto = $request->credit_auto;
                $vente->annonce_id = $ann->id;

                if (!$vente->save()) {
                    Annonce_error::create(['motif' => 'les vente n\'ont pas pu être en enregistrer.','user_id' => Auth::user()->id]);
                    throw new \Exception('Erreur lors de la publication de l\'annonce.');
                }
            }

            $tel = new Annonce_contact();
            $tel->whatsapp = $request->whatsapp;
            $tel->appel = $request->appel;
            $tel->sms = $request->sms;
            $tel->annonce_id = $ann->id;

            if (!$tel->save()) {
                Annonce_error::create(['motif' => 'les contacts n\'ont pas pu être en enregistrer.','user_id' => Auth::user()->id]);
                throw new \Exception('Erreur lors de la publication de l\'annonce.');
            }

            $credit = new Credit_auto();
            if ($request->credit_auto === 'oui') {
                $credit->nbre_mois = $request->credit_auto_mois;
                $credit->prix_apport = $request->prix_apport;
                $credit->prix_mois = $request->prix_mois;
            }else{
                $credit->nbre_mois = '0';
                $credit->prix_apport = '0';
                $credit->prix_mois = '0';
            }
            $credit->annonce_id = $ann->id;

            if (!$credit->save()) {
                Annonce_error::create(['motif' => 'les credits auto n\'ont pas pu être en enregistrer.','user_id' => Auth::user()->id]);
                throw new \Exception('Erreur lors de la publication de l\'annonce.');
            }

            $form = User_formule::join('users', 'users.id', '=', 'user_formules.user_id')
                            ->join('formules', 'formules.id', '=', 'user_formules.formule_id')
                            ->where('user_formules.user_id', '=', Auth::user()->id)
                            ->where('user_formules.statut', '=', 'en cours')
                            ->select(
                                'formules.nbre_photo as nbre_photo',
                                'formules.duree_vie as nbre_jours_ligne',
                                'formules.nbre_refresh as nbre_refresh',
                            )
                            ->first();

            $formule = new Annonce_formule();
            if ($form) {

                $formule->nbre_photo = $form->nbre_photo;
                $formule->duree_vie = $form->duree_vie;
                $formule->nbre_refresh = $form->nbre_refresh;
                $formule->tete_liste = $form->tete_liste;
                $formule->top_annonce = $form->top_annonce;
            }else {
                $para = Parametrage::find('1');

                $formule->nbre_photo = $para->nbre_photo;
                $formule->duree_vie = $para->nbre_jours_ligne;
                $formule->nbre_refresh = $para->nbre_refresh;
                $formule->tete_liste = 'non';
                $formule->top_annonce = 'non';
            }
            $formule->annonce_id = $ann->id;

            if (!$formule->save()) {
                Annonce_error::create(['motif' => 'les annonces formules n\'ont pas pu être en enregistrer.','user_id' => Auth::user()->id]);
                throw new \Exception('Erreur lors de la publication de l\'annonce.');
            }

            for ($i = 1; $i <= $request->nbre_photo; $i++) {
                $file = $request->file('image' . $i);

                if ($file && $file->isValid()) {
                    $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalName();
                    
                    // Vérification de duplication dans la base de données
                    if (Annonce_photo::where('image_nom', $filename)->exists()) {
                        Annonce_error::create(['motif' => 'Une ou plusieurs images existent déjà.','user_id' => Auth::user()->id]);
                        throw new \Exception('Une ou plusieurs images existent déjà.');
                    }

                    // Stockage du fichier
                    $path = $file->storeAs('public/images', $filename);

                    // Création de l'enregistrement de la photo
                    $photo = new Annonce_photo([
                        'annonce_id' => $ann->id,
                        'image_nom' => $filename,
                        'image_chemin' => $path,
                        'image_nbre' => $i,
                    ]);

                    if (!$photo->save()) {
                        Annonce_error::create(['motif' => 'Échec de l\'enregistrement des images.','user_id' => Auth::user()->id]);
                        throw new \Exception('Échec de l\'enregistrement des images.');
                    }
                } else {
                    Annonce_error::create(['motif' => 'Une ou plusieurs images sont invalides.','user_id' => Auth::user()->id]);
                    throw new \Exception('Une ou plusieurs images sont invalides.');
                }
            }

            // Génération et stockage du QR Code
            $data_qrcode = route('index_detail', $ann->uuid);
            $qrCode = new QrCode($data_qrcode);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $imgqr = $result->getDataUri();

            DB::commit(); // Commit transaction si tout va bien
            return back()->with(['success_ann' => 'Annonce publiée avec succès.', 'imgqr' => $imgqr, 'data_qrcode' => $data_qrcode, 'uuid' => $ann->uuid]);

        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaction en cas d'erreur
            Annonce_error::create(['motif' => $e->getMessage(), 'user_id' => Auth::user()->id]);
            return back()->with('error','Erreur lors de la publication de l\'annonce.');
        }
    }

    // Fonction pour supprimer une annonce et les images associées
    // private function rollbackAnnonce($annonceId)
    // {
    //     $annonce = Annonce::find($annonceId);
    //     if ($annonce) {
    //         // Supprimer les images associées
    //         $photos = Annonce_photo::where('annonce_id', $annonceId)->get();
    //         foreach ($photos as $photo) {
    //             // Supprimer le fichier image du stockage
    //             Storage::delete($photo->image_chemin);
    //             // Supprimer l'enregistrement de la photo
    //             $photo->delete();
    //         }
    //         // Supprimer l'annonce
    //         $annonce->delete();
    //     }
    // }

    public function annonce_user($id)
    {
        $marques = Marque::all();
        $types = Type_marque::all();
        $user = User::find($id);

        // Créez la requête de base
        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
            ->join('marques','marques.id','=','annonces.marque_id')
            ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
            ->where('annonces.statut','=','en ligne')
            ->where('annonces.user_id','=',$id)
            ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque')
            ->orderBy('annonces.created_at', 'desc');

        // Paginer les résultats après avoir appliqué les filtres
        $anns = $anns->paginate(30);

        // Ajouter la première photo à chaque annonce
        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                ->orderBy('created_at', 'asc')
                ->first();

            $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
        }

        return view('vehicule.annonce.user.index', [
            'marques' => $marques, 
            'types' => $types, 
            'anns' => $anns,
            'user' => $user,
        ]);
    }

    public function signal_annonce(Request $request)
    {
        $add = new Signal_annonce();
        $add->user_id = $request->user_id;
        $add->annonce_uuid = $request->uuid;
        $add->motif = $request->motif;

        if ($add->save()) {
            return redirect()->back()->with('success_signal','Annonce signalé!');
        }

        return redirect()->back()->with('error','Cette annonce ne peut être signalé, Veuillez réessayer plutard');
    }
}
