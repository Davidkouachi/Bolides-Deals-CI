@extends('app')

@section('titre', 'Formules')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Formules
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                        <div class="row g-gs align-items-center justify-content-center">
                            @foreach($formules as $key => $value)
                            <div class="col-sm-6 col-lg-6 col-xxl-4">
                                <div class="card trans_shado pricing recommend alert alert-pro alert-{{$value->couleur}}" style="padding-left: 10%;">
                                    <div class="p-4">
                                        <div class="pricing-title">
                                            <h4 class="card-title title text-{{$value->couleur}}">
                                                {{$value->nom}}
                                            </h4>
                                        </div>
                                        <div class="pricing-price">
                                            @if($value->gratuit === 'oui')
                                                <h5 class="display-8">Gratuit <span class="caption-text text-base fw-normal">/ mois</span></h5>
                                            @else
                                                <h5 class="display-8">
                                                    {{$value->prix.' Fcfa'}} 
                                                    <span class="caption-text text-base fw-normal">
                                                        / mois
                                                    </span>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <ul class="pricing-features">
                                            <li>
                                                <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                                <span>{{$value->nbre_photo}} photo(s) / Annonce </span>
                                            </li>
                                            <li>
                                                <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                                <span>Durée de vie des annonces: {{$value->duree_vie}} jours</span>
                                            </li>
                                            <li>
                                                <em class="icon text-primary ni ni-arrow-right-circle-fill"></em>
                                                <span>Renouvelement d'une annonce: {{$value->nbre_refresh}} fois </span>
                                            </li>
                                            <li>
                                                @if($value->badge === 'oui')
                                                    <em class="icon text-success ni ni-check-circle-fill"></em>
                                                @else
                                                    <em class="icon text-danger ni ni-cross-circle"></em>
                                                @endif
                                                <span>Visibilité améliorée avec badge</span>
                                            </li>
                                            <li>
                                                @if($value->tete_liste === 'non')
                                                    <em class="icon text-danger ni ni-cross-circle"></em>
                                                    <span>Annonce en tête de liste </span>
                                                @else
                                                    <em class="icon text-success ni ni-check-circle-fill"></em>
                                                    <span>Annonce en tête de liste : {{$value->tete_liste.'h'}} </span>
                                                @endif
                                                
                                            </li>
                                            <li>
                                                @if($value->top_annonce === 'oui')
                                                    <em class="icon text-success ni ni-check-circle-fill"></em>
                                                @else
                                                    <em class="icon text-danger ni ni-cross-circle"></em>
                                                @endif
                                                <span>Top des annonces</span>
                                            </li>
                                            <li>
                                                @if($value->stat === 'oui')
                                                    <em class="icon text-success ni ni-check-circle-fill"></em>
                                                @else
                                                    <em class="icon text-danger ni ni-cross-circle"></em>
                                                @endif
                                                <span>Analyse statistique des annonces</span>
                                            </li>
                                            <li>
                                                <em class="icon text-success ni ni-check-circle-fill"></em>
                                                <span>Support client par email ou Chat</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="px-4 mb-4 text-center">
                                        @if(Auth::check())
                                            @if($formule_user)
                                                @if($value->id === $formule_user->formule_id)
                                                    <span class="badge badge-md bg-secondary">Actuel</span>
                                                @else
                                                    <a class="btn btn-outline-success btn-block">
                                                        Souscrire Maintenant
                                                    </a>
                                                @endif
                                            @else
                                                @if($value->nom === 'BASIQUE')
                                                    <span class="badge badge-md bg-secondary">Actuel</span>
                                                @else
                                                    <a class="btn btn-outline-success btn-block">
                                                        Souscrire Maintenant
                                                    </a>
                                                @endif
                                            @endif
                                        @else
                                            <a class="btn btn-outline-success btn-block" href="{{route('index_login')}}" >
                                                Souscrire Maintenant
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
        </div>
    </div>
</div>

@endsection
