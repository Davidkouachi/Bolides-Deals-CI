@extends('app')

@section('titre', 'Acceuil')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview">
                                {{-- <div class="card-inner text-center rounded" style="background-image: url('{{ asset('images/logo/arriere/1.jpg') }}');background-repeat: no-repeat; background-position: left; background-position: -50px -240px; background-size: auto;"> --}}
                                    <div class="card-inner text-center rounded">
                                        <img height="200" width="200" src="{{asset('images/logo/logo.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group bg-primary rounded " style="padding: 15px 10px 0px 10px;">
                                    <marquee behavior="" direction="">
                                        <label class="form-label">
                                            <span class="text-white">
                                                Conseils de sécurité :
                                            </span>
                                            <span class="text-white">
                                                1- N'envoyer pas de paiement sans avoir vérifié la produit ou l'identité du vendeur, 2- N'utilisez pas de myens de transfert d'argent, de virement bancaire ou tout autre moyen pour envoyer de l'argent au vendeur, 3- Rencontrer de préference le vendeur dans un lieu public fréquenté.
                                            </span>
                                        </label>
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block nk-block-lg bg-light rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    Marques de Véhicule
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/kia.png" alt="Kia" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Kia</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/honda.webp" alt="Kia" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Honda</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/audi.png" alt="Audi" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Audi</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/bmw.png" alt="BMW" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>BMW</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/changan.webp" alt="Changan" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Changan</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/chery.webp" alt="Chery" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Chery</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/citroën.webp" alt="Citroën" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Citroën</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/Dacia.png" alt="Dacia" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Dacia</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/Alfa romeo.png" alt="Alfa romeo" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Alfa romeo</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/chevrolet.png" alt="chevrolet" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>chevrolet</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/ds.png" alt="DS" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>DS</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/faw.webp" alt="Faw" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Faw</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/ferrari.png" alt="Ferrari" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Ferrari</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/fiat.jpg" alt="Fiat" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Fiat</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/ford.webp" alt="Ford" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Ford</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/great wall.webp" alt="Great wall" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Great wall</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/haval.webp" alt="Haval" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Haval</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/honda.webp" alt="Honda" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Honda</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/hyundai.webp" alt="Hyundai" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Hyundai</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/infinity.jpg" alt="Infinity" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Infinity</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/jac.webp" alt="JAC" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>JAC</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/jaguar.jpeg" alt="Jaguar" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Jaguar</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/jeep.png" alt="Jeep" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Jeep</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="images/logo/kaiyi.webp" alt="Kaiyi" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6>Kaiyi</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block nk-block-lg bg-light rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    <span>10 dernières annonces</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        <div class="col ">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href=" ">
                                        <img class="rounded" style="object-fit: cover;height: 160px; width:auto;" src="{{asset('images/logo/selects/car.jpg')}}" />
                                    </a>
                                    <ul class="product-badges">
                                        <li>
                                            <span class="badge bg-danger">
                                                <em class="icon ni ni-hot"></em>
                                                <span>Pro</span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-inner pt-0 pb-2" style="height:105px;padding-left: 5px;padding-right: 5px;">
                                    <ul class="product-tags">
                                        <li>
                                            <a class="fs-13px">
                                                <em class="icon ni ni-map-pin-fill"></em>
                                                <span>Abidjan</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="product-title text-dark fs-12px" style="margin-top: -5px;">
                                        <a href="">
                                            Classy Modern Smart watch Classy Modern Smart watch
                                            {{-- <div class="nk-ibx-context-group">
                                                <div class="nk-ibx-context">
                                                    <span class="nk-ibx-context-text">
                                                        <span class="heading">
                                                        </span>
                                                    </span>
                                                </div>
                                            </div> --}}
                                        </a>
                                    </p>
                                    <div class="h6 fs-13px text-warning" style="margin-top: -13px;">
                                        90.000.000 fcfa
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block-head mt-2">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a class="btn btn-outline-primary btn-white btn-wider btn-dim btn-sm" href="">
                                    <span>Voir plus</span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
