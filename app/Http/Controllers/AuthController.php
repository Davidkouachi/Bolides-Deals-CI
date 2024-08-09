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

    public function trait_login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            Session::forget('url.intended');
            //Auth::logoutOtherDevices($request->password);
            
            $role_id = Auth::user()->role_id;

            $role = Role::find($role_id);
            if ($role) {
                session(['user_role' => $role->nom]);
            }

            return redirect()->back()->with('success', 'Connexion réussi.');
        }

        return redirect()->back()->with('error', 'L\'authentification a échoué. Veuillez vérifier vos informations d\'identification et réessayer.',);
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index_accueil')->with('info', 'Vous avez été déconnecté avec succès.');
    }
}
