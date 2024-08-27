@extends('app')

@section('titre', 'Nouvelle Annonce Vente')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title ">
                            Mise à jour Vente
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a class="btn btn-white btn-outline-danger btn-dim d-none d-sm-inline-flex" href="javascript:void(0);" onclick="history.back()">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>
                                Retour
                            </span>
                        </a>
                        <a class="btn btn-white btn-outline-danger btn-dim d-inline-flex d-sm-none" href="javascript:void(0);" onclick="history.back()">
                            <em class="icon ni ni-arrow-left">
                            </em>
                        </a>
                    </div>
                </div>
            </div>
            <div class="nk-block nk-block-lg">
                <form class="nk-block" id="form" action="{{route('trait_annonce_update',$ann->uuid)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-gs" >
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
                                                                    <option value="{{ $value->id }}" 
                                                                        @if(isset($ann->marque_id) && $ann->marque_id == $value->id)
                                                                            selected 
                                                                        @endif>
                                                                        {{ $value->marque }}
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
                                                            <input required name="model" type="text" class="form-control form-control-md" placeholder="saisie obligatoire" value="{{$ann->model}}">
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
                                                                <option value="{{ $value->id }}" 
                                                                    @if(isset($ann->type_marque_id) && $ann->type_marque_id == $value->id)
                                                                        selected 
                                                                    @endif>
                                                                    {{ $value->nom }}
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
                                                            <input required type="tel" name="kilometrage" class="form-control" id="km" placeholder="saisie obligatoire" maxlength="7" value="{{$ann->kilometrage}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_trans">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Transmission</label>
                                                        <div class="form-control-wrap">
                                                            <select required name="transmission" class="form-select js-select2" data-placeholder="selectionner">
                                                                <option value=""></option>
                                                                <option value="automatique" 
                                                                    @if(isset($ann->transmission) && $ann->transmission == 'automatique') 
                                                                        selected 
                                                                    @endif>
                                                                    Automatique
                                                                </option>
                                                                <option value="manuelle" 
                                                                    @if(isset($ann->transmission) && $ann->transmission == 'manuelle') 
                                                                        selected 
                                                                    @endif>
                                                                    Manuelle
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_type_carb">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Type de carburant</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="type_carburant">
                                                                <option value="diesel" @if(isset($ann->type_carburant) && $ann->type_carburant == 'diesel') selected @endif>Diesel</option>
                                                                <option value="electrique" @if(isset($ann->type_carburant) && $ann->type_carburant == 'electrique') selected @endif>Electrique</option>
                                                                <option value="essence" @if(isset($ann->type_carburant) && $ann->type_carburant == 'essence') selected @endif>Essence</option>
                                                                <option value="gas-oil" @if(isset($ann->type_carburant) && $ann->type_carburant == 'gas-oil') selected @endif>Gas-oil</option>
                                                                <option value="hybride" @if(isset($ann->type_carburant) && $ann->type_carburant == 'hybride') selected @endif>Hybride</option>
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
                                                                    <option value="{{ $i }}" 
                                                                        @if(isset($ann->nbre_place) && $ann->nbre_place == $i) 
                                                                            selected 
                                                                        @endif>
                                                                        {{ $i }}
                                                                    </option>
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
                                                                <option value="standard" 
                                                                    @if(isset($ann->version) && $ann->version == 'standard') 
                                                                        selected 
                                                                    @endif>
                                                                    Standard
                                                                </option>
                                                                <option value="full option" 
                                                                    @if(isset($ann->version) && $ann->version == 'full option') 
                                                                        selected 
                                                                    @endif>
                                                                    Full Option
                                                                </option>
                                                                <option value="sport" 
                                                                    @if(isset($ann->version) && $ann->version == 'sport') 
                                                                        selected 
                                                                    @endif>
                                                                    Sport
                                                                </option>
                                                                <option value="autre" 
                                                                    @if(isset($ann->version) && $ann->version == 'autre') 
                                                                        selected 
                                                                    @endif>
                                                                    Autre
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_couleur">
                                                   <div class="form-group">
                                                        <label class="form-label">Couleur</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="couleur" type="text" class="form-control form-control-md" placeholder="saisie obligatoire" value="{{$ann->couleur}}">
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
                                                            <input required name="puiss_fiscal" type="tel" class="form-control form-control-md" id="puiss" placeholder="saisie obligatoire" maxlength="3" value="{{$ann->puiss_fiscal}}">
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
                                                            <input name="cylindre" type="tel" class="form-control form-control-md" placeholder="saisie obligatoire" id="cylin" maxlength="2" value="{{$ann->cylindre}}">
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
                                                                <option value="3" 
                                                                    @if(isset($ann->nbre_porte) && $ann->nbre_porte == 3) 
                                                                        selected 
                                                                    @endif>
                                                                    3
                                                                </option>
                                                                <option value="5" 
                                                                    @if(isset($ann->nbre_porte) && $ann->nbre_porte == 5) 
                                                                        selected 
                                                                    @endif>
                                                                    5
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_neuf">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Neuf</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="neuf">
                                                                <option value="oui" @if(isset($ann->neuf) && $ann->neuf == 'oui') selected @endif>
                                                                    Oui
                                                                </option>
                                                                <option value="non" @if(isset($ann->neuf) && $ann->neuf == 'non') selected @endif>
                                                                    Non
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_hors_taxe">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Hors taxe</label>
                                                        <div class="form-control-wrap">
                                                            <select id="hors_taxe" required class="form-select js-select2" data-placeholder="selectionner" name="hors_taxe">
                                                                <option value="oui" @if(isset($ann->hors_taxe) && $ann->hors_taxe == 'oui') selected @endif>
                                                                    Oui
                                                                </option>
                                                                <option value="non" @if(isset($ann->hors_taxe) && $ann->hors_taxe == 'non') selected @endif>
                                                                    Non
                                                                </option>
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
                                                                document.getElementById('div_assurance').style.display='none';
                                                                document.getElementById('div_visite_techn').style.display='none';

                                                            } else {
                                                                document.getElementById('div_papier').style.display='block';
                                                                document.getElementById('div_assurance').style.display='block';
                                                                document.getElementById('div_visite_techn').style.display='block';
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <div class="col-lg-4 col-md-6" id="div_papier" @if($ann->hors_taxe === 'oui') style="display: non;" @else style="display: block;" @endif>
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Papiers à jour</label>
                                                        <div class="form-control-wrap">
                                                            <select id="papier" required class="form-select js-select2" data-placeholder="selectionner" name="papier">
                                                                <option value="oui" @if(isset($ann->papier) && $ann->papier == 'oui') selected @endif>
                                                                    Oui
                                                                </option>
                                                                <option value="non" @if(isset($ann->papier) && $ann->papier == 'non') selected @endif>
                                                                    Non
                                                                </option>
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
                                                <div class="col-lg-4 col-md-6" id="div_assurance" @if($ann->papier === 'oui') style="display: block;" @else style="display: none;" @endif>
                                                   <div class="form-group">
                                                        <label class="form-label">Assurance</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="assurance" type="date" class="form-control form-control-md" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::parse($ann->asurance)->translatedFormat('Y-m-d') }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_visite_techn" @if($ann->papier === 'oui') style="display: block;" @else style="display: none;" @endif>
                                                   <div class="form-group">
                                                        <label class="form-label">Visite technique</label>
                                                        <div class="form-control-wrap">
                                                            <input required name="visite_techn" type="date" class="form-control form-control-md" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ \Carbon\Carbon::parse($ann->visite_techn)->translatedFormat('Y-m-d') }}" >
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
                                                            <input required type="tel" class="form-control" id="prix" placeholder="saisie obligatoire" name="prix" value="{{$ann->prix}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_porte">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Prix négociable</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="negociable">
                                                                <option value="oui" @if(isset($ann->negociable) && $ann->negociable == 'oui') selected @endif>
                                                                    Oui
                                                                </option>
                                                                <option value="non" @if(isset($ann->negociable) && $ann->negociable == 'non') selected @endif>
                                                                    Non
                                                                </option>
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
                                                                <option value="{{ $value->id }}" 
                                                                    @if(isset($ann->ville_id) && $ann->ville_id == $value->id)
                                                                        selected 
                                                                    @endif>
                                                                    {{ $value->nom }}
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
                                                            <input required name="localisation" type="text" class="form-control form-control-md" placeholder="saisie obligatoire" value="{{$ann->localisation}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_cle">
                                                   <div class="form-group">
                                                        <label class="form-label">Nombre de clés</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="Selectionner" name="nbre_cle">
                                                                <option value="oui" @if(isset($ann->nbre_cle) && $ann->nbre_cle == '1') selected @endif>
                                                                    1 clé
                                                                </option>
                                                                <option value="non" @if(isset($ann->nbre_cle) && $ann->nbre_cle == '2') selected @endif>
                                                                    2 clés
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_troc">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Troc Possible</label>
                                                        <div class="form-control-wrap">
                                                            <select required class="form-select js-select2" data-placeholder="selectionner" name="troc">
                                                                <option value="oui" @if(isset($ann->troc) && $ann->troc == 'oui') selected @endif>
                                                                    Oui
                                                                </option>
                                                                <option value="non" @if(isset($ann->troc) && $ann->troc == 'non') selected @endif>
                                                                    Non
                                                                </option>
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
                                                            <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="Contact" maxlength="10" value="{{$ann->whatsapp}}">
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
                                                            <input type="tel" name="sms" class="form-control" id="sms" placeholder="Contact" maxlength="10" value="{{$ann->sms}}">
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
                                                    <textarea required name="description" class="form-control no-resize" id="default-textarea">{{$ann->description}}</textarea>
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
                                                <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                                                    @for($i = 1; $i < 7; $i++)
                                                    @foreach($photos as $value)
                                                    @if($i === $value->image_nbre)
                                                    <div class="col">
                                                        <div class="">
                                                            <div class="card h-50" style="display: flex;justify-content: center;align-items: center;border:block;">
                                                                <a>
                                                                    <img id="imagePreview{{$i}}" style="object-fit: cover;height: 150px;"   src="{{ Storage::url($value->image_chemin) }}" />
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
                                                                <input type="file"  id="image{{$i}}" name="image{{$i}}" style="width:120px; margin-left: -13px;" accept="image/*">
                                                                <input type="hidden" id="update{{$i}}" name="update{{$i}}" value="0" >
                                                                <p id="image_size{{$i}}" style="display: none;" ></p>
                                                                {{-- {{ substr($value->image_nom, 22) }} --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    @endfor
                                                </div>
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

<script src="{{asset('assets/js/app/js/annonce/update/vente/download_image.js') }}"></script>
<script src="{{asset('assets/js/app/js/annonce/update/vente/form.js') }}"></script>


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
            var startYear = 2000;
            var selectedYear = {{ $ann->annee ?? 'null' }}; // Get the selected year from $ann->annee, or null if it doesn't exist

            for (var year = currentYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.textContent = year;

                // Check if this year should be selected by default
                if (selectedYear == year) {
                    option.selected = true;
                }

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