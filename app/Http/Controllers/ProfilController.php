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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\User;
use App\Models\Role;
use App\Models\Password_reset;
use App\Models\Delai_password_reset;
use App\Models\Phpmailer_error;

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
        

        return view('profil.index',['desac' => $desac,'joursEcoules' => $joursEcoules]);
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
}
