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
    <title>Réinitialisation | BOLIDES DEALS CI</title>
    <link href="{{asset('assets/css/dashlite55a0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme55a0.css')}}" id="skin-default" rel="stylesheet">
</head>

<body class="nk-body ui-rounder npc-general ui-light pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs" style="margin-top: 0px;">
                        <div class="brand-logo text-center">
                            <a href="#" class="logo-link">
                                <img height="150px" width="150px" src="{{asset('images/logo/logo.png')}}">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Réinitialisation</h4>
                                    </div>
                                </div>
                                <form id="registre_password_new" class="row g-gs" action="{{route('trait_new_password')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="col-12" >
                                        <div class="form-group">
                                            <label class="form-label" for="password">Nouveau mot de passe</label>
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
                                            <label class="form-label" for="password">Confirmer le nouveau mot de passe</label>
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
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn btn-md btn-white btn-dim btn-outline-success" >
                                                    <span>Terminer</span>
                                                    <em class="icon ni ni-check-circle"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script src="{{asset('assets/js/app/js/form_password_new.js') }}"></script>
    <script src="{{asset('assets/js/app/js/ctrlv_ctrlc_reset_password.js') }}"></script>

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