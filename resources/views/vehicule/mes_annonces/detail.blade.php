@extends('app')

@section('titre', 'Détail annonce')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title ">
                            Détail de l'annonce
                        </h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a class="btn btn-white btn-outline-danger btn-dim d-none d-sm-inline-flex" href="javascript:void(0);" onclick="history.back()">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>
                                Retour
                            </span>
                        </a>
                        <a class="btn btn-white btn-outline-danger btn-dim d-inline-flex d-sm-none" href="javascript:void(0);" onclick="history.back()">
                            <em class="icon ni ni-arrow-left">
                            </em>
                        </a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner">
                        <div class="row pb-5">
                            <div class="col-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <span class="badge badge-md rounded-pill @php echo $ann->type_annonce === 'vente' ? 'bg-info' : 'bg-warning'; @endphp">
                                                <em class="icon ni ni-cc-alt2"></em>
                                                <span>{{ ucfirst($ann->type_annonce) }}</span>
                                            </span>
                                            <span class="mt-2 badge badge-md rounded-pill 
                                                    @php
                                                        if ($ann->statut === 'en ligne') {
                                                            echo 'bg-success';
                                                        } elseif($ann->statut === 'hors ligne' || $ann->statut === 'indisponible') {
                                                            echo 'bg-danger';
                                                        } else {
                                                            echo 'bg-success';
                                                        }
                                                    @endphp
                                                ">
                                                    <em class="icon ni 
                                                        @php
                                                            if ($ann->statut === 'en ligne') {
                                                                echo 'ni-cloud';
                                                            } elseif($ann->statut === 'hors ligne' || $ann->statut === 'indisponible') {
                                                                echo 'ni-cross-circle';
                                                            } else {
                                                                echo 'ni-check-circle';
                                                            }
                                                        @endphp
                                                    "></em>
                                                    <span>{{$ann->statut}}</span>
                                                </span>
                                            <div class="user-avatar xl sq mt-2" style="background: transparent;">
                                                <span>
                                                    <img style="object-fit: cover;" class="thumb" src="{{ Storage::url($ann->marque_photo) }}">
                                                </span>
                                            </div>
                                            <h5 class="mt-3" >
                                                {{$ann->marque}}
                                                {{$ann->model}}
                                                {{$ann->annee}}
                                            </h5>
                                            <h5 class="product-price text-warning">
                                                @if($ann->type_annonce === 'vente')
                                                    {{$ann->prix.' Fcfa'}}
                                                @else
                                                    {{$ann->prix.' Fcfa / 24h'}}
                                                @endif
                                            </h5>
                                            <h4 class="product-price {{ $ann->negociable === 'oui' ? 'text-success' : 'text-danger' }}">
                                                @if($ann->negociable === 'oui')
                                                    Négociable
                                                @else
                                                    Non-négociable
                                                @endif
                                            </h4>
                                            <span class="badge badge-md rounded-pill bg-secondary">
                                                <em class="icon ni ni-eye"></em>
                                                <span>{{$ann->views.' vue(s)'}}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert alert-warning alert-dismissible fade show mb-4 rounded-6" role="alert">
                                    <p class="small mb-0">
                                        Cette annonce sera retirée <strong>{{ \Carbon\Carbon::parse($ann->created_at)->addDays(31)->diffForHumans() }}</strong>.
                                    </p>
                                    <div class="d-inline-flex position-absolute end-0 top-50 translate-middle-y me-2">
                                        <button type="button" class="btn btn-xs btn-icon btn-warning rounded-pill" data-bs-dismiss="alert">
                                            <em class="icon ni ni-cross"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="slider-init row product-slider mb-3" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                                    @foreach($photos as $value)
                                    <div class="col">
                                        <div class="h-100" style=" display: flex;justify-content: center;align-items: center; border: none;">
                                            <img style="height: 210px; width:210px; object-fit: cover;" src="{{ Storage::url($value->image_chemin) }}" data-bs-toggle="modal" data-bs-target="#imageModal{{$value->id}}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;"> 
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div class="product-details entry me-xxl-3">
                                    <h4 class="mb-2 text-center" >
                                        <ins>Caractéristiques</ins>
                                    </h4>
                                    <div class="nk-block mb-5">
                                        <ul class="filter-button-group mb-4 align-items-center justify-content-center">
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/weight.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->cylindre.' cylindre'}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/eingne.webp') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->puiss_fiscal.' cheveaux'}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/fuel.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->type_carburant}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/transmission.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->transmission}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/place.png') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->nbre_place.' places'}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/date.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{'année '.$ann->annee}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/couleur.png') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{'couleur '.$ann->couleur}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/porte.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{$ann->nbre_porte.' Portes'}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/version.webp') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{'Version '.$ann->version}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/type.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{'Type '.$ann->type_marque}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($ann->neuf === 'oui')
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/neuf.png') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >Véhicule neuf</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                            <li>
                                                <div class=" w-199px">
                                                    <div class="card-inner">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="user-avatar md bg-white sq">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/localisation.jpg') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="sub-text text-black" >
                                                                        {{$ann->ville.','.$ann->localisation }}
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($ann->type_annonce === 'vente')
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/compteur.jpg') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info"> 
                                                                        <h4 class="sub-text text-black" >{{$ann->kilometrage.' km'}}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/key car.webp') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info"> 
                                                                        <h4 class="sub-text text-black" >{{$ann->nbre_cle.' Clé(s)'}}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/troc.jpg') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        @if($ann->troc === 'oui')
                                                                            <h4 class="sub-text text-black" >
                                                                                Troc possible
                                                                            </h4>
                                                                        @else
                                                                            <h4 class="sub-text text-black" >
                                                                                Pas de troc
                                                                            </h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/negociable.png') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        @if($ann->troc === 'oui')
                                                                            <h4 class="sub-text text-black" >
                                                                                Prix négociable
                                                                            </h4>
                                                                        @else
                                                                            <h4 class="sub-text text-black" >
                                                                                Prix non négociable
                                                                            </h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/papier.webp') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        @if($ann->papier === 'oui')
                                                                            <h4 class="sub-text text-black" >
                                                                                Papier à jour
                                                                            </h4>
                                                                        @else
                                                                            <h4 class="sub-text text-black" >
                                                                                Papier non à jour
                                                                            </h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/assurance.jpg') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <h4 class="sub-text text-black" >
                                                                            {{'assurance '.\Carbon\Carbon::parse($ann->assurance)->format('d/m/Y') }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/visite.jpg') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <h4 class="sub-text text-black" >
                                                                            {{'viste technique '.\Carbon\Carbon::parse($ann->visite_techn)->format('d/m/Y') }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class=" w-199px">
                                                        <div class="card-inner">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="user-avatar md bg-white sq">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/hors_taxe.png') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        @if($ann->hors_taxe === 'oui')
                                                                            <h4 class="sub-text text-black" >
                                                                                Véhicule hors taxe
                                                                            </h4>
                                                                        @else
                                                                            <h4 class="sub-text text-black" >
                                                                                Véhicule TTC
                                                                            </h4>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="row g-gs user-info" >
                                                <div class="col-12 mt-2">
                                                    <a class="btn btn-outline-info btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalAnnoncemodif" >
                                                        <span>Modifier l'annonce</span>
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                    <a data-bs-toggle="modal" data-bs-target="#modalConfirmeDelete" class="btn btn-outline-danger btn-dim btn-sm mt-1 me-1" >
                                                        <span>Supprimer l'annonce</span>
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                    @if($ann->statut === 'hors ligne')
                                                    <a class="btn btn-outline-warning btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalAnnoncerefresh">
                                                        <span>Renouveler l'annonce</span>
                                                        <em class="icon ni ni-reload"></em>
                                                    </a>
                                                    @endif
                                                    @if($ann->statut === 'indisponible')
                                                    <a class="btn btn-outline-success btn-dim btn-sm mt-1 me-1" href="{{route('trait_dispo',$ann->uuid)}}" >
                                                        <span>Véhicule Disponible</span>
                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                    </a>
                                                    @endif
                                                    @if($ann->statut === 'en ligne' )
                                                    <a class="btn btn-outline-gray btn-dim btn-sm mt-1 me-1" href="{{route('trait_indispo',$ann->uuid)}}" >
                                                        <span>Véhicule Indisponible</span>
                                                        <em class="icon ni ni-cross-circle"></em>
                                                    </a>
                                                    @endif
                                                </div>
                                                @if($ann->statut === 'en ligne')
                                                <div class="col-12 mt-2">
                                                    <img height="120px" width="120px" src="{{ $imgqr }}" alt="Code QR">
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <a class="btn btn-white btn-outline-light btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalPartager">
                                                        <span>Partager le lien</span>
                                                        <em class="icon ni ni-share"></em>
                                                    </a>
                                                </div>
                                                @endif
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

<div class="modal fade zoom" tabindex="-1" id="modalPartager">
    <div class="modal-dialog modal-sm" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Partager</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body ">
                <div class="card-inner text-center" >
                    <ul class="row g-gs text-center">
                        <li class="col-lg-12">
                            <a class="btn btn-outline-success btn-dim btn-block" href="https://wa.me/?text={{ urlencode($ann->marque. ' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce) }}%0A%0A{{'- Prix : '.$ann->prix.' Fcfa'}}%0A%0A{{'- Version : '.$ann->version}}%0A%0A{{'- Kilométrage : '.$ann->kilometrage.' KM'}}%0A%0A{{'- Transmission : '.$ann->transmission}}%0A%0A{{'- Type de carburant : '.$ann->type_carburant}}%0A%0A{{'- Puissance fiscale : '.$ann->puiss_fiscal. ' CV'}}%0A%0A{{'- Cylindré : '.$ann->cylindre.' C'}}%0A%0A{{'- Couleur : '.$ann->couleur}}%0A%0A{{'- Neuf : '.$ann->neuf}}%0A%0A{{'- Descriptions / Conditions : '.$ann->description}}%0A%0A{{'Lien : '.urlencode($data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-whatsapp"></em>
                                <span>WhatsApp</span>
                            </a>

                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-primary btn-dim btn-block" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-facebook-circle"></em>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-warning btn-dim btn-block" href="sms:?body={{ urlencode($data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-chat"></em>
                                <span>SMS</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-info btn-dim btn-block" href="https://twitter.com/intent/tweet?text={{ urlencode($ann->marque. ' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce) }}%0A%0A{{'- Prix : '.$ann->prix.' Fcfa'}}%0A%0A{{'- Kilométrage : '.$ann->kilometrage.' KM'}}%0A%0A{{'- Transmission : '.$ann->transmission}}%0A%0A{{'- Type de carburant : '.$ann->type_carburant}}%0A%0A{{'- Puissance fiscale : '.$ann->puiss_fiscal. ' CV'}}%0A%0A{{'- Cylindré : '.$ann->cylindre.' C'}}%0A%0A{{'- Couleur : '.$ann->couleur}}%0A%0A{{'Lien : '.urlencode($data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-twitter"></em>
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-primary btn-dim btn-block" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($ann->marque . ' ' . $ann->model . ' ' . $ann->annee . ' en ' . $ann->type_annonce) }}&title={{ urlencode('- Prix : ' . $ann->prix . ' Fcfa' . '%0A' . '- Kilométrage : ' . $ann->kilometrage . ' KM' . '%0A' . '- Transmission : ' . $ann->transmission . '%0A' . '- Type de carburant : ' . $ann->type_carburant . '%0A' . '- Puissance fiscale : ' . $ann->puiss_fiscal . ' CV' . '%0A' . '- Cylindré : ' . $ann->cylindre . ' C' . '%0A' . '- Couleur : ' . $ann->couleur . '%0A' . 'Lien : ' . $data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-linkedin"></em>
                                <span>LinkedIn</span>
                            </a>
                        </li>
                    </ul>

                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($photos as $value)
<div class="modal fade" id="imageModal{{$value->id}}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center row g-gs">
        <div class="col-12" >
            <img src="{{ Storage::url($value->image_chemin) }}" class="img-fluid" alt="Large Image" style="width: auto; height: auto;">
        </div>
    </div>
</div>
@endforeach


<div class="modal fade" tabindex="-1" id="modalConfirmeDelete" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                    <h4 class="nk-modal-title">Confirmation</h4>
                    <div class="nk-modal-text">
                        <div class="caption-text">
                            <span>Voulez-vous vraiment supprimer cette annonce</span>
                        </div>
                    </div>
                    <div class="nk-modal-action">
                        <a id="form_click" href="{{route('delete_ann',$ann->uuid)}}" class="btn btn-lg btn-mw btn-success me-2">
                            oui
                        </a>
                        <a href="#" class="btn btn-lg btn-mw btn-danger" data-bs-dismiss="modal">
                            non
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('car'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire("Succés!", "{{session('car')}}", "success");
        });
    </script>
    @php session()->forget('car'); @endphp
@endif


@endsection


