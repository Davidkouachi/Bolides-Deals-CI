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
        @yield('titre') | BOLIDES DEALS CI
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

<body class="nk-body ui-rounder has-sidebar ui-light" >
    <div class="nk-app-root">
        <div class="nk-main ">

            @if(request()->routeIs('index_accueil_bord','index_bord_marque','index_bord_role','index_bord_user','index_bord_sugg') )
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
                                    <a class="nk-menu-link" href="{{route('index_accueil_bord')}}">
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
                                    <a class="nk-menu-link" href="{{route('index_bord_user')}}">
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
                                    <a class="nk-menu-link" href="{{route('index_bord_role')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-focus">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Rôles
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
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{route('index_bord_sugg')}}">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-contact">
                                            </em>
                                        </span>
                                        <span class="nk-menu-text">
                                            Suggestions
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

                            @if(request()->routeIs('index_accueil_bord','index_bord_marque','index_bord_role','index_bord_user','index_bord_sugg') )
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
                                    @auth()
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info">
                                                <em class="icon ni ni-plus-circle"></em>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Nouvelle annonce</span>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <a class="nk-notification-item dropdown-inner" href="{{route('index_vente')}}">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-truck"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                Vente de véhicule
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="nk-notification">
                                                    <a class="nk-notification-item dropdown-inner" href="{{route('index_location')}}">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-truck"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                Location de véhicule
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
                                    @endauth
                                    <li class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm bg-primary">
                                                    <em class="icon ni ni-user-alt">
                                                    </em>
                                                    @auth
                                                    <div class="status dot dot-lg dot-success"></div>
                                                    @endauth
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            @if(Auth::user())
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="{{route('index_profil')}}">
                                                            <em class="icon ni ni-user-alt">
                                                            </em>
                                                            <span>
                                                                Voir profil
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-view-list-fill">
                                                            </em>
                                                            <span>
                                                                Mes annonces
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @if(session('role')->nom === 'ADMINISTRATEUR')
                                                    <li>
                                                        <a href="{{route('index_accueil_bord')}}">
                                                            <em class="icon ni ni-setting">
                                                            </em>
                                                            <span>
                                                                Configuration
                                                            </span>
                                                        </a>
                                                    </li>
                                                    @endif
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
                                                        <a href="{{route('index_registre')}}">
                                                            <em class="icon ni ni-user-add">
                                                            </em>
                                                            <span>
                                                                S'incrire
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('index_login')}}">
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
                                        1- N'envoyer pas de paiement sans avoir vérifié le véhicule ou l'identité du vendeur, 2- Rencontrer de préference le vendeur dans un lieu public fréquenté ou dans un parc automobile, 3- Etre accompagner de son mecanicien, pour des vérifications approfondie du véhicule.
                                    </span>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!request()->routeIs('message_lock') )  
    {{-- <ul class="nk-sticky-toolbar">
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
    </ul> --}}
    @endif

    <a style="z-index: 1;" class="pmo-st pmo-dark active bg-success" data-bs-toggle="modal" data-bs-target="#modalCommentaire" >
        <div class="pmo-st-img">
            <em class="icon ni ni-chat" style="font-size: 25px;"></em>
        </div>
    </a>

    <div class="modal fade" tabindex="-1" id="modalCommentaire">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouvelle suggestion</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('trait_sugg')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Nom</label>
                            <div class="form-control-wrap">
                                @if(Auth::user())
                                    <input class="form-control" name="nom" readonly type="text" placeholder="Entrer votre nom" value="{{Auth::user()->name}}" />
                                @else
                                    <input required name="nom" class="form-control" type="text" placeholder="Entrer votre nom"/>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Email</label>
                            <div class="form-control-wrap">
                                @if(Auth::user())
                                    <input class="form-control" readonly type="email" placeholder="Entrer votre email" name="email" value="{{Auth::user()->email}}"/>
                                @else
                                    <input required class="form-control" type="email" placeholder="Entrer votre email" name="email"/>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-textarea">Suggestion</label>
                            <div class="form-control-wrap">
                                <textarea name="message" class="form-control no-resize" id="default-textarea" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="customFileLabel">Fichier (facultatif)</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" name="file_pdf" class="form-file-input" id="customFile">
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

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/charts/gd-campaign55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>

    <script src="{{asset('assets/js/app/js/form_load.js') }}"></script>

    @if (session('success'))
        <script>
            NioApp.Toast("<h5>Succès</h5><p>{{ session('success') }}.</p>", "success", {position: "top-center"});
        </script>
        @php session()->forget('success'); @endphp
    @endif
    @if (session('error'))
        <script>
            NioApp.Toast("<h5>Erreur</h5><p>{{ session('error') }}.</p>", "error", {position: "top-center"});
        </script>
        @php session()->forget('error'); @endphp
    @endif
    @if (session('warning'))
        <script>
            NioApp.Toast("<h5>Alert</h5><p>{{ session('warning') }}.</p>", "warning", {position: "top-center"});
        </script>
        @php session()->forget('warning'); @endphp
    @endif
    @if (session('info'))
        <script>
            NioApp.Toast("<h5>Information</h5><p>{{ session('info') }}.</p>", "info", {position: "top-center"});
        </script>
        @php session()->forget('info'); @endphp
    @endif

</body>

</html>