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
                            Renouvelement Location
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
                <form class="nk-block" id="form" action="{{route('trait_annonce_refresh',$ann->uuid)}}" method="post" enctype="multipart/form-data">
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
                                                                            <img class="thumb" id="marqueImage">
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
                                                                @for($i = 1; $i < 51; $i++)
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
                                                <div class="col-lg-4 col-md-6" id="div_imm" >
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">
                                                            Immatriculation
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input id="imm" required name="imm" type="text" class="form-control form-control-md" placeholder="Entrer l'immatriculation du véhicule sans espace" oninput="removeSpaces(this)" value="{{$ann->imm}}">
                                                            <script>
                                                                function removeSpaces(input) {
                                                                    input.value = input.value.replace(/\s+/g, '');
                                                                }
                                                            </script>
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
                                                                <option selected value="location">Location</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_prix">
                                                   <div class="form-group">
                                                        <label class="form-label" for="default-05">Prix</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">Fcfa / 24H</span>
                                                            </div>
                                                            <input required type="tel" class="form-control" id="prix" placeholder="saisie obligatoire" name="prix" value="{{$ann->prix}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6" id="div_ville">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cp1-team-size">Ville</label>
                                                        <div class="form-control-wrap">
                                                            <select required id="sousCategorieSelect" class="form-select js-select2" data-placeholder="Selectionner" name="ville_id">
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
                                                    <span class="me-1" >Photo(s) Changée(s)</span> 
                                                    <div id="fileCount"></div>
                                                </label>
                                                {{-- <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'> --}}
                                                <input type="hidden" name="nbre_photo" id="nbre_photo" value="{{$photos->count()}}">
                                                <ul class="filter-button-group mb-4 pb-2 align-items-center justify-content-center">
                                                    @for($i = 1; $i <= $photos->count(); $i++)
                                                    @foreach($photos as $value)
                                                    @if($i === $value->image_nbre)
                                                    <li>
                                                    <div class="" style="height: 100px;width: 100px;">
                                                        <div class="me-1">
                                                            <div class="card" style="display: flex;justify-content: center;align-items: center;border:block;border-radius: 0px;">
                                                                <a>
                                                                    <img id="imagePreview{{$i}}" style="object-fit: cover;height: 100px;width: 100px;"   src="{{ Storage::url($value->image_chemin) }}" />
                                                                    <img id="imageDefaut{{$i}}" style="object-fit: cover;height: 100px;width: 100px; cursor: pointer; display: none" src="{{asset('images/logo/defaut/image.png')}}"  />
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
                                                                <input type="file" id="image{{$i}}" name="image{{$i}}" style="width:120px; margin-left: -13px;display: none;" accept="image/*">
                                                                <input type="hidden" id="update{{$i}}" name="update{{$i}}" value="0" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="form-group row g-gs align-items-center justify-content-center">
                                                <div class="col-12 text-center" >
                                                    <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success ">
                                                        <span>Terminer</span>
                                                        <em class="icon ni ni-check-circle"></em>
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

<script src="{{asset('assets/js/app/js/annonce/refresh/location/download_image.js') }}"></script>
<script src="{{asset('assets/js/app/js/annonce/refresh/location/form.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var imageElement = document.getElementById('marqueImage');

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
            // Écouter l'événement d'entrée sur les champs de texte
            document.getElementById('prix').addEventListener('input', function() {
                this.value = formatPrice(this.value);
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

@endsection