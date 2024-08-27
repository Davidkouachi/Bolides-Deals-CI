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
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Suggestion;
use App\Models\Annonce;
use App\Models\Parametrage;


class BordController extends Controller
{
    public function index_accueil_bord()
    {

        return view('bord.index');
    }

    public function index_bord_marque()
    {
        $marques = Marque::orderBy('created_at', 'desc')->get();
        return view('bord.marque.index',['marques' => $marques]);
    }

    public function index_bord_role()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();
        foreach ($roles as $value) {
            $nbre = User::where('role_id', '=', $value->id)->count();
            $value->nbre_user = $nbre;
        }
        return view('bord.role.index',['roles' => $roles]);
    }

    public function index_bord_user()
    {
        $users = User::join('roles', 'users.role_id', 'roles.id')
                    ->select('users.*','roles.nom as role')
                    ->orderBy('created_at', 'desc')
                    ->get();
        foreach ($users as $value) {
            $value->nbre_annonce = Annonce::where('user_id', '=', $value->id)->count() ?: 0;
            $value->nbre_annonce_ligne = Annonce::where('user_id', '=', $value->id)
                                                ->where('statut', '=', 'en ligne')
                                                ->count() ?: 0;
            $value->nbre_annonce_hligne = Annonce::where('user_id', '=', $value->id)
                                                ->where('statut', '=', 'hors ligne')
                                                ->count() ?: 0;
            $value->nbre_annonce_indispo = Annonce::where('user_id', '=', $value->id)
                                                ->where('statut', '=', 'indisponible')
                                                ->count() ?: 0;
        }

        return view('bord.user.index',['users' => $users]);
    }

    public function index_bord_sugg()
    {

        $suggs = Suggestion::orderBy('created_at', 'desc')->get();      

        return view('bord.suggestion.index',['suggs' => $suggs]);
    }

    public function index_bord_parametrage()
    {    
        $para = Parametrage::find('1');

        return view('bord.parametrage.index',['para'=>$para]);
    }

}
