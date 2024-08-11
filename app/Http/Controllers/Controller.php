<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Marque;

class Controller
{
    public function index_accueil()
    {
        $marques = Marque::orderBy('marque', 'asc')->get();
        return view('index',['marques' => $marques]);
    }

}
