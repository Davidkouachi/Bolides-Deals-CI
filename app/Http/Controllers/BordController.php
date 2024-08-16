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
        return view('bord.user.index',['users' => $users]);
    }

    public function index_bord_sugg()
    {

        $suggs = Suggestion::orderBy('created_at', 'desc')->get();      

        return view('bord.suggestion.index',['suggs' => $suggs]);
    }

}
