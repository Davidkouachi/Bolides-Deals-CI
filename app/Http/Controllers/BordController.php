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


    public function trait_marque(Request $request)
    {
        $marque = $request->input('marque');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // Renommer le fichier avec un nom unique pour éviter les conflits
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $pdfPathname = $request->file('image')->storeAs('public/images', $filename);

                // Enregistrement des informations dans la base de données
                $marq = new Marque();
                $marq->image_nom = $filename;
                $marq->image_chemin = $pdfPathname;
                $marq->marque = $marque;

                if ($marq->save()) {
                    return back()->with('success', 'Enregistrement effectué.');
                } else {
                    return back()->with('error', 'La sauvegarde dans la base de données a échoué.');
                }
            } else {
                return back()->with('error', 'Le fichier image est invalide.');
            }
        } else {
            return back()->with('error', 'Aucun fichier image détecté.');
        }
    }


}
