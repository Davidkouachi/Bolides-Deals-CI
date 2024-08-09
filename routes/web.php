<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BordController;

Route::get('/', [Controller::class, 'index_accueil'])->name('index_accueil');
Route::get('/Véhicules', [Controller::class, 'index_accueil_vehicule'])->name('index_accueil_vehicule');
Route::get('/Annonces', [Controller::class, 'index_annonce'])->name('index_annonce');

Route::post('/form_login', [AuthController::class, 'trait_login'])->name('trait_login');

Route::middleware(['auth'])->group(function () {

    /*--Deconnexion---*/
    Route::get('/Deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
    /*------*/

});

Route::middleware(['role:ADMINISTRATEUR'])->group(function () {
    Route::get('/Tableau de Bord', [BordController::class, 'index_accueil_bord'])->name('index_accueil_bord');

    Route::get('/Tableau de Bord/Marques de véhicules', [BordController::class, 'index_bord_marque'])->name('index_bord_marque');
    Route::post('/Traitement marque', [BordController::class, 'trait_marque'])->name('trait_marque');
});

