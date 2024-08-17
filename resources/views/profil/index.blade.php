@extends('app')

@section('titre', 'Profil')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg pt-3">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block mt-3" hidden>
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
                                                @if(Auth::user()->image_nom)
                                                <div class="user-avatar xl sq " style="background: transparent;"> 
                                                    <span class="tb-product">
                                                            <img height="110px" width="110px" style="object-fit: cover;" class="thumb" src="{{asset('storage/images/'.Auth::user()->image_nom)}}">
                                                        </span>
                                                    <div class="status dot dot-lg dot-success"></div>
                                                </div>
                                                @else
                                                <div class="user-avatar xl sq bg-primary"> 
                                                    <span>
                                                        {{ ucfirst(substr(Auth::user()->name, 0, 1)).ucfirst(substr(Auth::user()->prenom, 0, 1)) }}
                                                    </span>
                                                    <div class="status dot dot-lg dot-success"></div>
                                                </div>
                                                @endif
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
                                                    @if(Auth::user()->image_nom)
                                                    <br>
                                                    <a class="btn btn-white btn-outline-danger btn-dim btn-sm mt-1" href="{{route('delete_photo', Auth::user()->id)}}">
                                                        <span>Supprimer la photo de profil</span>
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block" >
                                <ul class="nav nav-tabs nav-tabs-s2">
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
                                            <div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Nom
                                                        </span>
                                                        <span class="data-value">
                                                            {{Auth::user()->name}}
                                                        </span>
                                                    </div>
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
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
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
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
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Contact
                                                        </span>
                                                        <span class="data-value text-soft">
                                                            +225 {{Auth::user()->phone}}
                                                        </span>
                                                    </div>
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">
                                                            Adresse
                                                        </span>
                                                        <span class="data-value">
                                                            {{Auth::user()->adresse}}
                                                        </span>
                                                    </div>
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
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
                                                    {{-- <div class="data-col data-col-end">
                                                        <span class="data-more disable">
                                                            <em class="icon ni ni-lock-alt">
                                                            </em>
                                                        </span>
                                                    </div> --}}
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
                                                    <a class="btn btn-outline-light">
                                                        <span>Bientôt Disponible</span>
                                                    </a>
                                                </div>
                                                {{-- <div class="nk-block-actions data-col data-col-end">
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
                                                </div> --}}
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

<div class="modal fade" id="profile-edit" role="dialog">
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
                            Informations personnelles
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form class="row gy-4" action="{{route('profil_update')}}" method="post" id="form_update" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 h-50">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <label class="form-label">Photo de Profil</label>
                                            @if(Auth::user()->image_nom)
                                                <div class="user-avatar xl sq " style="background: transparent;"> 
                                                    <span class="tb-product">
                                                        <img height="110px" width="110px" style="object-fit: cover;" class="thumb" src="{{asset('storage/images/'.Auth::user()->image_nom)}}" id="imagePreview">
                                                    </span>
                                                </div>
                                            @else
                                                <div class="user-avatar xl sq bg-light"> 
                                                    <span>
                                                        <img height="110px" width="110px" id="imagePreview" style="object-fit: cover;" class="thumb" >
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="user-info">
                                                <input name="image" type="file" id="imageInput" style="width:120px;" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <div class="form-control-wrap">
                                        <input required name="nom" type="Nom" class="form-control form-control-md" id="nom" placeholder="Entrer votre Nom" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Prénoms</label>
                                    <div class="form-control-wrap">
                                        <input required name="prenom" type="text" class="form-control form-control-md" id="prenom" placeholder="Entrer votre prénoms" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="{{Auth::user()->prenom}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Contact</label>
                                    <div class="form-control-wrap">
                                        <input required name="phone" type="text" class="form-control form-control-md" id="phone" placeholder="Entrer votre contact" autocomplete="off" value="{{Auth::user()->phone}}">
                                        <script>
                                            var inputElement = document.getElementById('phone');
                                            inputElement.addEventListener('input', function() {
                                                // Supprimer tout sauf les chiffres
                                                this.value = this.value.replace(/[^0-9]/g, '');
                                                // Limiter la longueur à 10 caractères
                                                if (this.value.length > 10) {
                                                    this.value = this.value.slice(0, 10);
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <div class="form-control-wrap">
                                        <input required name="email" type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email" autocomplete="off" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Adresse</label>
                                    <div class="form-control-wrap">
                                        <input required name="adresse" type="text" class="form-control form-control-md" id="adresse" placeholder="Entrer votre Adresse" autocomplete="off" value="{{Auth::user()->adresse}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-warning">
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

<div class="modal fade" id="mdp_update" role="dialog">
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

<script src="{{asset('assets/js/app/js/form_update_profil.js') }}"></script>
<script src="{{asset('assets/js/app/js/form_update_profil_photo.js') }}"></script>
<script src="{{asset('assets/js/app/js/form_password_reset_profil.js') }}"></script>

@endsection


