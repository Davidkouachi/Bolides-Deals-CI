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

        // Créez la requête de base
        $anns = Annonce::join('villes','villes.id','=','annonces.ville_id')
            ->join('marques','marques.id','=','annonces.marque_id')
            ->join('type_marques','type_marques.id','=','annonces.type_marque_id')
            ->where('annonces.statut','=','en ligne')
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
        ]);
    }


    public function index_detail($uuid)
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
                        ->select('annonces.*', 'villes.nom as ville', 'marques.marque as marque', 'marques.id as marque_id', 'marques.image_chemin as marque_photo', 'type_marques.nom as type_marque', 'type_marques.id as type_marque_id', 'users.name as nom_user', 'users.prenom as prenom_user', 'users.id as user_id', 'users.email as email_user', 'users.image_chemin as photo_user')
                        ->first();

        if ($ann) {

            if (!($ann->statut === 'en ligne')) {
                return redirect()->route('index_annonce')->with('warning', 'Cette annonce n\'existe plus ou le véhicule est indisponible');
            }

            $photos = Annonce_photo::where('annonce_id', '=', $ann->id)->get();
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $ann->id)->orderBy('created_at', 'asc')->first();
            $ann->image_url = $firstPhoto ? $firstPhoto->image_chemin : null;

            if (!(Auth::check() && Auth::user()->id === $ann->user_id)) {
                $ann->increment('views');
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

        return view('vehicule.annonce.new.vente',['marques' => $marques,'villes' => $villes,'types' => $types,'para'=>$para]);
    }

    public function index_annonce_new_location()
    {
        $marques = Marque::orderBy('marque', 'asc')->get();
        $villes = Ville::all();
        $types = Type_marque::all();
        $para = Parametrage::find('1');

        return view('vehicule.annonce.new.location',['marques' => $marques,'villes' => $villes,'types' => $types,'para'=>$para]);
    }

    public function trait_annonce(Request $request)
    {
        // Créer une nouvelle annonce
        $ann = new Annonce();
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
        $ann->whatsapp = $request->whatsapp;
        $ann->appel = $request->appel;
        $ann->sms = $request->sms;
        $ann->nbre_porte = $request->nbre_porte;
        $ann->type_annonce = $request->type_annonce;

        if ($request->type_annonce === 'vente') {

            $ann->hors_taxe = $request->hors_taxe;
            $ann->kilometrage = $request->kilometrage;
            $ann->troc = $request->troc;
            $ann->papier = $request->papier;
            $ann->visite_techn = $request->visite_techn;
            $ann->assurance = $request->assurance;
            $ann->nbre_cle = $request->nbre_cle;
            $ann->negociable = $request->negociable;
        }

        if ($ann->save()) {
            // Vérification des fichiers images
            if ($request->hasFile('image1') && $request->hasFile('image2') && $request->hasFile('image3') &&
                $request->hasFile('image4') && $request->hasFile('image5') && $request->hasFile('image6')) {

                $filenames = [];
                for ($i = 1; $i <= 6; $i++) {
                    $file = $request->file('image' . $i);
                    if ($file->isValid()) {
                        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalName();
                        $filenames[] = $filename;
                    } else {
                        $this->rollbackAnnonce($ann->id); // Supprimer l'annonce et les images si un fichier est invalide
                        Annonce_error::create(['motif' => 'Une ou plusieurs images sont invalides.','user_id' => Auth::user()->id]);
                        return back()->with('error', 'Certaines images selectionnées ne sont pas valides.Veuillez sélectionner des images valides.');
                    }
                }

                foreach ($filenames as $filename) {
                    $exists = Annonce_photo::where('image_nom', '=', $filename)->first();
                    if ($exists) {
                        $this->rollbackAnnonce($ann->id); // Supprimer l'annonce et les images si l'image existe déjà
                        Annonce_error::create(['motif' => 'Une ou plusieurs images existent déjà.','user_id' => Auth::user()->id]);
                        return back()->with('warning', 'Certaines images selectionnées ne sont pas valides.Veuillez sélectionner des images valides ou d\'autres images.');
                    }
                }

                foreach ($filenames as $key => $filename) {
                    $path = $request->file('image' . ($key + 1))->storeAs('public/images', $filename);

                    $photo = new Annonce_photo();
                    $photo->annonce_id = $ann->id;
                    $photo->image_nom = $filename;
                    $photo->image_chemin = $path;
                    $photo->image_nbre = $key + 1;
                    if (!$photo->save()) {
                        $this->rollbackAnnonce($ann->id); // Supprimer l'annonce et les images si l'enregistrement échoue
                        Annonce_error::create(['motif' => 'Échec de l\'enregistrement des images.','user_id' => Auth::user()->id]);
                        return back()->with('error', 'Échec de la publication de l\'annonce.');
                    }
                }

                $data_qrcode = route('index_detail', $ann->uuid);
                $qrCode = new QrCode($data_qrcode);
                $writer = new PngWriter();
                $result = $writer->write($qrCode);
                $imgqr = $result->getDataUri();

                return back()->with(['success_ann'=>'Annonce publiée avec succès.','imgqr'=>$imgqr, 'data_qrcode'=>$data_qrcode,'uuid'=>$ann->uuid,]);

            } else {
                $this->rollbackAnnonce($ann->id); // Supprimer l'annonce si les fichiers requis ne sont pas fournis
                Annonce_error::create(['motif' => 'Veuillez sélectionner toutes les images requises.','user_id' => Auth::user()->id]);
                return back()->with('warning', 'Certaines images selectionnées ne sont pas valides.Veuillez sélectionner des images valides.');
            }
        }
        Annonce_error::create(['motif' => 'Échec de la publication de l\'annonce.','user_id' => Auth::user()->id]);
        return redirect()->back()->with('error','Échec de la publication de l\'annonce.');
    }

    // Fonction pour supprimer une annonce et les images associées
    private function rollbackAnnonce($annonceId)
    {
        $annonce = Annonce::find($annonceId);
        if ($annonce) {
            // Supprimer les images associées
            $photos = Annonce_photo::where('annonce_id', $annonceId)->get();
            foreach ($photos as $photo) {
                // Supprimer le fichier image du stockage
                Storage::delete($photo->image_chemin);
                // Supprimer l'enregistrement de la photo
                $photo->delete();
            }
            // Supprimer l'annonce
            $annonce->delete();
        }
    }

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


}
