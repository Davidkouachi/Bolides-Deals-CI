<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BordController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LockController;

Route::get('/', [Controller::class, 'index_accueil'])->name('index_accueil');
Route::get('/Véhicules', [Controller::class, 'index_accueil_vehicule'])->name('index_accueil_vehicule');
Route::get('/Annonces', [Controller::class, 'index_annonce'])->name('index_annonce');

Route::get('/Login', [AuthController::class, 'index_login'])->name('index_login');
Route::get('/Registre', [AuthController::class, 'index_registre'])->name('index_registre');

Route::post('/form_login', [AuthController::class, 'trait_login'])->name('trait_login');
Route::post('/form_registre', [AuthController::class, 'trait_registre'])->name('trait_registre');

Route::middleware(['auth'])->group(function () {
    Route::get('/Deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
});

Route::middleware(['role:ADMINISTRATEUR'])->group(function () {
    Route::get('/Tableau de Bord', [BordController::class, 'index_accueil_bord'])->name('index_accueil_bord');

    Route::get('/Tableau de Bord/Marques de véhicules', [BordController::class, 'index_bord_marque'])->name('index_bord_marque');
    Route::post('/Traitement marque', [MarqueController::class, 'trait_marque'])->name('trait_marque');
    Route::post('/Supprimer marques', [MarqueController::class, 'suppr_marque'])->name('suppr_marque');
    Route::post('/Update marque/{id}', [MarqueController::class, 'update_marque'])->name('update_marque');

    Route::get('/Tableau de Bord/Rôles', [BordController::class, 'index_bord_role'])->name('index_bord_role');
    Route::post('/Traitement role', [RoleController::class, 'trait_role'])->name('trait_role');
    Route::post('/Supprimer roles', [RoleController::class, 'suppr_role'])->name('suppr_role');
    Route::post('/Update role/{id}', [RoleController::class, 'update_role'])->name('update_role');

    Route::get('/Tableau de Bord/Utilisateurs', [BordController::class, 'index_bord_user'])->name('index_bord_user');
    Route::get('/Tableau de Bord/lock/{id}', [LockController::class, 'lock'])->name('lock');
    Route::get('/Tableau de Bord/unlock/{id}', [LockController::class, 'unlock'])->name('unlock');
    Route::get('/Compte Vérouillé', [LockController::class, 'message_lock'])->name('message_lock');
});

