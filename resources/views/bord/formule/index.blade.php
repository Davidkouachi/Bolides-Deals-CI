@extends('app')

@section('titre', 'Formules')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Formules
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row g-gs align-items-center justify-content-center">
                    <!-- Formule Basique -->
                    <div class="col-12" >
                        <div class="alert alert-warning alert-dismissible fade show rounded-6" role="alert">
                            <ul>
                                <li>
                                    <p class="small mb-0 fs-14px">
                                        <strong>NB : </strong> ces élements ci-dessous s'applique uniquement aux <strong>annonces de type vente</strong>
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="small mb-0 fs-14px">
                                        - Durée de vie d'une annonce
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="small mb-0 fs-14px">
                                        - Suppression ou Désactivation de l'annonce
                                    </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="small mb-0 fs-14px">
                                        - Renouvelement d'une annonce
                                    </p>
                                </li>
                            </ul>
                            {{-- <div class="d-inline-flex position-absolute end-0 top-50 translate-middle-y me-2">
                                <button type="button" class="btn btn-xs btn-icon btn-warning rounded-pill" data-bs-dismiss="alert">
                                    <em class="icon ni ni-cross"></em>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Formule Basique -->
                    <div class="col-sm-6 col-lg-6 col-xxl-4">
                        <div class="card trans_shado pricing recommend alert alert-pro alert-info bg-primary-dim" style="padding-left: 15%;">
                            <div class="p-4">
                                <div class="pricing-title">
                                    <h4 class="card-title title text-info">
                                        Basique
                                    </h4>
                                </div>
                                <div class="pricing-price">
                                    <h5 class="display-8">Gratuit <span class="caption-text text-base fw-normal">/ mois</span></h5>
                                </div>
                            </div>
                            <div class="p-4">
                                <ul class="pricing-features">
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>6 photo(s) / Annonce </span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Durée de vie des annonces: 14 jours</span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Renouvelement d'une annonce: 2 fois </span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Visibilité améliorée avec badge</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Annonce placer en tête de liste</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Mise en avant sur la page d'accueil</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Analyse statistique des annonces</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Support client par email ou Chat</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 mb-4 text-center">
                                {{-- <button class="btn btn-outline-success btn-block">Souscrire</button> --}}
                                {{-- <span class="badge badge-md bg-secondary">Actuel</span> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Formule Standard -->
                    <div class="col-sm-6 col-lg-6 col-xxl-4">
                        <div class="card trans_shado pricing recommend alert alert-pro alert-success bg-success-dim" style="padding-left: 15%;">
                            {{-- <span class="pricing-badge badge bg-success">
                                Recommandé
                            </span> --}}
                            <div class="p-4">
                                <div class="pricing-title">
                                    <h4 class="card-title title text-success">
                                        Standard
                                    </h4>
                                </div>
                                <div class="pricing-price">
                                    <h5 class="display-8">
                                        <span>10.000</span> Fcfa 
                                        <span class="caption-text text-base fw-normal">/ mois</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="p-4">
                                <ul class="pricing-features">
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>08 photo(s) / Annonce </span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Durée de vie des annonces: 20 jours</span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Renouvelement d'une annonce: 3 fois </span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Visibilité améliorée avec badge </span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Annonce placer en tête de liste 12h</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Mise en avant sur la page d'accueil</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Analyse statistique des annonces</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Support client par email ou Chat</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 mb-4">
                                {{-- <button class="btn btn-outline-success btn-block">Souscrire</button> --}}
                                {{-- <span class="badge badge-md bg-secondary">Actuel</span> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Formule Pro -->
                    <div class="col-sm-6 col-lg-6 col-xxl-4">
                        <div class="card trans_shado pricing recommend alert alert-pro alert-danger bg-danger-dim" style="padding-left: 15%;">
                            {{-- <span class="pricing-badge badge bg-success">
                                Recommandé
                            </span> --}}
                            <div class="p-4">
                                <div class="pricing-title">
                                    <h4 class="card-title title text-danger">
                                        Pro
                                    </h4>
                                </div>
                                <div class="pricing-price">
                                    <h5 class="display-8">
                                        <span>20.000</span> Fcfa 
                                        <span class="caption-text text-base fw-normal">/ mois</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="p-4">
                                <ul class="pricing-features">
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>10 photo(s) / Annonce </span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Durée de vie des annonces: 25 jours</span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Renouvelement d'une annonce: 4 fois </span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Visibilité améliorée avec badge </span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Annonce placer en tête de liste 24h</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Mise en avant sur la page d'accueil</span>
                                    </li>
                                    <li>
                                        <em class="icon text-danger ni ni-cross-circle"></em>
                                        <span>Analyse statistique des annonces</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Support client par email ou Chat</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 mb-4">
                                {{-- <button class="btn btn-outline-success btn-block">Souscrire</button> --}}
                                {{-- <span class="badge badge-md bg-secondary">Actuel</span> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Formule Premium -->
                    <div class="col-sm-6 col-lg-6 col-xxl-4">
                        <div class="card trans_shado pricing recommend alert alert-pro alert-warning bg-warning-dim" style="padding-left: 15%;">
                            <div class="p-4">
                                <div class="pricing-title">
                                    <h4 class="card-title title text-warning">
                                        Premium
                                    </h4>
                                </div>
                                <div class="pricing-price">
                                    <h5 class="display-8">35.000 Fcfa <span class="caption-text text-base fw-normal">/ mois</span></h5>
                                </div>
                            </div>
                            <div class="p-4">
                                <ul class="pricing-features">
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>12 photo(s) / Annonce </span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Durée de vie des annonces: 30 jours</span>
                                    </li>
                                    <li>
                                        <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                        <span>Renouvelement d'une annonce: 5 fois </span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Visibilité améliorée avec badge</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Annonce placer en tête de liste 72h</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Mise en avant sur la page d'accueil</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Analyse statistique des annonces</span>
                                    </li>
                                    <li>
                                        <em class="icon text-success ni ni-check-circle-fill"></em>
                                        <span>Support client par email ou Chat</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 mb-4">
                                {{-- <button class="btn btn-outline-success btn-block">Souscrire</button> --}}
                                {{-- <span class="badge badge-md bg-secondary">Actuel</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
