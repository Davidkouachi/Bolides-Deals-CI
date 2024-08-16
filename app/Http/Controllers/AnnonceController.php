<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Marque;



class AnnonceController extends Controller
{
    public function index_annonce()
    {
        return view('vehicule.annonce.index');
    }

    public function index_detail()
    {
        $data_qrcode = 'http://127.0.0.1:8000/D%C3%A9tail%20Annonces';
        $qrCode = new QrCode($data_qrcode);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $imgqr = $result->getDataUri();

        return view('vehicule.annonce.detail',['imgqr' => $imgqr,'data_qrcode' => $data_qrcode]);
    }

    public function index_annonce_new()
    {
        $marques = Marque::all();
        foreach ($marques as $value) {
            $value->image_url = asset('storage/images/' . $value->image_nom);
        }
        return view('vehicule.annonce.new.new',['marques' => $marques]);
    }

}
