<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;


Route::get('/', [Controller::class, 'index_accueil'])->name('index_accueil');
Route::get('/Véhicules', [Controller::class, 'index_accueil_vehicule'])->name('index_accueil_vehicule');
Route::get('/Annonces', [Controller::class, 'index_annonce'])->name('index_annonce');
Route::get('/Tableau de Bord', [Controller::class, 'index_accueil_bord'])->name('index_accueil_bord');
