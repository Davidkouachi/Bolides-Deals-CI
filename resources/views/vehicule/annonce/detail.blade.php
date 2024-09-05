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
            <nav>    
                <ul class="breadcrumb">        
                    <li class="breadcrumb-item">
                        <a>Annonce crée le {{ \Carbon\Carbon::parse($ann->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}</a>
                    </li>   
                </ul>
            </nav>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <a href="{{route('annonce_user',$ann->user_id)}}">
                                                <h4>
                                                    Publié par 
                                                </h4>
                                                @if($ann->photo_user)
                                                <div class="user-avatar lg sq border" style="background: transparent;">
                                                    <span>
                                                        <img height="80px" width="80px" style="object-fit: cover;" class="thumb" src="{{ Storage::url($ann->photo_user) }}">
                                                    </span>
                                                </div>
                                                @else
                                                <div class="user-avatar lg sq ">
                                                    <span>
                                                        {{ ucfirst(substr($ann->nom_user, 0, 1)).ucfirst(substr($ann->prenom_user, 0, 1)) }}
                                                    </span>
                                                </div>
                                                @endif
                                                <div class="user-info">
                                                    <h6>
                                                        {{$ann->nom_user}}
                                                        {{$ann->prenom_user}}
                                                    </h6>
                                                    <span class="sub-text">
                                                        <a class="btn btn-white btn-light btn-dim btn-sm" href="{{route('annonce_user',$ann->user_id)}}">
                                                            <em class="icon ni ni-eye"></em>
                                                            <span>Voir ses annonces </span>
                                                        </a>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner">
                        <div class="row pb-5">
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <span class="badge badge-md rounded-pill @php echo $ann->type_annonce === 'vente' ? 'bg-info' : 'bg-warning'; @endphp">
                                                <em class="icon ni ni-cc-alt2"></em>
                                                <span>{{ ucfirst($ann->type_annonce) }}</span>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <ul class="filter-button-group mb-4 pb-1 align-items-center justify-content-center" >
                                    @foreach($photos as $value)
                                        <li>
                                            <div class="" style="height: 130px;width: 130px;">
                                                <div class="card" style=" display: flex;justify-content: center;align-items: center; border-radius: 0px;">
                                                    <img style="height: 130px; width:130px; object-fit: cover;" src="{{ Storage::url($value->image_chemin) }}" data-bs-toggle="modal" data-bs-target="#imageModal{{$value->id}}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;"> 
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="mt-2 text-center" >
                                    {{$photos->count().' photo(s)'}}
                                </p>
                            </div>
                            @if($ann->type_annonce === 'vente')
                                @if($ann->credit_auto === 'oui')
                                <div class="col-12 mt-5" >
                                    <div class="alert alert-fill alert-icon alert-success" role="alert">    
                                        <em class="icon ni ni-check-circle-fill"></em>     
                                        <strong>Crédit Auto</strong>
                                        <ul>
                                            <li>
                                                <p class="small mb-0 fs-14px">
                                                    - <strong>{{$ann->prix_mois.' Fcfa'}}</strong> / Mois.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="small mb-0 fs-14px">
                                                    - Sur <strong>{{$ann->credit_auto_mois}}</strong> Mois.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="small mb-0 fs-14px">
                                                    - Apport Initial : <strong>{{$ann->prix_apport.' Fcfa'}}</strong>.
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endif
                            <div class="col-12 mt-5" >
                                <ul class="nav nav-tabs nav-tabs-s2">
                                    <li class="nav-item"> 
                                        <a class="nav-link active" data-bs-toggle="tab" href="#caracteristique">
                                            Caractéristiques
                                        </a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-bs-toggle="tab" href="#description">
                                            Descriptions
                                        </a> 
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" data-bs-toggle="tab" href="#contact">
                                            Contacts
                                        </a> 
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="caracteristique">
                                        <ul class="filter-button-group mb-4 align-items-center justify-content-center">
                                            <li>
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/eingne.webp') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info"> 
                                                                    <h4 class="sub-text text-black" >{{'Moteur '.$ann->puiss_fiscal.' cv'}}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                            <li>
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
                                                                    <span>
                                                                       <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/neuf.png') }}"> 
                                                                    </span>
                                                                </div>
                                                                <div class="user-info">
                                                                    <h4 class="sub-text text-black" >
                                                                        @if($ann->neuf === 'oui')
                                                                            Véhicule neuf
                                                                        @else
                                                                            Véhicule d'occasion
                                                                        @endif
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="p-0 trans" style="width: 120px;">
                                                    <div class="p-0">
                                                        <div class="team">
                                                            <div class="user-card user-card-s2">
                                                                <div class="" style="width: 50px;height: 50px;">
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
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
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
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
                                                                        <span>
                                                                           <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/key car.webp') }}"> 
                                                                        </span>
                                                                    </div>
                                                                    <div class="user-info"> 
                                                                        <h4 class="sub-text text-black" >
                                                                            {{is_numeric($ann->nbre_cle).' Clé(s)'}}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
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
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
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
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
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
                                                @if($ann->hors_taxe === 'non')
                                                <li>
                                                    <div class="p-0 trans" style="width: 120px;">
                                                        <div class="p-0">
                                                            <div class="team">
                                                                <div class="user-card user-card-s2">
                                                                    <div class="" style="width: 50px;height: 50px;">
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
                                                    @if($ann->papier === 'oui')
                                                    <li>
                                                        <div class="p-0 trans" style="width: 120px;">
                                                            <div class="p-0">
                                                                <div class="team">
                                                                    <div class="user-card user-card-s2">
                                                                        <div class="" style="width: 50px;height: 50px;">
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
                                                        <div class="p-0 trans" style="width: 120px;">
                                                            <div class="p-0">
                                                                <div class="team">
                                                                    <div class="user-card user-card-s2">
                                                                        <div class="" style="width: 50px;height: 50px;">
                                                                            <span>
                                                                               <img height="50px" width="50px" style="object-fit: cover;" class="thumb" src="{{ asset('images/logo/detail/visite.jpg') }}"> 
                                                                            </span>
                                                                        </div>
                                                                        <div class="user-info">
                                                                            <h4 class="sub-text text-black" >
                                                                                {{'Visite technique '.\Carbon\Carbon::parse($ann->visite_techn)->format('d/m/Y') }}
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endif
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <p>
                                            {{$ann->description}}
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="contact">
                                        <ul class="list list-sm list-checked">
                                            <li>
                                                <strong>Appel : </strong>
                                                {{$ann->appel ? : 'Aucun' }}
                                            </li>
                                            <li>
                                                <strong>Sms : </strong>
                                                {{$ann->sms ? : 'Aucun' }}
                                            </li>
                                            <li>
                                                <strong>Whatsapp : </strong>
                                                {{$ann->whatsapp ? : 'Aucun' }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="product-details entry me-xxl-3">
                                    <div class="alert alert-warning alert-icon" role="alert">    
                                        <em class="icon ni ni-alert-fill"></em>     
                                        <strong> Soyez Prudents !!! </strong>
                                        <br> 
                                        <ul>
                                            <li>1- Ne faite pas de paiements sans avoir vérifié le véhicule ou l'identité du vendeur</li>
                                            <li>2- Rencontrer de préference le vendeur dans un lieu public fréquentés ou dans un parc automobiles</li>
                                            <li>3- Etre accompagner de son mecanicien, pour des vérifications approfondies du véhicule</li>
                                        </ul>
                                        <a class="btn btn-white btn-outline-danger btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalSignal">
                                            <em class="icon ni ni-thumbs-down"></em>
                                            <span>Signaler l'annonce</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner mt-n5">
                        <div class="team">
                            <div class="user-card user-card-s2">
                                <div class="row g-gs user-info">
                                    <div class="col-12">
                                        <h6 class="mb-1">
                                            Partager l'annonce avec vos ami(e)s
                                        </h6>
                                        <img height="90px" width="90px" src="{{ $imgqr }}" alt="Code QR">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <a rel="noopener nofollow" target="_blank" class="btn btn-dim btn-success btn-white mt-1 me-1" style="border-radius: 100px;" href="whatsapp://send?text={{ urlencode($ann->marque.' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce.', prix : '.$ann->prix.' Fcfa')}}%0A%0A{{'lien : '.urlencode($data_qrcode) }}" target="_blank">
                                            <em class="icon ni ni-whatsapp"></em>
                                        </a>
                                        <a rel="noopener nofollow" target="_blank" class="btn btn-dim btn-primary btn-white mt-1 me-1" style="border-radius: 100px;" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($data_qrcode) }}" target="_blank">
                                            <em class="icon ni ni-facebook-circle"></em>
                                        </a>
                                        <a rel="noopener nofollow" target="_blank" class="btn btn-dim btn-info btn-white mt-1 me-1" style="border-radius: 100px;" href="https://twitter.com/intent/tweet?text={{ urlencode($ann->marque.' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce.', prix : '.$ann->prix.' Fcfa')}}%0A%0A{{'lien : '.urlencode($data_qrcode) }}" target="_blank">
                                            <em class="icon ni ni-twitter"></em>
                                        </a>
                                        <a rel="noopener nofollow" target="_blank" class="btn btn-dim btn-warning btn-white mt-1 me-1" style="border-radius: 100px;" href="sms:?body={{ $ann->marque.' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce.' ,Prix : '.$ann->prix.' Fcfa'}}%0A%0A{{'Lien : '.urlencode($data_qrcode) }}" target="_blank">
                                            <em class="icon ni ni-chat"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block nk-block-lg bg-gray mt-3 p-2 rounded">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title text-white">
                                Annonces similaires
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                    @if($sims->isNotEmpty())
                        @foreach($sims as $value)
                            <div class="col ">
                                <div class="card trans_shado">
                                    <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                        <a href="{{route('index_detail',$value->uuid)}}">
                                            <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                        </a>
                                    </div>
                                    <div class="card-inner pt-0 pb-2 text-center" style="height:145px;padding-left: 5px;padding-right: 5px;">
                                        <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                            <div class="user-avatar md sq p-2 border bg-white rounded-circle ">
                                                <img src="{{ Storage::url($value->marque_photo) }}" style="object-fit: cover;background: transparent;">
                                            </div>
                                            {{-- <div class="user-avatar sm sq" style="background: transparent;margin-left: 0px;">
                                                <img src="{{asset('images/logo/certificat/certification-logo-2.png')}}" style="object-fit: cover;background: transparent;">
                                            </div> --}}
                                        </div>
                                        <ul class="product-tags">
                                            <li>
                                                <a class="fs-13px">
                                                    <em class="icon ni ni-map-pin-fill"></em>
                                                    <span>{{$value->ville}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="product-title text-dark fs-12px text-center" style="margin-top: -5px;">
                                            <a href="{{route('index_detail',$value->uuid)}}">
                                                {{$value->marque}}
                                                {{$value->model}}
                                                {{$value->annee}}
                                            </a>
                                        </p>
                                        <div class="h6 fs-13px text-warning text-center" style="margin-top: -13px;">
                                            {{$value->prix.' Fcfa'}}
                                        </div>
                                        <span class="text-soft text-center"> 
                                            {{\Carbon\Carbon::parse($value->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center ">
                            <p class="text-white">Aucune annonce similaire pour le moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@section('btn_bas')
    <div class="pmo-lv active p-1 text-center" style="width: 100%;background: none;border: none;">
        <p class="fs-40px" style="background: transparent;">
            @if($ann->whatsapp)
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{$ann->whatsapp}}" class="btn btn-success" style="border-radius: 100px;" href="https://wa.me/+225{{$ann->whatsapp}}?text={{ urlencode($ann->marque. ' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce) }}%0A%0A{{'Prix : '.$ann->prix.' Fcfa'}}%0A%0A{{urlencode($data_qrcode)}}%0A%0A{{urlencode('Bonjour, je suis intéressé par votre annonce. Pourriez-vous m\'en dire plus ?') }}" target="_blank">
                <em class="icon ni ni-whatsapp"></em>
                <span class="d-none d-lg-block" >{{$ann->whatsapp}}</span>
            </a>
            @endif
            @if($ann->appel)
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{$ann->appel}}" class="btn btn-warning" style="border-radius: 100px;" href="tel:+225{{$ann->appel}}">
                <em class="icon ni ni-call"></em>
                <span class="d-none d-lg-block" >{{$ann->appel}}</span>
            </a>
            @endif
            @if($ann->sms)
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="{{$ann->sms}}" class="btn btn-info" style="border-radius: 100px;" href="sms:+225{{$ann->sms}}?body={{ $ann->marque. ' '.$ann->model.' '.$ann->annee.' en '.$ann->type_annonce }}%0A%0A{{ 'Prix : '.$ann->prix.' Fcfa' }}%0A%0A{{'Lien : '.urlencode($data_qrcode) }}%0A%0A{{ 'Bonjour, je suis intéressé par votre annonce. Pourriez-vous m\'en dire plus ?' }}" target="_blank">
                <em class="icon ni ni-chat"></em>
                <span class="d-none d-lg-block" >{{$ann->sms}}</span>
            </a>
            @endif
        </p>
    </div>
@endsection

<script src="{{asset('assets/js/app/js/annonce/form_signal.js') }}"></script>

{{-- <div class="modal fade zoom" tabindex="-1" id="modalContact">
    <div class="modal-dialog modal-sm" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body ">
                <div class="card-inner text-center" >
                    <ul class="row g-gs text-center">
                        <li class="col-lg-12" >
                            <div class="user-card user-card-s2">
                                <div class="user-avatar lg bg-primary mt-0 pt-0">
                                    <span>
                                        <em class="icon ni ni-user" ></em>
                                    </span>
                                </div>
                                <div class="user-info">
                                    <h6>Nom e Prénom</h6>
                                    <span class="sub-text">Profession</span>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-warning btn-dim btn-block" href="tel:+2250102514392" target="_blank">
                                <em class="icon ni ni-call"></em>
                                <span> (+225) 0102514392 </span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-success btn-dim btn-block" href="https://wa.me/+2250102514392" target="_blank">
                                <em class="icon ni ni-whatsapp"></em>
                                <span> (+225) 0102514392 </span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-primary btn-dim btn-block" href="sms:+2250102514392" target="_blank">
                                <em class="icon ni ni-chat"></em>
                                <span> (+225) 0102514392 </span>
                            </a>
                        </li>
                    </ul>
                </div> 
            </div>
        </div>
    </div>
</div> --}}

@if (session('success_signal'))
<div class="modal fade" tabindex="-1" id="modalSuccess_signal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross"></em>
            </a> 
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                    <h4 class="nk-modal-title">{{session('success_signal')}}</h4>
                    <div class="nk-modal-action"><a href="#" class="btn btn-white btn-lg btn-mw btn-outline-success btn-dim" data-bs-dismiss="modal">OK</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('modalSuccess_signal'));
        myModal.show();
    });
</script>
@php session()->forget('success_signal'); @endphp
@endif

<div class="modal fade" tabindex="-1" id="modalSignal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Motif</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="form_signal" method="post" action="{{route('signal_annonce')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$ann->user_id}}">
                    <input type="hidden" name="uuid" value="{{$ann->uuid}}">
                    <div class="form-group">
                        <label class="form-label" for="default-textarea">Nom</label>
                        <div class="form-control-wrap">
                            @if(Auth::user())
                                <input class="form-control" name="nom" readonly type="text" placeholder="Entrer votre nom" value="{{Auth::user()->name}}" />
                            @else
                                <input required name="nom" class="form-control" type="text" placeholder="Entrer votre nom" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-textarea">Email</label>
                        <div class="form-control-wrap">
                            @if(Auth::user())
                                <input class="form-control" readonly type="email" placeholder="Entrer votre email" name="email" value="{{Auth::user()->email}}" />
                            @else
                                <input required class="form-control" type="email" placeholder="Entrer votre email" name="email" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="type-vehicule">
                            Objet
                        </label>
                        <div class="form-control-wrap">
                            <select required id="marqueSelect" class="form-select js-select2" data-placeholder="Selectionner" name="marque_id">
                                <option value=""></option>
                                <option value="anarque">Anarque</option>
                                <option value="faux numero">Faux numéro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label"> Motif </label>
                        <div class="form-control-wrap">
                            <textarea  name="motif" name="text" class="form-control no-resize" required ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-white btn-dim btn-md btn-outline-success">
                            <span>Envoyer</span>
                            <em class="icon ni ni-send"></em>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Signaler l'annonce</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($photos as $value)
<div class="modal fade" id="imageModal{{$value->id}}" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center row g-gs">
        <div class="col-12 text-center" >
            <img src="{{ Storage::url($value->image_chemin) }}" class="img-fluid" alt="Large Image" style="width: auto; height: auto;">
        </div>
    </div>
</div>
@endforeach

@endsection


