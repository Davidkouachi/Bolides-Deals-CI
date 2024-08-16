@extends('app')

@section('titre', 'Nouvelle Annonce Vente')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <form class="nk-block" id="registre" class="" action="" method="post">
                    @csrf
                    <div class="nk-block-head">
                        <div class="nk-block-head-content text-center">
                            <h4 class="nk-block-title">Nouvelle Annonce</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-inner card-inner-lg">
                                <div id="contenu">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Formulaire</h4>
                                        </div>
                                    </div>
                                    <div class="row g-gs mb-4" >
                                        <div class="col-12 row g-gs align-items-center justify-content-center" >
                                            <div class="col-12 " >
                                                <div class="form-group">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <label class="form-label text-center" >Marque</label>
                                                                <div class="user-avatar xl sq border" style="background: transparent;">
                                                                    <img class="thumb" id="marqueImage">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 mt-n3" >
                                                <div class="form-group ">
                                                    <div class="form-control-wrap">
                                                        <select id="marqueSelect" class="form-select js-select2" data-placeholder="Selectionner">
                                                            <option value=""></option>
                                                            @foreach($marques as $value)
                                                            <option value="{{$value->id}}" data-image="{{$value->image_url}}">
                                                                {{$value->marque}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6" id="div_categorie">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Marque</label>
                                                <div class="form-control-wrap">
                                                    <select id="categorieSelect" class="form-select js-select2" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                        <option value="sd">
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="div_sous_categorie">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Ville</label>
                                                <div class="form-control-wrap">
                                                    <select id="sousCategorieSelect" class="form-select js-select2" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_titre">
                                           <div class="form-group">
                                                <label class="form-label">Model</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-md" placeholder="Entrer le titre de l'annonce">
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
                                                    <input type="text" class="form-control" id="prixa" placeholder="Prix de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Localisation</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_neuf">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Neuf</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Livraison Possible</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_troc">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Troc Possible</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Transmission</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Type de carburant</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Nombre de place</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Version</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Couleur</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Année</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Puissance fiscal</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Cylindré</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_livraison">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Type d'annonce</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Immatriculation</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_localisation">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Immatriculation</label>
                                                <div class="form-control-wrap">
                                                    <select id="villeSelect" class="form-select js-select2" data-search="on" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="default-textarea">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control no-resize" id="default-textarea"></textarea>
                                        </div>
                                    </div> 
                                    <div class="form-group"  id="div_photo">
                                        <label class="form-label d-flex" for="default-textarea">
                                            <span class="me-1" >Photo(s)</span> 
                                            <div id="fileCount"></div>
                                        </label>
                                        <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50" style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview1" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image1">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner pt-2 pb-2"> 
                                                        <input type="file" id="image1" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50 " style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview2" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image2">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner text-center pt-2 pb-2">
                                                        <input type="file" id="image2" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50 " style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview3" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image3">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner text-center pt-2 pb-2">
                                                        <input type="file" id="image3" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50 " style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview4" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image4">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner text-center pt-2 pb-2">
                                                        <input type="file" id="image4" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50 " style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview5" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image5">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner text-center pt-2 pb-2">
                                                        <input type="file" id="image5" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <div class="card h-50 " style="display: flex;justify-content: center;align-items: center;border:block;">
                                                        <a>
                                                            <img id="imagePreview6" style="object-fit: cover;height: 150px;" class="" src="" />
                                                        </a>
                                                        <ul class="product-badges" id="btn_image6">
                                                            <li>
                                                                <a class="btn btn-icon btn-white btn-danger btn-dim btn-sm" >
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-inner text-center pt-2 pb-2">
                                                        <input type="file" id="image6" style="width:120px; margin-left: -13px;" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row g-gs align-items-center justify-content-center">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
                                            <button type="reset" class="btn btn-md btn-white btn-dim btn-outline-warning btn-block ">
                                                <em class="icon ni ni-cross-circle"></em>
                                                <span>Rémise a zéro</span>
                                            </button>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6" >
                                            <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success btn-block">
                                                <span>Enregistrer</span>
                                                <em class="icon ni ni-arrow-right-circle"></em>
                                            </button>
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


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#categorieSelect').on('change', function() {
            var categorieId = $(this).val();
            if (categorieId) {
                $.ajax({
                    url: '/get-subcategories/' + categorieId, // Assurez-vous que cette route existe et renvoie les sous-catégories
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sousCategorieSelect').empty().append('<option value=""></option>');
                        $.each(data, function(key, value) {
                            $('#sousCategorieSelect').append(
                                '<option value="' + value.id + '">' + value.nom + '</option>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erreur :", error);
                    }
                });
            } else {
                $('#sousCategorieSelect').empty().append('<option value=""></option>');
            }
        });
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#villeSelect').on('change', function() {
            var villeId = $(this).val();
            if (villeId) {
                $.ajax({
                    url: '/get-commune/' + villeId, // Assurez-vous que cette route existe et renvoie les sous-catégories
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#communeSelect').empty().append('<option value=""></option>');
                        $.each(data, function(key, value) {
                            $('#communeSelect').append(
                                '<option value="' + value.id + '">' + value.nom + '</option>'
                            );
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Erreur :", error);
                    }
                });
            } else {
                $('#communeSelect').empty().append('<option value=""></option>');
            }
        });
    });
    </script>

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
                        imageUrl = 'storage/images/' + marque.image_nom;
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
                        initialImageUrl = 'storage/images/' + marque.image_nom;
                    }
                });
                if (initialImageUrl) {
                    imageElement.src = initialImageUrl;
                }
            }
        });
    </script>

@endsection