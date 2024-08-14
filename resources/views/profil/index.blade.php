@extends('app')

@section('titre', 'Profil')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                {{-- <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">
                                            Informations Personnelles
                                        </h4>
                                        <div class="nk-block-des">
                                            <p>
                                                Informations de base, telles que votre nom et votre adresse ..., que vous utilisez sur la plateforme
                                            </p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start">
                                        <a class="btn btn-white btn-outline-warning btn-dim btn-sm mt-n1" data-bs-target="#profile-edit" data-bs-toggle="modal">
                                            <span>Mise à jour</span>
                                            <em class="icon ni ni-edit"></em>
                                        </a>
                                    </div>
                                </div> --}}
                                <div class="nk-block mt-3">
                                    <div class="example-alert">
                                        <div class="alert alert-warning alert-icon">
                                            <em class="icon ni ni-alert-circle"></em> 
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title fs-22px">
                                                    Vérification de l'identité
                                                </h5>
                                                <div class="nk-block-des">
                                                    <p>
                                                        Vous n'avez pas encore fini de configurer votre profil. Veuillez compléter les informations manquantes. 
                                                        <a style="text-decoration: underline;" href="#">
                                                            Cliquer ici
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="progress progress-lg">    
                                                <div class="progress-bar progress-bar-animated progress-bar-striped bg-success" data-progress="50">50%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block mt-n5" >
                                <div class="">
                                    <div class="card-inner">
                                        <div class="team">
                                            <div class="user-card user-card-s2">
                                                <div class="user-avatar lg bg-primary"> 
                                                    <span>
                                                        {{ ucfirst(substr(Auth::user()->name, 0, 1)).ucfirst(substr(Auth::user()->prenom, 0, 1)) }}
                                                    </span>
                                                    <div class="status dot dot-lg dot-success"></div>
                                                </div>
                                                <div class="user-info">
                                                    <h6>
                                                        {{Auth::user()->name}} 
                                                        {{Auth::user()->prenom}}
                                                    </h6> 
                                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                                    <a class="btn btn-white btn-outline-light btn-dim btn-sm mt-1" data-bs-target="#profile-edit" data-bs-toggle="modal">
                                                        <span>Mise à jour</span>
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block" >
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"> 
                                        <a class="nav-link active" data-bs-toggle="tab" href="#info">
                                            <em class="icon ni ni-user"></em>
                                            <span>Informations personnelles</span>
                                        </a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-bs-toggle="tab" href="#secu">
                                            <em class="icon ni ni-lock-alt"></em>
                                            <span>Sécurité</span>
                                        </a> 
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="info">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">
                                                    Informations
                                                </h6>
                                            </div>
                                            <div style="height: 430px;" data-simplebar>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Nom
                                                        </span>
                                                        <span class="data-value">
                                                            {{Auth::user()->name}}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Prénoms
                                                        </span>
                                                        <span class="data-value">
                                                            {{Auth::user()->prenom}}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Email
                                                        </span>
                                                        <span class="data-value">
                                                            {{Auth::user()->email}}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Contact
                                                        </span>
                                                        <span class="data-value text-soft">
                                                            {{Auth::user()->phone}}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Adresse
                                                        </span>
                                                        <span class="data-value">
                                                            
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Date de création
                                                        </span>
                                                        <span class="data-value">
                                                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Date de création
                                                        </span>
                                                        <span class="data-value">
                                                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="secu">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">
                                                    Sécurité
                                                </h6>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <div class="nk-block-text data-label">
                                                        <h6>
                                                            Changer le mot de passe
                                                        </h6>
                                                        <p>
                                                            Définissez un mot de passe unique pour protéger votre compte.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-actions flex-shrink-sm-0">
                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                        <li class="order-md-last">
                                                            <a 
                                                                @if($desac === 'oui')
                                                                    data-bs-target="#mdp_update" data-bs-toggle="modal"
                                                                @else
                                                                    data-bs-target="#Alert_date_mdp" data-bs-toggle="modal"
                                                                @endif

                                                             class="btn btn-primary">
                                                                Changer le mot de passe
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <em class="text-soft text-date fs-12px">
                                                                Dérnière mise à jour: 
                                                                <span>
                                                                    {{ \Carbon\Carbon::parse(Auth::user()->date_mdp)->translatedFormat('j F Y '.' à '.' H:i:s') }}
                                                                </span>
                                                            </em>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <div class="nk-block-text data-label">
                                                        <h6>
                                                            Sauvegarder mes journaux d'activité
                                                        </h6>
                                                        <p>
                                                            Vous pouvez sauvegarder tous vos journaux d'activité, y compris les activités inhabituelles détectées.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-actions data-col data-col-end">
                                                    <ul class="align-center gx-3">
                                                        <li class="order-md-last">
                                                            <div class="custom-control custom-switch me-n2">
                                                                <input checked="" class="custom-control-input" id="activity-log2" type="checkbox">
                                                                <label class="custom-control-label" for="activity-log2">
                                                                </label>
                                                                </input>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <div class="nk-block-text data-label">
                                                        <h6 class="d-flex" >
                                                            Authentification à deux facteurs
                                                        </h6>
                                                        <p>
                                                            Sécurisez votre compte avec la sécurité 2FA. Lorsque celle-ci est activée, vous devrez entrer non seulement votre mot de passe, mais également un code spécial via une application. Vous pouvez recevoir ce code via une application mobile.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-actions data-col data-col-end">
                                                    <a class="btn btn-outline-light">
                                                        <span>Bientôt Disponible</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profile-edit" role="dialog" style="z-index: 1;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">
                    Mise à jour du Profil
                </h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal">
                            Personnelle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#address">
                            Adresse
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nom
                                    </label>
                                    <input class="form-control form-control-lg" id="full-name" placeholder="Enter Full name" type="text" value="Abu Bin Ishtiyak" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">
                                        Prénoms
                                    </label>
                                    <input class="form-control form-control-lg" id="display-name" placeholder="Enter display name" type="text" value="Ishtiyak" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no">
                                        Contact
                                    </label>
                                    <input class="form-control form-control-lg" id="phone-no" placeholder="Phone Number" type="text" value="+880" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="birth-day">
                                        Date de naissance
                                    </label>
                                    <input class="form-control form-control-lg date-picker" id="birth-day" placeholder="Enter your birth date" type="text" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-switch">
                                    <input class="custom-control-input" id="latest-sale" type="checkbox">
                                    <label class="custom-control-label" for="latest-sale">
                                        Use full name to display
                                    </label>
                                    </input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="address">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-l1">
                                        Address Line 1
                                    </label>
                                    <input class="form-control form-control-lg" id="address-l1" type="text" value="2337 Kildeer Drive" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-l2">
                                        Address Line 2
                                    </label>
                                    <input class="form-control form-control-lg" id="address-l2" type="text" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-st">
                                        State
                                    </label>
                                    <input class="form-control form-control-lg" id="address-st" type="text" value="Kentucky" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-county">
                                        Country
                                    </label>
                                    <select class="form-select js-select2" data-ui="lg" id="address-county">
                                        <option>
                                            Canada
                                        </option>
                                        <option>
                                            United State
                                        </option>
                                        <option>
                                            United Kindom
                                        </option>
                                        <option>
                                            Australia
                                        </option>
                                        <option>
                                            India
                                        </option>
                                        <option>
                                            Bangladesh
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-gs align-items-center justify-content-center mt-3">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success btn-block">
                            <span>Enregistrer</span>
                            <em class="icon ni ni-arrow-right-circle"></em>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdp_update" role="dialog" style="z-index: 1;">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <a class="close" data-bs-dismiss="modal" href="#">
                <em class="icon ni ni-cross-sm">
                </em>
            </a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">
                    Mise à jour du mot de passe
                </h5>
                <ul class="nk-nav nav nav-tabs" style="display: none;">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#mdp">
                            Mot de passe
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="mdp">
                        <form class="row gy-4" action="{{route('trait_password_profil')}}" method="post" id="registre_password_profil">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Nouveau mot de passe
                                    </label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input required type="password" name="password" class="form-control form-control-md" id="password" placeholder="Entrer le nouveau mot de passe" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">
                                        Confirmer le mot de passe
                                    </label>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="cpassword">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input required type="password" name="cpassword" class="form-control form-control-md" id="cpassword" placeholder="Confirmer le nouveau Mot de passe" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success">
                                    <span>Enregistrer</span>
                                    <em class="icon ni ni-arrow-right-circle"></em>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="Alert_date_mdp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal"><em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                    <h4 class="nk-modal-title">Désolé!</h4>
                    <div class="nk-modal-text">
                        <p class="lead">
                            La modification de votre mot de passe est temporairement indisponible. Vous devez attendre 60 jours à compter de la dernière mise à jour avant de pouvoir le modifier à nouveau.
                        </p>
                    </div>
                    <div class="nk-modal-action mt-5"><a href="#" class="btn btn-lg btn-mw btn-light" data-bs-dismiss="modal">Fermer</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/app/js/form_password_reset_profil.js') }}"></script>

@endsection


