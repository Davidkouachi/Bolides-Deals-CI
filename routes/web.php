<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BordController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LockController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\PasswordresetController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\MesannoncesController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ParametrageController;


Route::middleware(['auth'])->group(function () {
    Route::get('/Deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');

    Route::get('/Profil', [ProfilController::class, 'index_profil'])->name('index_profil');
    Route::post('/Profil_update', [ProfilController::class, 'profil_update'])->name('profil_update');
    Route::post('/form_password_reset', [ProfilController::class, 'trait_password_profil'])->name('trait_password_profil');
    Route::get('/Delete_photo_profil/{id}', [ProfilController::class, 'delete_photo'])->name('delete_photo');

    Route::post('/trait_annonces', [AnnonceController::class, 'trait_annonce'])->name('trait_annonce');

    Route::get('/Mes Annonces/Détail/{id}/{uuid}', [MesannoncesController::class, 'index_mesannonces_detail'])->name('index_mesannonces_detail');
    Route::get('/Mes Annonces/Véhicule disponible/{uuid}', [MesannoncesController::class, 'trait_dispo'])->name('trait_dispo');
    Route::get('/Mes Annonces/Véhicule indisponible/{uuid}', [MesannoncesController::class, 'trait_indispo'])->name('trait_indispo');
    Route::get('/Mes Annonces/Supprimer annonce/{uuid}', [MesannoncesController::class, 'delete_ann'])->name('delete_ann');

    Route::get('/Nouvelle Annonces/Vente', [AnnonceController::class, 'index_annonce_new_vente'])->name('index_annonce_new_vente');
    Route::get('/Nouvelle Annonces/Location', [AnnonceController::class, 'index_annonce_new_location'])->name('index_annonce_new_location');

});

Route::middleware('statuthorsligne','CheckPapierJourMiddleware')->group(function () {

    Route::get('/Annonces', [AnnonceController::class, 'index_annonce'])->name('index_annonce');
    Route::get('/Detail Annonces/{uuid}', [AnnonceController::class, 'index_detail'])->name('index_detail');

});

Route::middleware(['auth','statuthorsligne','CheckPapierJourMiddleware'])->group(function () {

    Route::get('/Mes Annonces', [MesannoncesController::class, 'index_mesannonces'])->name('index_mesannonces');
    Route::get('/Mes Annonces/Mise à jour/Vente/{uuid}', [MesannoncesController::class, 'update_vente'])->name('update_vente');
    Route::get('/Mes Annonces/Mise à jour/Location/{uuid}', [MesannoncesController::class, 'update_location'])->name('update_location');
    Route::post('/trait_annonce_update/{uuid}', [MesannoncesController::class, 'trait_annonce_update'])->name('trait_annonce_update');
});

Route::middleware(['role:ADMINISTRATEUR'])->group(function () {
    Route::get('/Tableau de Bord', [BordController::class, 'index_accueil_bord'])->name('index_accueil_bord');
    Route::get('/Tableau de Bord/Suggestions', [BordController::class, 'index_bord_sugg'])->name('index_bord_sugg');

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

    Route::get('/Tableau de Bord/Paramétrage', [BordController::class, 'index_bord_parametrage'])->name('index_bord_parametrage');
    Route::post('/trait_nbre_jours_ligne', [ParametrageController::class, 'trait_nbre_jours_ligne'])->name('trait_nbre_jours_ligne');
    Route::post('/trait_nbre_jours_delete', [ParametrageController::class, 'trait_nbre_jours_delete'])->name('trait_nbre_jours_delete');
    Route::post('/trait_nbre_refresh', [ParametrageController::class, 'trait_nbre_refresh'])->name('trait_nbre_refresh');

});



Route::get('/', [Controller::class, 'index_accueil'])->name('index_accueil');

Route::get('/paiement', [PaiementController::class, 'index_paye'])->name('index_paye');
Route::post('/initiatePayment', [PaiementController::class, 'initiatePayment'])->name('initiatePayment');

Route::get('/Login', [AuthController::class, 'index_login'])->name('index_login');
Route::post('/form_login', [AuthController::class, 'trait_login'])->name('trait_login');
Route::get('/Registre', [AuthController::class, 'index_registre'])->name('index_registre');
Route::post('/form_registre', [AuthController::class, 'trait_registre'])->name('trait_registre');

Route::get('/Mot de passe oublié', [PasswordresetController::class, 'index_password'])->name('index_password');
Route::post('/traitement password', [PasswordresetController::class, 'trait_password'])->name('trait_password');
Route::get('/Reinitialisation/{token}', [PasswordresetController::class, 'index_new_password'])->name('index_new_password');
Route::post('/traitement password new', [PasswordresetController::class, 'trait_new_password'])->name('trait_new_password');
Route::get('/Succès Réinitialisation', [PasswordresetController::class, 'success_password'])->name('success_password');

Route::post('/Suggestion', [SuggestionController::class, 'trait_sugg'])->name('trait_sugg');
Route::get('/Send suggestion/{id}', [SuggestionController::class, 'send_sugg'])->name('send_sugg');

Route::get('/Annonces Vendeur/{id}', [AnnonceController::class, 'annonce_user'])->name('annonce_user');

Route::post('/Signal Annonce', [AnnonceController::class, 'signal_annonce'])->name('signal_annonce');
