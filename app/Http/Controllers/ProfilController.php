<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User;
use App\Models\Role;
use App\Models\Phpmailer_error;
use App\Models\Annonce;

class ProfilController extends Controller
{
    public function index_profil()
    {
        $user = Auth::user();
        $dateMdp = Carbon::parse($user->date_mdp);
        $joursEcoules = $dateMdp->diffInDays(Carbon::now());

        if (Auth::user()->update_mdp === 0) {

            $desac = 'oui';

        }else{

            if ((int)$joursEcoules < 60) {
                $desac = 'non';
            }else{
                $desac = 'oui';
            }
        }

        $nbre_annonce = Annonce::where('user_id', '=', Auth::user()->id)->count();
        

        return view('profil.index',['desac' => $desac,'joursEcoules' => $joursEcoules,'nbre_annonce' => $nbre_annonce]);
    }

    public function trait_password_profil(Request $request)
    {
        // Valider les champs du formulaire manuellement
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'cpassword' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error','Mot de passe incorrect.');
        }

        $user = User::find(Auth::user()->id);

        if ($user->update_mdp > 0) {

            $daysSinceUpdate = Carbon::now()->diffInDays(Carbon::parse($verf->date_mdp));

            if ($daysSinceUpdate < 60) {

                return redirect()->back()->with('warning', 'Vous devez attendre 60 jours avant de modifier a nouveau votre mot de passe.');
            }
        } 

        $user->password = bcrypt($request->password);
        $user->date_mdp = now();
        $user->increment('update_mdp');

        if ($user->save()) {
            return back()->with('success' , 'Mot de passe modifié');
        }else{
            return back()->with('error' , 'Une erreur est survenue');
        }

    }

    public function profil_update(Request $request)
    {
        // Valider les champs du formulaire manuellement
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'adresse' => 'required|string',
        ]);

        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error','Veuillez vérifier vos informations personnelles et réessayer la mise à jour.');
        }

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $adresse = $request->input('adresse');

        $rech_email = User::where('email', '=', $email)->where('id', '!=', Auth::user()->id)->count();
        if ($rech_email > 0) {
            return redirect()->back()->with('error','L\'email existe déjà.');
        }

        $rech_phone = User::where('phone', '=', $phone)->where('id', '!=', Auth::user()->id)->count();
        if ($rech_phone > 0) {
            return redirect()->back()->with('error','Ce contact existe déjà.');
        }

        $user = User::find(Auth::user()->id);
        $user->name = $nom;
        $user->prenom = $prenom;
        $user->phone = $phone;
        $user->email = $email;
        $user->adresse = $adresse;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // Renommer le fichier avec un nom unique pour éviter les conflits
                $filename = time() . '.' . $request->file('image')->getClientOriginalName();
                $pdfPathname = $request->file('image')->storeAs('public/images', $filename);

                $rech = User::where('image_nom', '=', $filename)->first();
                if(!$rech){
                    $user->image_nom = $filename;
                    $user->image_chemin = $pdfPathname;
                }

            }
        }

        if ($user->save()) {
            return redirect()->back()->with('success','Mise à jour éffectuée');
        }
    }

    public function delete_photo($id)
    {
        $user = User::find(Auth::user()->id);

        if (!empty($user->image_nom)) {
            $imagePath = 'public/images/' . $user->image_nom;

            // Supprimer l'image physique si elle existe
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        // Réinitialiser les champs de l'image dans la base de données
        $user->image_nom = null;
        $user->image_chemin = null;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Photo de profil supprimée');
        } else {
            return redirect()->back()->with('error', 'Échec de la suppression');
        }
    }
}
