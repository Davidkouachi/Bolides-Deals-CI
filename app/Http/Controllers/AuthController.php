<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function index_login()
    {

        return view('auth.login');
    }

    public function index_registre()
    {
        return view('auth.registre');
    }

    public function trait_login(Request $request)
    {
        $login = $request->input('login'); // L'utilisateur peut entrer soit un email, soit un numéro de téléphone
        $password = $request->input('password');

        // Vérifier si le login est un email ou un numéro de téléphone
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Rechercher l'utilisateur par email ou téléphone avant l'authentification
        $user = User::where($fieldType, $login)->first();

        // Vérifier si l'utilisateur existe et s'il est bloqué
        if ($user && $user->lock === 'oui') {
            return redirect()->back()->with('user_locked','Cet compte est temporairement bloqué. Vous ne pouvez pas accéder à votre Profil pour le moment. Veuillez réessayer plus tard ou contacter le support si vous pensez qu\'il s\'agit d\'une erreur.');
        }

        // Essayer de se connecter avec l'email ou le numéro de téléphone
        if (Auth::attempt([$fieldType => $login, 'password' => $password])) {

            // Effacer l'URL prévue en session pour éviter des redirections indésirables
            Session::forget('url.intended');

            // Récupérer le rôle de l'utilisateur et le stocker en session
            $role_id = Auth::user()->role_id;
            $role = Role::find($role_id);
            if ($role) {
                session(['role' => $role]);
            }

            return redirect()->route('index_accueil')->with('success', 'Connexion réussie.');
        }

        return redirect()->back()->withInput($request->only('login'))
            ->with('error', 'L\'authentification a échoué. Veuillez vérifier vos informations d\'identification et réessayer.');
    }


    public function trait_registre(Request $request)
    {
        // Valider les champs du formulaire manuellement
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'adresse' => 'required|string',
            'password' => 'required|string',
            'cpassword' => 'required|string|same:password',
        ]);

        // Si la validation échoue
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('nom','prenom','phone','email'))->with('error','L\'authentification a échoué. Veuillez vérifier vos informations d\'identification et réessayer.');
        }

        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $adresse = $request->input('adresse');
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');

        $rech_email = User::where('email', '=', $email)->count();
        if ($rech_email > 0) {
            return redirect()->back()->withInput($request->only('nom','prenom','phone','email'))->with('error','L\'email existe déjà.');
        }

        $rech_phone = User::where('phone', '=', $phone)->count();
        if ($rech_phone > 0) {
            return redirect()->back()->withInput($request->only('nom','prenom','phone','email'))->with('error','Ce contact existe déjà.');
        }

        if($password !== $cpassword){
            return redirect()->back()->withInput($request->only('nom','prenom','phone','email'))->with('error','Mot de passe incorrect.');
        }

        $role_acheteur = Role::where('nom', '=', 'ACHETEUR')->first();

        $user = new User();
        $user->name = $nom;
        $user->prenom = $prenom;
        $user->phone = $phone;
        $user->email = $email;
        $user->adresse = $adresse;
        $user->date_mdp = now();
        $user->password = bcrypt($password );
        $user->lock = 'non';
        $user->role_id =  $role_acheteur->id;

        if ($user->save()) {
            return redirect()->route('index_login')->with('success','Compte créer avec succès. Veuillez vous connectez maintenant');
        }
    
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index_accueil')->with('info', 'Vous avez été déconnecté avec succès.');
    }
}
