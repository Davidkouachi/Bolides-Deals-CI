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
use App\Models\Marque;

class RoleController extends Controller
{
    public function trait_role(Request $request)
    {
        $role = $request->input('role');

        $rech0 = Role::where('nom', '=', $role)->first();
        if($rech0){
            return back()->with('warning', 'Cet Rôle existe déjà.');
        }

        $eng = new Role();
        $eng->nom = $role;

        if ($eng->save()) {
            return back()->with('success', 'Enregistrement effectué.');
        } else {
            return back()->with('error', 'La sauvegarde dans la base de données a échoué.');
        }
    }

    public function suppr_role(Request $request)
    {
        // Récupérer les IDs des marques sélectionnées
        $selectedIds = $request->input('checkboxes');

        if ($selectedIds) {
            // Récupérer les marques à supprimer
            $dels = Role::whereIn('id', $selectedIds)->get();

            foreach ($dels as $del) {
                // Supprimer la marque de la base de données
                $del->delete();
            }

            return back()->with('success', 'Suppression effectué.');
        } else {
            return back()->with('error', 'Aucun rôle sélectionnée.');
        }
    }

    public function update_role(Request $request, $id)
    {
        // Récupérer la marque existante
        $rech = Role::find($id);

        if (!$rech) {
            return back()->with('error', 'Rôle non trouvée.');
        }
        $rech->nom = $request->input('role');
        // Sauvegarder les modifications dans la base de données
        if ($rech->save()) {
            return back()->with('success', 'Mise à jour effectuée.');
        } else {
            return back()->with('error', 'La mise à jour dans la base de données a échoué.');
        }
    }
}
