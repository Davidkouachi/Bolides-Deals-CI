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

class LockController extends Controller
{
    public function lock($id)
    {
        $user = User::find($id);
        $user->lock = 'oui';
        $user->increment('nbre_lock');
        $user->date_lock = now();
        if ($user->save()) {
            return back()->with('success','Utilisateur vérouillé avec succès');
        }else{
            return back()->with('error', 'La sauvegarde dans la base de données a échoué.');
        }
        
    }

    public function unlock($id)
    {
        $user = User::find($id);
        $user->lock = 'non';
        $user->date_unlock = now();
        if ($user->save()) {
            return back()->with('success','Utilisateur dévérouillé avec succès');
        }else{
            return back()->with('error', 'La sauvegarde dans la base de données a échoué.');
        }
    }
}
