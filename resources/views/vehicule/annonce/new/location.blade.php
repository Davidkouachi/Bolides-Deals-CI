@extends('app')

@section('titre', 'Nouvelle Annonce Location')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <form class="nk-block" id="registre" class="" action="" method="post">
                    @csrf
                    <div class="nk-block-head">
                        <div class="nk-block-head-content text-center">
                            <h4 class="nk-block-title">Location</h4>
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

                                        <div class="col-md-6" id="div_categorie">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Catégorie</label>
                                                <div class="form-control-wrap">
                                                    <select id="categorieSelect" class="form-select js-select2" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="div_sous_categorie">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Sous-catégorie</label>
                                                <div class="form-control-wrap">
                                                    <select id="sousCategorieSelect" class="form-select js-select2" data-placeholder="Selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_titre">
                                           <div class="form-group">
                                                <label class="form-label">Titre</label>
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
                                        <div class="col-lg-4 col-md-6" id="div_commune">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Commune</label>
                                                <div class="form-control-wrap">
                                                    <select id="communeSelect" class="form-select js-select2" data-placeholder="Selectionner">
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

                                        <div class="col-lg-4 col-md-6" id="div_surface" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Surface</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">m²</span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_nbre_piece">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Nombre de piéces</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="1">1 piéce</option>
                                                        <option value="2">2 piéces</option>
                                                        <option value="3">3 piéces</option>
                                                        <option value="4">4 piéces</option>
                                                        <option value="plus">Plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_type_offre">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Type d'offre</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="vente">Vente</option>
                                                        <option value="location">Location</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_meuble">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Meublé</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6" id="div_marque_ordinateur">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Marque d'ordinateur</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_modele_ordinateur">
                                           <div class="form-group">
                                                <label class="form-label">Model</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-md" placeholder="Entrer le titre de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_processeur">
                                           <div class="form-group">
                                                <label class="form-label">Processeur</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-md" placeholder="Entrer le titre de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_carte_graphique">
                                           <div class="form-group">
                                                <label class="form-label">Carte graphique</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-md" placeholder="Entrer le titre de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_ram_ordinateur" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Ram</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">Gb</span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_rom_ordinateur" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Capacité</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">Gb</span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6" id="div_marque_telephone">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Marque du téléphone</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_modele_telephone">
                                           <div class="form-group">
                                                <label class="form-label">Model</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" name="email" type="text" class="form-control form-control-md" placeholder="Entrer le titre de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_ram_telephone" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Ram</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">Gb</span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_rom_telephone" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Capacité</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">Gb</span>
                                                    </div>
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_couleur_telephone" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Couleur</label>
                                                <div class="form-control-wrap">
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_empreinte_telephone">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Empreinte</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_faceid_telephone">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Face ID</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6" id="div_type_offre_vehicule">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Type d'offre</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="vente">Vente</option>
                                                        <option value="location">Location</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_marque_vehicule" >
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Marque de Véhicules</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-search="on" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_model_vehicule" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Model</label>
                                                <div class="form-control-wrap">
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_annee" >
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Année</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="vehiculeSelecta" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_transmission" >
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Transmission</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-search="on" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="manuelle">Manuelle</option>
                                                        <option value="auto">Automatique</option>
                                                        <option value="sequentielle">Séquentielle</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_chauffeur">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Avec chauffeur</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_nbre_location_vehicule">
                                           <div class="form-group">
                                                <label class="form-label" for="default-05">Nombre de jours</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="prixa" placeholder="Prix de l'annonce">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_kilometre" >
                                           <div class="form-group">
                                                <label class="form-label" for="default-05">Kilométrage</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-text-hint">
                                                        <span class="overline-title">Km</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="kma" placeholder="Entrer le nombre de kilométre" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_hors_taxe" >
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Hors taxe</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_moteur" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Moteur</label>
                                                <div class="form-control-wrap">
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_energie">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Energie</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="essence">Essence</option>
                                                        <option value="diesel">Diesel</option>
                                                        <option value="hybride">Hybride</option>
                                                        <option value="electrique">Eléctrique</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_place">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Place assises</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="2">2 Places</option>
                                                        <option value="3">3 Places</option>
                                                        <option value="4">4 Places</option>
                                                        <option value="5">5 Places</option>
                                                        <option value="7">7 Places</option>
                                                        <option value="8">8 Places</option>
                                                        <option value="plus">Plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_visite_technique">
                                            <div class="form-group">
                                                <label class="form-label">Fin visite technique</label>
                                                <div class="form-control-wrap">
                                                    <input autocomplete="off" required type="text" placeholder="Saisir votre date de naissance" class="form-control date-picker" name="date_nais" data-date-format="yyyy-mm-dd">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_immatriculation" >
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Moteur</label>
                                                <div class="form-control-wrap">
                                                    <input type="tel" class="form-control" id="surfacea" placeholder="Entrer la dimension" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_interieur">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Intérieur</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="cuire">Cuire</option>
                                                        <option value="semi_cuire">Semi-cuire</option>
                                                        <option value="autre">Autre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_clim">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Clim d'origine</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_camera">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Caméra de recule</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_ecran">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Ecran a bord</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_capteur">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Capteur</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="avant">Avant</option>
                                                        <option value="arriere">Arriére</option>
                                                        <option value="les_deux">Avant/Arriére</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_volant">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Volant multi-fonction</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_palette">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Palettes au volant</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_demarage">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Démarrage Start</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="div_demarage">
                                            <div class="form-group">
                                                <label class="form-label" for="cp1-team-size">Démarrage Start</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" data-placeholder="selectionner">
                                                        <option value=""></option>
                                                        <option value="standard">Standard</option>
                                                        <option value="f_option">Full options</option>
                                                        <option value="sport">Sport</option>
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

<script src="{{asset('assets/js/app/js/annonce/new/location/download_image.js') }}"></script>


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

@endsection