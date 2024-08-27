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

class MarqueController extends Controller
{
    public function trait_marque(Request $request)
    {
        $marque = $request->input('marque');

        $rech0 = Marque::where('marque', '=', $marque)->first();
        if($rech0){
            return back()->with('warning', 'Cette marque existe déjà.');
        }

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // Renommer le fichier avec un nom unique pour éviter les conflits
                $filename = $request->file('image')->getClientOriginalName();

                $rech = Marque::where('image_nom', '=', $filename)->first();
                if($rech){
                    return back()->with('warning', 'Cette image existe déjà.');
                }

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

    public function suppr_marque(Request $request)
    {
        // Récupérer les IDs des marques sélectionnées
        $selectedIds = $request->input('checkboxes');

        if ($selectedIds) {
            // Récupérer les marques à supprimer
            $marques = Marque::whereIn('id', $selectedIds)->get();

            foreach ($marques as $marque) {
                $imagePath = storage_path('app/public/images/' . $marque->image_nom);
                // Supprimer l'image du stockage
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Supprimer la marque de la base de données
                $marque->delete();
            }

            return back()->with('success', 'Les marques sélectionnées ont été supprimées avec succès.');
        } else {
            return back()->with('error', 'Aucune marque sélectionnée.');
        }
    }

    public function update_marque(Request $request, $id)
    {
        // Récupérer la marque existante
        $marque = Marque::find($id);

        if (!$marque) {
            return back()->with('error', 'Marque non trouvée.');
        }

        // Mettre à jour le nom de la marque
        $marque->marque = $request->input('marque');

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // Supprimer l'ancienne image si elle existe
                $oldImagePath = storage_path('app/public/images/' . $marque->image_nom);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Renommer le fichier avec un nom unique pour éviter les conflits
                $filename = $request->file('image')->getClientOriginalName();

                $rech = Marque::where('image_nom', '=', $filename)
                                ->where('id', '!=', $id)
                                ->first();
                if($rech){
                    return back()->with('warning', 'Cette image existe déjà.');
                }

                $pdfPathname = $request->file('image')->storeAs('public/images', $filename);

                // Mettre à jour les informations de l'image
                $marque->image_nom = $filename;
                $marque->image_chemin = $pdfPathname;
            } else {
                return back()->with('error', 'Le fichier image est invalide.');
            }
        }

        // Sauvegarder les modifications dans la base de données
        if ($marque->save()) {
            return back()->with('success', 'Mise à jour effectuée.');
        } else {
            return back()->with('error', 'La mise à jour dans la base de données a échoué.');
        }
    }
}
