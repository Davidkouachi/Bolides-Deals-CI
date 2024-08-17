<!DOCTYPE html>
<html lang="zxx" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>Login | BOLIDES DEALS CI</title>
    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">
</head>

<body class="nk-body ui-rounder npc-general ui-light pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs" style="margin-top: 0px;">
                        <div class="brand-logo text-center">
                            <a href="#" class="logo-link">
                                <img height="150px" width="150px" src="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="card" >
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Se connecter</h4>
                                        {{-- <div class="nk-block-des">
                                            <p></p>
                                        </div> --}}
                                    </div>
                                </div>
                                <form id="registre_connexion" class="" action="{{route('trait_login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Email ou Téléphone</label>
                                        <div class="form-control-wrap">
                                            <input name="login" type="text" class="form-control form-control-md" id="login" placeholder="Entrer votre Email ou Téléphone" value="{{ old('login') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <a class="link link-primary link-sm" href="{{route('index_password')}}">Mot de passe oublié ?</a>
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
                                        <div class="col-6">
                                            <a href="javascript:void(0);" onclick="history.back()" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                                <em class="icon ni ni-arrow-left-circle"></em>
                                                <span>Retour</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                                <span>Connexion</span>
                                                <em class="icon ni ni-arrow-right-circle"></em>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> 
                                    Vous n'avez pas de compte ? 
                                    <a href="{{route('index_registre')}}">Créer un Compte</a>
                                </div>
                                {{-- <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item"><a class="nav-link" href="#">Terms & Condition</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2023 Dashlite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="Compte_lock">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-lock bg-danger">
                        </em>
                        <h4 class="nk-modal-title">Compte Bloqué!</h4>
                        <div class="nk-modal-text">
                            <p class="lead">
                                {{session('user_locked')}}
                            </p>
                        </div>
                        <div class="nk-modal-action mt-5">
                            <a onclick="window.location.reload();" class="btn btn-lg btn-mw btn-light" data-bs-dismiss="modal">ok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('user_locked'))
        <script type="text/javascript">
            window.onload = function() {
                $('#Compte_lock').modal('show');
            }
        </script>
        {{ session()->forget('user_locked') }}
    @endif

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>
    <script src="{{asset('assets/js/app/js/registre_connexion.js') }}"></script>
    <script src="{{asset('assets/js/app/js/ctrlv_ctrlc_login.js') }}"></script>

    @if (session('success'))
        <script>
            NioApp.Toast("<h5>Succès</h5><p>{{ session('success') }}.</p>", "success", {position: "top-center"});
        </script>
        {{ session()->forget('success') }}
    @endif
    @if (session('error'))
        <script>
            NioApp.Toast("<h5>Erreur</h5><p>{{ session('error') }}.</p>", "error", {position: "top-center"});
        </script>
        {{ session()->forget('error') }}
    @endif
    @if (session('warning'))
        <script>
            NioApp.Toast("<h5>Alert</h5><p>{{ session('warning') }}.</p>", "warning", {position: "top-center"});
        </script>
        {{ session()->forget('warning') }}
    @endif
    @if (session('info'))
        <script>
            NioApp.Toast("<h5>Information</h5><p>{{ session('info') }}.</p>", "info", {position: "top-center"});
        </script>
        {{ session()->forget('info') }}
    @endif

</html>