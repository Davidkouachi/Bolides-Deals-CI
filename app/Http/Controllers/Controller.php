<?php

namespace App\Http\Controllers;

class Controller
{
    public function index_accueil()
    {
        return view('index');
    }

    public function index_accueil_vehicule()
    {
        return view('vehicule.accueil.index');
    }

    public function index_accueil_bord()
    {
        return view('bord.index');
    }

    public function index_annonce()
    {
        return view('vehicule.annonce.index');
    }
}
