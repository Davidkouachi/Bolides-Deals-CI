@extends('app')

@section('titre', 'Acceuil')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <div class="nk-block ">
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview" >
                                {{-- <div class="card-inner text-center rounded" style="background-image: url('{{ asset('images/logo/arriere/1.jpg') }}');background-repeat: no-repeat; background-position: left; background-position: -50px -240px; background-size: auto;"> --}}
                                    <div class="card-inner text-center rounded">
                                        <img height="200" width="200" src="{{asset('images/logo/logo.png')}}">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <ul class="filter-button-group mb-4 pb-1">
                        @foreach($types as $value)
                        <li>
                            <a class="filter-button w-100px text-center" type="button">
                                {{$value->nom}} 
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="nk-block nk-block-lg bg-white rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    Marques de Véhicules
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        @foreach($marques as $value)
                        <div class="col">
                            <div class="" style="height: 180px;">
                                <div class="card-inner">
                                    <div class="team">
                                        <a class="user-card user-card-s2" href="{{route('index_annonce','marque='.$value->id)}}" >
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="{{ Storage::url($value->image_chemin) }}" alt="{{$value->marque}}" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6 class="fs-13px" >{{$value->marque}}</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="nk-block nk-block-lg bg-light rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    <span>Dernières annonces : Ventes</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        @foreach($vanns as $value)
                        <div class="col ">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$value->uuid)}}">
                                        <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                    </a>
                                </div>
                                <div class="card-inner pt-0 pb-2" style="height:105px;padding-left: 5px;padding-right: 5px;">
                                    <ul class="product-tags">
                                        <li>
                                            <a class="fs-13px">
                                                <em class="icon ni ni-map-pin-fill"></em>
                                                <span>{{$value->ville}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="product-title text-dark fs-12px" style="margin-top: -5px;">
                                        <a href="{{route('index_detail',$value->uuid)}}">
                                            {{$value->marque}}
                                            {{$value->model}}
                                            {{$value->annee}}
                                        </a>
                                    </p>
                                    <div class="h6 fs-13px text-warning" style="margin-top: -13px;">
                                        {{$value->prix.' Fcfa'}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="nk-block-head mt-2">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a class="btn btn-outline-primary btn-white btn-wider btn-dim btn-sm" href="{{route('index_annonce', 'type_annonce=vente')}}">
                                    <span>Voir plus</span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block nk-block-lg bg-light rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    <span>Dernières annonces : Locations</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        @foreach($lanns as $value)
                        <div class="col ">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$value->uuid)}}">
                                        <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                    </a>
                                </div>
                                <div class="card-inner pt-0 pb-2" style="height:105px;padding-left: 5px;padding-right: 5px;">
                                    <ul class="product-tags">
                                        <li>
                                            <a class="fs-13px">
                                                <em class="icon ni ni-map-pin-fill"></em>
                                                <span>{{$value->ville}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="product-title text-dark fs-12px" style="margin-top: -5px;">
                                        <a href="{{route('index_detail',$value->uuid)}}">
                                            {{$value->marque}}
                                            {{$value->model}}
                                            {{$value->annee}}
                                        </a>
                                    </p>
                                    <div class="h6 fs-13px text-warning" style="margin-top: -13px;">
                                        {{$value->prix.' Fcfa / 24h'}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="nk-block-head mt-2">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a class="btn btn-outline-primary btn-white btn-wider btn-dim btn-sm" href="{{route('index_annonce', 'type_annonce=location')}}">
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

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
        <ul class="preview-list g-1">
            <li class="preview-item"> 
                <a class="btn btn-warning" > 
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                    <span>Chargement en cours...</span> 
                </a> 
            </li>
        </ul>
    </div>
</div>

@endsection
