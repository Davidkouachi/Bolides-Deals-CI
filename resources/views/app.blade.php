<!DOCTYPE html>
<html class="js" lang="zxx">
    <meta content="text/html;charset=utf-8" http-equiv="content-type"/>
    <head>
    <meta charset="utf-8">
    <meta content="Softnio" name="author">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." name="description">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>
        @yield('titre')
    </title>
    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">
    </link>
    </link>
    </link>
    </meta>
    </meta>
    </meta>
    </meta>
</head>

<body class="nk-body ui-rounder has-sidebar ui-light ">
    <div class="nk-app-root">
        <div class="nk-main ">

            @if(request()->routeIs('index_accueil_bord','index_bord_marque') )
            <div class="nk-sidebar is-light nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a class="logo-link nk-sidebar-logo" href="">
                            <img height="50" width="50" src="{{asset('images/logo/logo.png')}}" /></img>
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                            <em class="icon ni ni-arrow-left"></em>
                        </a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar="">
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="#">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-trend-up">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Tableau de Bord
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="#">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-list">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Utilisateurs
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_marque')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-layout-fill">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Marques de Véhicules
                                        </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="#">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-building">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Parcs Automobiles
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="nk-wrap ">
                <div class="nk-header is-light nk-header-fixed is-light">
                    <div class="container-xl wide-xl">
                        <div class="nk-header-wrap">

                            @if(request()->routeIs('index_accueil_bord') )
                            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                                <a class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu" href="#">
                                    <em class="icon ni ni-menu">
                                    </em>
                                </a>
                            </div>
                            @endif
                            

                            <div class="nk-header-brand ">
                                <a class="logo-link" href="">
                                    <img height="50" width="50" src="{{asset('images/logo/logo.png')}}" /></img>
                                </a>
                            </div>                           
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown notification-dropdown">
                                        <a class=" nk-quick-nav-icon" href="{{route('index_accueil')}}">
                                            <em class="icon ni ni-home"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li>
                                    <li class="dropdown notification-dropdown">
                                        <a class=" nk-quick-nav-icon" href="{{route('index_annonce')}}">
                                            <em class="icon ni ni-box-view-fill"></em>
                                            <span class="fs-15px"></span>
                                        </a>
                                    </li>
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info">
                                                <em class="icon ni ni-server"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Parc Automobiles</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <a class="nk-notification-item dropdown-inner" href="">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-table-view-fill"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                1
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown notification-dropdown"><a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info">
                                                <em class="icon ni ni-bell"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-bell"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                Nouveau véhicule
                                                            </div>
                                                            <div class="nk-notification-time">il y a 5 min</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center">
                                                <a href="#">Voir plus</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt">
                                                    </em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            @if(Auth::user())
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-user-alt">
                                                            </em>
                                                            <span>
                                                                Voir profil
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-plus-circle">
                                                            </em>
                                                            <span>
                                                                Parc Auto
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('index_accueil_bord')}}">
                                                            <em class="icon ni ni-setting">
                                                            </em>
                                                            <span>
                                                                Configuration
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="{{route('deconnexion')}}">
                                                            <em class="icon ni ni-signout">
                                                            </em>
                                                            <span>
                                                                Se Déconnecter
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @else
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalSinscrire">
                                                            <em class="icon ni ni-user-add">
                                                            </em>
                                                            <span>
                                                                S'incrire
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalConnexion">
                                                            <em class="icon ni ni-lock">
                                                            </em>
                                                            <span>
                                                                Se connecter
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                <div class="nk-footer">
                    <div class="container-xl wide-xl">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">
                                <span class="w-20" >
                                    ©<script>
                                    document.write(new Date().getFullYear())
                                    </script> Bolides Deals.
                                </span>
                                <marquee  behavior="" direction="">
                                    <span class="text-danger" >
                                        Conseils de sécurité :
                                    </span>
                                    <span class="" >
                                        1- N'envoyer pas de paiement sans avoir vérifié la produit ou l'identité du vendeur, 2- N'utilisez pas de myens de transfert d'argent, de virement bancaire ou tout autre moyen pour envoyer de l'argent au vendeur, 3- Rencontrer de préference le vendeur dans un lieu public fréquenté.
                                    </span>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <ul class="nk-sticky-toolbar">
        @yield('btn_lateral')
        <li class="demo-thumb bg-white">
            <a class="tipinfo" href="" title="Nouvelle Annonce">
                <em class="icon ni ni-plus-circle"></em>
            </a>
        </li>
        <li class="demo-purchase bg-white">
            <a class="tipinfo" href="" title="Actualiser" onclick="window.location.reload();">
                <em class="icon ni ni-redo"></em>
            </a>
        </li>
    </ul>

    <a class="pmo-st pmo-dark active bg-success" data-bs-toggle="modal" data-bs-target="#modalCommentaire" >
        <div class="pmo-st-img">
            <em class="icon ni ni-chat" style="font-size: 25px;"></em>
        </div>
    </a>
    

    <div class="modal fade" tabindex="-1" id="modalCommentaire">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle suggestion</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="#" class="form-validate">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Suggestion</label>
                            <div class="form-control-wrap">
                                <textarea name="text" class="form-control no-resize" id="default-textarea" required data-msg="Error message re"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customFileLabel">Fichier (facultatif)</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="customFile">
                                    <label class="form-file-label" for="customFile">Choisir un fichier</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-white btn-dim btn-md btn-outline-success">
                                <span>Envoyer</span>
                                <em class="icon ni ni-send" ></em>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">Suggestion</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConnexion" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body bg-white rounded">
                    <div class="nk-block-head">
                        <div class="brand-logo pb-4 text-center">
                            <a class="logo-link">
                                <img height="200px" width="auto" class="logo-dark logo-img logo-img-lg" src="{{asset('images/logo/logo.png')}}" srcset="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Se connecter</h4>
                        </div>
                    </div>
                    <form id="registre_connexion" class="" action="{{route('trait_login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div class="form-control-wrap">
                                <input name="email" type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Mot de passe</label>
                                <a class="link link-primary link-sm" href="#">Mot de passe oublié ?</a>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" name="password" class="form-control form-control-md" id="password" placeholder="Entrer votre Mot de passe">
                            </div>
                        </div>
                        <div class="form-group row g-gs">
                            <div class="col-lg-6">
                                <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                    <em class="icon ni ni-cross-circle"></em>
                                    <span>Fermer</span>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                    <span>Connexion</span>
                                    <em class="icon ni ni-arrow-right-circle"></em>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        Vous n'avez pas de compte ?
                        <a class="" href="">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConnexion" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body bg-white rounded">
                    <div class="nk-block-head">
                        <div class="brand-logo pb-4 text-center">
                            <a class="logo-link">
                                <img class="logo-dark logo-img logo-img-lg" src="{{asset('images/logo/logo.png')}}" srcset="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Se connecter</h4>
                            <!-- <div class="nk-block-des">
                                    <p>Create New Dashlite Account</p>
                            </div> -->
                        </div>
                    </div>
                    <form id="registre_connexion" class="" action="/auth_login" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <div class="form-control-wrap">
                                <input name="email" type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Mot de passe</label>
                                <a class="link link-primary link-sm" href="#">Mot de passe oublié ?</a>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-md" id="password" placeholder="Entrer votre Mot de passe">
                            </div>
                        </div>
                        <div class="form-group row g-gs">
                            <div class="col-lg-6">
                                <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                    <em class="icon ni ni-cross-circle"></em>
                                    <span>Fermer</span>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                    <span>Connexion</span>
                                    <em class="icon ni ni-arrow-right-circle"></em>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        Vous n'avez pas de compte ?
                        <a class="" href="">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/charts/gd-campaign55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>

    <script src="{{asset('assets/js/app/js/form_load.js') }}"></script>
    <script src="{{asset('assets/js/app/js/registre_connexion.js') }}"></script>
    <script src="{{asset('assets/js/app/js/registre_sinscrire.js') }}"></script>

    @if (session('success'))
        <script>
            NioApp.Toast("<h5>Succès</h5><p>{{ session('success') }}.</p>", "success", {position: "top-right"});
        </script>
        {{ session()->forget('success') }}
    @endif
    @if (session('error'))
        <script>
            NioApp.Toast("<h5>Erreur</h5><p>{{ session('error') }}.</p>", "error", {position: "top-right"});
        </script>
        {{ session()->forget('error') }}
    @endif
    @if (session('warning'))
        <script>
            NioApp.Toast("<h5>Alert</h5><p>{{ session('warning') }}.</p>", "warning", {position: "top-right"});
        </script>
        {{ session()->forget('warning') }}
    @endif
    @if (session('info'))
        <script>
            NioApp.Toast("<h5>Information</h5><p>{{ session('info') }}.</p>", "info", {position: "top-right"});
        </script>
        {{ session()->forget('info') }}
    @endif

</body>

</html>