@extends('app')

@section('titre', 'Nouvelle Annonce Vente')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <form class="nk-block" id="form_new_vente" action="{{route('trait_annonce')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-gs" >
                        <div class="col-12">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content text-center">
                                    <h4 class="nk-block-title">Nouvelle Annonce Vente</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show mb-4 rounded-6" role="alert">
                                    <ul>
                                        <li>
                                            <p class="small mb-0 fs-14px">
                                                - Les annonces ont une durée de <strong>{{$para->nbre_jours_ligne}} jours maximum.</strong> Passé ce délai, elles ne seront plus en ligne.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="small mb-0 fs-14px">
                                                - Si aucun renouvellement n'est effectué dans <strong>les {{$para->nbre_jours_delete}} jours</strong> suivant la désactivation, l'annonce sera <strong>supprimée définitivement</strong>.
                                            </p>
                                        </li>
                                        <li>
                                           <p class="small mb-0 fs-14px">
                                                - Si l'annonce n'est plus disponible, veuillez marquer son <strong>statut comme "indisponible"</strong>. Dans ce cas, l'annonce ne sera pas supprimée définitivement mais sera <strong>retirée de la liste des annonces disponible</strong>.
                                            </p> 
                                        </li>
                                        <li>
                                            <p class="small mb-0 fs-14px">
                                                - Veuillez noter que vous ne pouvez <strong>renouveler une annonce que {{$para->nbre_refresh}} fois</strong>.
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="d-inline-flex position-absolute end-0 top-50 translate-middle-y me-2">
                                        <button type="button" class="btn btn-xs btn-icon btn-warning rounded-pill" data-bs-dismiss="alert">
                                            <em class="icon ni ni-cross"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-inner card-inner-lg">
                                        <div id="contenu">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Informations Spécifiques</h4>
                                                </div>
                                                <div class="nk-block-des">
                                                    <p>
                                                        Vous devez fournir toutes les informations spécifiques du véhicule pour l'annonce.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row g-gs mb-4" >
                                                <div class="col-12 row g-gs align-items-center justify-content-center" >
                                                    <div class="col-12 " >
                                                        <div class="form-group">
                                                            <div class="card-inner">
                                                                <div class="team">
                                                                    <div class="user-card user-card-s2">
                                                                        <label class="form-label text-center" > Photo de la marque</label>
                                                                        <div class="user-avatar xl sq border p-1" style="background: transparent;">
                                                                            <img class="thumb" id="marqueImages">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_type_vehicule">
                                                    <div class="form-group">
                                                        <label class="form-label" for="type-vehicule">
                                                            Marque
                                                        </label>
                                                        <div class="form-control-wrap">
                                                                <select required id="marqueSelect" class="form-select js-select2" data-placeholder="Selectionner" name="marque_id">
                                                                    <option value=""></option>
                                                                    @foreach($marques as $value)
                                                                    <option value="{{$value->id}}">
                                                                        {{$value->marque}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_model">
                                                   <div class="form-group">
                                                        <label class="form-label">Model</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="model" type="text" class="form-control form-control-md" placeholder="Entrer le model du véhicule">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_annee">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Année</label>
                                                        <div class="form-control-wrap">
                                                            <select required id="anneeSelect" name="annee" class="form-select js-select2" data-placeholder="selectionner">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_type_vehicule">
                                                    <div class="form-group">
                                                        <label class="form-label" for="type-vehicule">Type de Véhicule</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="Sélectionner" name="type_marque_id">
                                                                <option value=""></option>
                                                                @foreach($types as $value)
                                                                <option value="{{$value->id}}">
                                                                    {{$value->nom}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_km">
                                                   <div class="form-group">
                                                        <label class="form-label" for="default-05">Kilométrage</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">KM</span>
                                                            </div>
                                                            <input required type="tel" name="kilometrage" class="form-control" id="km" placeholder="Kilométrage de véhicule" maxlength="7">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_trans">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Transmission</label>
                                                        <div class="form-control-wrap">
                                                            <select required name="transmission" class="form-select js-select2" data-placeholder="selectionner">
                                                                <option value=""></option>
                                                                <option value="automatique">Automatique</option>
                                                                <option value="manuelle">Manuelle</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_type_carb">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Type de carburant</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="type_carburant">
                                                                <option value=""></option>
                                                                <option value="diesel">Diesel</option>
                                                                <option value="electrique">Electrique</option>
                                                                <option value="essence">Essence</option>
                                                                <option value="gas-oil">Gas-oil</option>
                                                                <option value="hybride">Hybride</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_nbre_place">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Nombre de place</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="nbre_place">
                                                                <option value=""></option>
                                                                @for($i=1; $i < 51 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_vers">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Version</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="version">
                                                                <option selected value="standard">Standard</option>
                                                                <option value="full option">Full Option</option>
                                                                <option value="sport">Sport</option>
                                                                <option value="autre">Autre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_couleur">
                                                   <div class="form-group">
                                                        <label class="form-label">Couleur</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="couleur" type="text" class="form-control form-control-md" placeholder="Entrer la couleur du véhicule">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_puiss_fisc">
                                                   <div class="form-group">
                                                        <label class="form-label">Puissance Fiscale</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">CV</span>
                                                            </div>
                                                            <input required name="puiss_fiscal" type="tel" class="form-control form-control-md" id="puiss" placeholder="Entrer le nombre de Chevaux" maxlength="3">
                                                            <script>
                                                                var inputElement = document.getElementById('puiss');
                                                                inputElement.addEventListener('input', function() {
                                                                    // Supprimer tout sauf les chiffres
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_titre">
                                                   <div class="form-group">
                                                        <label class="form-label">Cylindré</label>
                                                        <div class="form-control-wrap">
                                                            <input name="cylindre" type="tel" class="form-control form-control-md" placeholder="Entrer le nombre de cylindré" id="cylin" maxlength="2">
                                                            <script>
                                                                var inputElement = document.getElementById('cylin');
                                                                inputElement.addEventListener('input', function() {
                                                                    // Supprimer tout sauf les chiffres
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_porte">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Nombre de Portes</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="nbre_porte">
                                                                <option value=""></option>
                                                                <option value="3">3</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_neuf">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Neuf</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="neuf">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_hors_taxe">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Hors taxe</label>
                                                        <div class="form-control-wrap">
                                                            <select id="hors_taxe" required class="form-select js-select2" data-placeholder="selectionner" name="hors_taxe">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        $('#hors_taxe').on('change', function() {
                                                            var selectedValue = $(this).val();

                                                            if (selectedValue == 'oui') {
                                                                document.getElementById('div_papier').style.display='none';

                                                            } else {
                                                                document.getElementById('div_papier').style.display='block';
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <div class="col-lg-4 col-md-6" id="div_papier" style="display: none;">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Papiers à jour</label>
                                                        <div class="form-control-wrap">
                                                            <select id="papier" required class="form-select js-select2" data-placeholder="selectionner" name="papier">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option selected value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        $('#papier').on('change', function() {
                                                            var selectedValue = $(this).val();

                                                            if (selectedValue == 'oui') {
                                                                document.getElementById('div_assurance').style.display='block';
                                                                document.getElementById('div_visite_techn').style.display='block';
                                                            } else {
                                                                document.getElementById('div_assurance').style.display='none';
                                                                document.getElementById('div_visite_techn').style.display='none';
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <div class="col-lg-4 col-md-6" id="div_assurance" style="display: none;">
                                                   <div class="form-group">
                                                        <label class="form-label">Assurance</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="assurance" type="date" class="form-control form-control-md" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::now()->toDateString() }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_visite_techn" style="display: none;">
                                                   <div class="form-group">
                                                        <label class="form-label">Visite technique</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="visite_techn" type="date" class="form-control form-control-md" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::now()->toDateString() }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-inner card-inner-lg">
                                        <div id="contenu">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Informations de Base</h4>
                                                </div>
                                                <div class="nk-block-des">
                                                    <p>
                                                        Vous devez fournir toutes les informations de base nécessaires pour l'annonce.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row g-gs mb-4" >
                                                <div class="col-lg-4 col-md-6" id="div_type_annonce" hidden>
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Type d'annonce</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" id="typeAnnonce" name="type_annonce">
                                                                <option value=""></option>
                                                                <option selected value="vente">Vente</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_prix">
                                                   <div class="form-group">
                                                        <label class="form-label" for="default-05">Prix</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">Fcfa</span>
                                                            </div>
                                                            <input required type="tel" class="form-control" id="prix" placeholder="Prix de l'annonce" name="prix">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_porte">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Prix négociable</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="negociable">
                                                                <option value=""></option>
                                                                <option value="oui">Oui</option>
                                                                <option selected value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_ville">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Ville</label>
                                                        <div class="form-control-wrap">
                                                            <select required id="sousCategorieSelect" class="form-select js-select2" data-placeholder="Selectionner" name="ville_id">
                                                                <option value=""></option>
                                                                @foreach($villes as $value)
                                                                <option value="{{$value->id}}">
                                                                    {{$value->nom}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_localisation">
                                                   <div class="form-group">
                                                        <label class="form-label">Localisation</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="localisation" type="text" class="form-control form-control-md" placeholder="Situation géographique">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_cle">
                                                   <div class="form-group">
                                                        <label class="form-label">Nombre de clés</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="Selectionner" name="nbre_cle">
                                                                <option value=""></option>
                                                                <option value="1"> 1 clé</option>
                                                                <option value="2"> 2 clés</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_troc">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Troc Possible</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="troc">
                                                                <option value="oui">Oui</option>
                                                                <option selected value="non">Non</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-gs mb-4" >
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Whatsapp</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-whatsapp"></em>
                                                            </div>
                                                            <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="Contact whatsapp" maxlength="10">
                                                            <script>
                                                                var inputElement = document.getElementById('whatsapp');
                                                                inputElement.addEventListener('input', function() {
                                                                    // Supprimer tout sauf les chiffres
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Appel</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-call"></em>
                                                            </div>
                                                            <input name="appel" type="tel" required class="form-control" id="appel" placeholder="Contact" value="{{Auth::user()->phone}}">
                                                            <script>
                                                                var inputElement = document.getElementById('appel');
                                                                inputElement.addEventListener('input', function() {
                                                                    // Supprimer tout sauf les chiffres
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                                    <div class="form-group"><label class="form-label" for="default-03">Sms</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-mail"></em>
                                                            </div>
                                                            <input type="tel" name="sms" class="form-control" id="sms" placeholder="Contact sms" maxlength="10">
                                                            <script>
                                                                var inputElement = document.getElementById('sms');
                                                                inputElement.addEventListener('input', function() {
                                                                    // Supprimer tout sauf les chiffres
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Descriptions / Conditions</label>
                                                <div class="form-control-wrap">
                                                    <textarea required name="description" class="form-control no-resize" id="default-textarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-inner card-inner-lg">
                                        <div id="contenu">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Photo de l'annonce</h4>
                                                </div>
                                                <div class="nk-block-des">
                                                    <p>
                                                        Vous devez <strong>télécharger obligatoirement 6 photos</strong> pour l'annonce. <strong>Chaque photo doit être inférieure à 2 Mo</strong>.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group"  id="div_photo">
                                                <label class="form-label d-flex" for="default-textarea">
                                                    <span class="me-1" >Photo(s)</span> 
                                                    <div id="fileCount"></div>
                                                </label>
                                                {{-- <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'> --}}
                                                <input type="hidden" name="nbre_photo" id="nbre_photo" value="{{$para->nbre_photo}}">
                                                <ul class="filter-button-group mb-4 pb-2 align-items-center justify-content-center">
                                                    @for($i = 1; $i <= $para->nbre_photo; $i++)
                                                    <li>
                                                    <div class="" style="height: 100px;width: 100px;">
                                                        <div class="me-1">
                                                            <div class="card" style="display: flex;justify-content: center;align-items: center;border:block;border-radius: 0px;">
                                                                <a >
                                                                    <img id="imagePreview{{$i}}" style="object-fit: cover;height: 100px;width: 100px; display: none" />
                                                                    <img id="imageDefaut{{$i}}" style="object-fit: cover;height: 100px;width: 100px; cursor: pointer;" src="{{asset('images/logo/defaut/image.png')}}"  />
                                                                </a>
                                                                <ul class="product-badges" id="btn_image{{$i}}">
                                                                    <li>
                                                                        <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                            <em class="icon ni ni-cross"></em>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-inner pt-2 pb-2">
                                                                <input style="display: none" type="file" required id="image{{$i}}" name="image{{$i}}" style="width:120px; margin-left: -13px;" accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="form-group row g-gs align-items-center justify-content-center">
                                                <div class="col-12 text-center" >
                                                    <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success ">
                                                        <span>Publier l'annonce</span>
                                                        <em class="icon ni ni-send"></em>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/app/js/annonce/new/vente/download_image.js') }}"></script>
<script src="{{asset('assets/js/app/js/annonce/new/vente/form.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageElement = document.getElementById('marqueImages');

            // Convertir les données PHP en format JSON pour JavaScript
            var marques = @json($marques);

            $('#marqueSelect').on('change', function() {
                var selectedValue = $(this).val();
                
                // Trouver l'image correspondant à la valeur sélectionnée
                var imageUrl = '';
                marques.forEach(function(marque) {
                    if (marque.id == selectedValue) {
                        imageUrl = '{{ asset('storage/images/') }}/' + marque.image_nom;
                    }
                });

                // Mettre à jour la source de l'image ou la vider si aucune marque n'est sélectionnée
                if (imageUrl) {
                    imageElement.src = imageUrl;
                } else {
                    imageElement.src = ''; // Clear the image if no brand is selected
                }
            });

            // Optionnel : Initialiser l'image au chargement de la page, si nécessaire
            var initialValue = $('#marqueSelect').val();
            if (initialValue) {
                var initialImageUrl = '';
                marques.forEach(function(marque) {
                    if (marque.id == initialValue) {
                        initialImageUrl = '{{ asset('storage/images/') }}/' + marque.image_nom;
                    }
                });
                if (initialImageUrl) {
                    imageElement.src = initialImageUrl;
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var anneeSelect = document.getElementById('anneeSelect');
            var currentYear = new Date().getFullYear();
            var startYear = 2000; // Commencer à partir de 2021

            for (var year = currentYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                anneeSelect.appendChild(option);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Écouter l'événement d'entrée sur les champs de texte
            document.getElementById('km').addEventListener('input', function() {
                this.value = formatPrice(this.value);
            });
            // Écouter l'événement d'entrée sur les champs de texte
            document.getElementById('prix').addEventListener('input', function() {
                this.value = formatPrice(this.value);
            });

            // Événement pour permettre uniquement les chiffres
            document.getElementById('km').addEventListener('keypress', function(event) {
                const key = event.key;
                if (isNaN(key)) {
                    event.preventDefault();
                }
            });

            // Événement pour permettre uniquement les chiffres
            document.getElementById('prix').addEventListener('keypress', function(event) {
                const key = event.key;
                if (isNaN(key)) {
                    event.preventDefault();
                }
            });

            // Fonction pour formater le prix avec des points
            function formatPrice(input) {
                // Supprimer tous les points existants
                input = input.replace(/\./g, '');

                // Formater le prix avec des points
                return input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
    </script>

    @if (session('success_ann'))
        <div class="modal fade" tabindex="-1" id="modalSuccess_ann" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content bg-white">
                    <div class="modal-body">
                        <div class="team" style="margin-top: -60px;">
                            <div class="user-card user-card-s2">
                                <div class="row g-gs user-info">
                                    <div class="col-12" >
                                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                        <h4 class="nk-modal-title">
                                            Félicitations votre annonce a bien été publié
                                        </h4>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <img height="100px" width="100px" src="{{ session('imgqr') }}" alt="Code QR">
                                        <p>{{ session('data_qrcode') }}</p>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <a class="btn btn-white btn-outline-light btn-dim btn-sm mt-1 me-1" href="{{route('index_detail', session('uuid'))}}">
                                            <em class="icon ni ni-eye"></em>
                                            <span>Voir l'annonce</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Modal(document.getElementById('modalSuccess_ann'));
                myModal.show();
            });
        </script>
        @php session()->forget('success_ann'); @endphp
    @endif



@endsection