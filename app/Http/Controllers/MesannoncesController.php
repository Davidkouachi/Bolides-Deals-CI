<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Ville;

class MesannoncesController extends Controller
{
    public function index_mesannonces()
    {
        return view('vehicule.mes_annonces.index');
    }

    public function index_mesannonces_detail()
    {
        $data_qrcode = 'http://127.0.0.1:8000/D%C3%A9tail%20Annonces';
        $qrCode = new QrCode($data_qrcode);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $imgqr = $result->getDataUri();
        
        return view('vehicule.mes_annonces.detail',['imgqr' => $imgqr,'data_qrcode' => $data_qrcode]);
    }
}
