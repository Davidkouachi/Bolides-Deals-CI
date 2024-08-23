<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Annonce;
use App\Models\Annonce_photo;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StatutHorsLigneMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $annonces = Annonce::all();
        $currentDate = Carbon::now();

        foreach ($annonces as $value) {

            $daysDifference = $value->nbre_refresh >= 1
            ? Carbon::parse($value->date_refresh)->diffInDays($currentDate)
            : Carbon::parse($value->created_at)->diffInDays($currentDate);

            if ($daysDifference > 10) {
                // Mettre à jour le statut de l'annonce à "hors ligne"
                $value->statut = 'hors ligne';
                $value->date_hors_ligne = Carbon::now()->format('Y-m-d');
                $value->save();
            }

            $days = Carbon::parse($value->date_hors_ligne)->diffInDays($currentDate);

            if ($value->statut === 'hors ligne' && $days > 5) {
                    
                    // Démarrer une transaction
                    DB::beginTransaction();

                    try {

                        $annonce = Annonce::find($value->id);
                        // Supprimer les images associées
                        $photos = Annonce_photo::where('annonce_id', $annonce->id)->get();

                        foreach ($photos as $photo) {
                            // Supprimer le fichier image du stockage
                            if (Storage::exists($photo->image_chemin)) {
                                if (!Storage::delete($photo->image_chemin)) {
                                    // Si la suppression échoue, lever une exception
                                    throw new \Exception('Erreur lors de la suppression de l\'image : ' . $photo->image_chemin);
                                }
                            }

                            // Supprimer l'enregistrement de la photo dans la base de données
                            if (!$photo->delete()) {
                                // Si la suppression échoue, lever une exception
                                throw new \Exception('Erreur lors de la suppression de l\'enregistrement de l\'image');
                            }
                        }

                        // Supprimer l'annonce
                        if (!$annonce->delete()) {
                            // Si la suppression de l'annonce échoue, lever une exception
                            throw new \Exception('Erreur lors de la suppression de l\'annonce');
                        }

                        // Si tout se passe bien, valider la transaction
                        DB::commit();

                        // return redirect()->route('index_mesannonces')->with('suppr', 'Annonce supprimée avec succès');
                    } catch (\Exception $e) {
                        // En cas d'erreur, annuler la transaction
                        DB::rollBack();
                        // Retourner un message d'erreur avec l'exception capturée
                        // return redirect()->route('index_mesannonces')->with('error', 'Échec de la suppression de l\'annonce : ' . $e->getMessage());
                    }
                
            } 

        }

        return $next($request);
    }
}
