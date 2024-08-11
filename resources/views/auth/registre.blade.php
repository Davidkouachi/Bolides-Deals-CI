<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from dashlite.net/demo9/pages/auths/auth-register-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Jun 2023 21:49:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link href="{{asset('images/logo/icon/logo.ico')}}" rel="shortcut icon">
    <title>Registre | BOLIDES DEALS CI</title>
    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">
</head>

<body class="nk-body ui-rounder npc-general ui-light pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs" style="margin-top: -20px;">
                        <div class="brand-logo text-center">
                            <a href="#" class="logo-link">
                                <img height="200px" width="200px" src="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="card" style="margin-top: -30px;">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Inscription</h4>
                                        <div class="nk-block-des">
                                            <p>Créer un nouveau compte sur BOLIDES DEALS CI</p>
                                        </div>
                                    </div>
                                </div>
                                <form id="registre_sinscrire" class="row g-gs" action="{{route('trait_registre')}}" method="post">
                                    @csrf
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Nom</label>
                                            <div class="form-control-wrap">
                                                <input required name="nom" type="Nom" class="form-control form-control-md" id="nom" placeholder="Entrer votre Nom" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="{{old('nom')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Prénoms</label>
                                            <div class="form-control-wrap">
                                                <input required name="prenom" type="text" class="form-control form-control-md" id="prenom" placeholder="Entrer votre prénoms" oninput="this.value = this.value.toUpperCase()" autocomplete="off" value="{{old('prenom')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Contact</label>
                                            <div class="form-control-wrap">
                                                <input required name="phone" type="text" class="form-control form-control-md" id="phone" placeholder="Entrer votre contact" autocomplete="off" value="{{old('phone')}}">
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
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <div class="form-control-wrap">
                                                <input required name="email" type="email" class="form-control form-control-md" id="email" placeholder="Entrer votre Email" autocomplete="off" value="{{old('email')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input required type="password" name="password" class="form-control form-control-md" id="password" placeholder="Entrer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Confirmer le mot de passe</label>
                                            <div class="form-control-wrap">
                                                <a href="#" class="form-icon form-icon-right passcode-switch md" data-target="cpassword">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input required type="password" name="cpassword" class="form-control form-control-md" id="cpassword" placeholder="Confirmer votre Mot de passe" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="form-group row g-gs">
                                            <div class="col-lg-6 text-center">
                                                <a href="javascript:void(0);" onclick="history.back()" class="btn btn-md btn-white btn-dim btn-outline-danger btn-block">
                                                    <em class="icon ni ni-arrow-left-circle"></em>
                                                    <span>Accueil</span>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success btn-block" >
                                                    <span>Connexion</span>
                                                    <em class="icon ni ni-arrow-right-circle"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> 
                                    Vous avez déjà un Compte ? 
                                    <a href="{{route('index_login')}}"><strong>Se Connecter</strong>
                                    </a>
                                </div>
                                {{-- <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-8">
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
                                        <p class="text-soft">&copy; 2023 CryptoLite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bundle55a0.js')}}"></script>
    <script src="{{asset('assets/js/scripts55a0.js')}}"></script>
    <script src="{{asset('assets/js/demo-settings55a0.js')}}"></script>
    <script src="{{asset('assets/js/example-toastr55a0.js') }}"></script>
    <script src="{{asset('assets/js/app/js/registre_sinscrire.js') }}"></script>
    <script src="{{asset('assets/js/app/js/ctrlv_ctrlc_register.js') }}"></script>

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