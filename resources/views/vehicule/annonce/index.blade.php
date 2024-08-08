@extends('app')

@section('titre', 'Annonces')

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
                                    <div class="card-inner text-center rounded row g-gs">
                                        <div class="col-12" >
                                            <h3>Annonces</h3>
                                        </div>
                                        <div class="col-12" >
                                            <form action="#" class="form-validate row g-gs">
                                        <div class="col-lg-4 col-md-6" >
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input placeholder="Model, marque" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" >
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input placeholder="Kilométrage" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" >
                                            <div class="form-group">
                                                <div class="form-control-wrap">    
                                                    <div class="input-group">       
                                                        <input id="min-price" placeholder="prix min" type="tel" class="form-control">
                                                        <input id="max-price" placeholder="prix max" type="tel" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center" >
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-white btn-lg btn-dim btn-outline-success ">
                                                    <em class="ni ni-search" ></em>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <ul class="filter-button-group mb-4 pb-1">
                        <li>
                            <button class="filter-button active" data-filter="*" type="button">
                                Tout
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-1" type="button">
                                Berline 
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-2" type="button">
                                Hatchback 
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-3" type="button">
                                SUV 
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-4" type="button">
                                Coupé 
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-5" type="button">
                                Pick-up
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-5" type="button">
                                Camion 
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-filter=".categorie-5" type="button">
                                Moto  
                            </button>
                        </li>
                    </ul>
                    <div class="row g-gs filter-container" data-animation="true">

                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 filter-item categorie-1" data-category="categorie-1">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href=" ">
                                        <img style="object-fit: cover;height: 160px; width:auto;" src="{{asset('images/logo/selects/car.jpg')}}" />
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
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 filter-item categorie-2" data-category="categorie-2">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href=" ">
                                        <img style="object-fit: cover;height: 160px; width:auto;" src="{{asset('images/logo/selects/car.jpg')}}" />
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
                </div>

                <div class="nk-block" >
                    <div>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="">Prev</a></li>
                            <li class="page-item"><a class="page-link" href="">1</a></li>
                            <li class="page-item"><a class="page-link" href="">2</a></li>
                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                            <li class="page-item"><a class="page-link" href="">6</a></li>
                            <li class="page-item"><a class="page-link" href="">7</a></li>
                            <li class="page-item"><a class="page-link" href="">Next</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
