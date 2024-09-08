<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Ville;
use App\Models\Type_marque;
use App\Models\Annonce;
use App\Models\Annonce_photo;
use App\Models\Annonce_error;
use App\Models\Parametrage;
use App\Models\Signal_annonce;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index_stat()
    {
        // Créez la requête de base
        $anns = Annonce::where('user_id', '=', Auth::user()->id)
                        ->join('marques','marques.id','=','annonces.marque_id')
                        ->select('annonces.*', 'marques.marque as marque',)
                        ->orderBy('views', 'desc')
                        ->take(10)
                        ->get();

        foreach ($anns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                ->orderBy('created_at', 'asc')
                ->first();

            $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
        }

        $tanns = Annonce::where('user_id', '=', Auth::user()->id)
                        ->join('marques', 'marques.id', '=', 'annonces.marque_id')
                        ->select('annonces.*', 'marques.marque as marque')
                        ->orderByRaw('REPLACE(prix, ".", "") + 0 DESC') // Convertir le prix en nombre pour la comparaison
                        ->take(10)
                        ->get();

        foreach ($tanns as $value) {
            $firstPhoto = Annonce_photo::where('annonce_id', '=', $value->id)
                ->orderBy('created_at', 'asc')
                ->first();

            $value->photo = $firstPhoto ? $firstPhoto->image_chemin : null;
        }

        $vanns = $tanns->where('type_annonce', '=', 'vente');
        $lanns = $tanns->where('type_annonce', '=', 'location');

        return view('statistique.index',['anns'=>$anns,'vanns'=>$vanns,'lanns'=>$lanns,'tanns' => $tanns]);
    }

    public function stat_anne(Request $request)
    {
        $selectedYear = $request->input('annee', Carbon::now()->year);
        $currentMonth = Carbon::now()->month;

        $data = Annonce::selectRaw('MONTH(created_at) as month, 
                                   COUNT(CASE WHEN type_annonce = "vente" THEN 1 ELSE NULL END) as total_vente,
                                   COUNT(CASE WHEN type_annonce = "location" THEN 1 ELSE NULL END) as total_location')
                       ->whereYear('created_at', $selectedYear)
                       ->where('user_id', Auth::user()->id)
                       ->groupBy('month')
                       ->get();

        if($selectedYear != Carbon::now()->year){

            $months = array_fill(0, 12, 0);
            $vente = array_fill(0, 12, 0);
            $location = array_fill(0, 12, 0);

        }else{
            
            $months = array_fill(0, $currentMonth, 0);
            $vente = array_fill(0, $currentMonth, 0);
            $location = array_fill(0, $currentMonth, 0);
        }

        foreach ($data as $d) {
            $index = $d->month - 1;
            $vente[$index] = $d->total_vente;
            $location[$index] = $d->total_location;
        }

        $total_vente = Annonce::where('type_annonce', 'vente')->whereYear('created_at', $selectedYear)->where('user_id', Auth::user()->id)->count();
        $total_location = Annonce::where('type_annonce', 'location')->whereYear('created_at', $selectedYear)->where('user_id', Auth::user()->id)->count();
        $total_annonces = Annonce::whereYear('created_at', $selectedYear)->where('user_id', Auth::user()->id)->count();

        return response()->json([
            'months' => $months,
            'vente' => $vente,
            'location' => $location,
            'total_vente' => $total_vente,
            'total_location' => $total_location,
            'total_annonces' => $total_annonces,
        ]);
    }

    public function stat_statut(Request $request)
    {
        $total_ligne = Annonce::where('statut', '=', 'en ligne')->where('user_id', Auth::user()->id)->count();
        $total_hligne = Annonce::where('statut', '=', 'hors ligne')->where('user_id', Auth::user()->id)->count();
        $total_indispo = Annonce::where('statut', '=', 'indisponible')->where('user_id', Auth::user()->id)->count();
        $total_vendu = Annonce::where('statut', '=', 'vendu')->where('user_id', Auth::user()->id)->count();
        $total_louer = Annonce::where('statut', '=', 'louer')->where('user_id', Auth::user()->id)->count();

        return response()->json([
            'total_ligne' => $total_ligne,
            'total_hligne' => $total_hligne,
            'total_indispo' => $total_indispo,
            'total_vendu' => $total_vendu,
            'total_louer' => $total_louer,
        ]);
    }
}
