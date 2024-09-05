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

                @if($types->isNotEmpty())
                <div class="nk-block">
                    <ul class="filter-button-group mb-4 pb-1">
                        @foreach($types as $value)
                            @if($value->nom !== 'autre')
                            <li>
                                <a class="filter-button text-center trans_shado" type="button">
                                    {{$value->nom}} 
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($marques->isNotEmpty())
                <div class="nk-block nk-block-lg bg-white rounded p-4 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">
                                    Marques
                                </h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        @foreach($marques as $value)
                        <div class="col ">
                            <div class="trans img_annonce" style="height: 180px;">
                                <div class="card-inner">
                                    <div class="team">
                                        <a class="user-card user-card-s2" @if($value->nbre_ann > 0) href="{{ route('index_annonce', 'marque='.$value->id) }}" @else href="javascript:void(0);" onclick="showNoAnnoncesAlert('{{ $value->marque }}')" @endif>
                                            <div class="user-avatar lg sq" style="background: transparent;">
                                                <img src="{{ Storage::url($value->image_chemin) }}" alt="{{ $value->marque }}" class="thumb">
                                            </div>
                                            <div class="user-info">
                                                <h6 class="fs-13px">{{ $value->marque }}</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($tanns->isNotEmpty())
                <div class="nk-block nk-block-lg rounded p-0 mt-5 bg-transparent">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3 ">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title text-danger">
                                    <span>Top des annonces</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                        @foreach($tanns as $key => $value)
                        <div class="col p-3">
                            <div class="card product-card trans_shado img_annonce" style="border-bottom: 10px solid #f2426e;">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$value->uuid)}}">
                                        <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                    </a>
                                    <ul class="product-badges d-flex flex-column">
                                        <li>
                                            <span class="badge bg-danger">
                                                    <em class="icon ni ni-camera"></em>
                                                    <span>{{$value->nbre_photo}}</span>
                                            </span>
                                        </li>
                                        @if($value->type_annonce === 'vente' && $value->credit_auto === 'oui')
                                            <li>
                                                <span class="badge bg-success">
                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                    <span>Crédit Auto</span>
                                                </span>
                                            </li>
                                            {{-- <li>
                                                <span class="badge bg-light">
                                                    <span>{{$value->prix_mois.' Fcfa / Mois'}}</span>
                                                </span>
                                            </li> --}}
                                        @endif
                                    </ul> 
                                </div>
                                <div class="card-inner pt-0 pb-2 text-center" style="height:125px;padding-left: 5px;padding-right: 5px;">
                                    <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                        <div class="user-avatar md sq p-2 border bg-white rounded-circle @php echo $value->type_annonce === 'vente' ? 'border-info border-2' : 'border-warning border-2'; @endphp">
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
                                </div>
                            </div>
                        </div>
                        @if($key === 1)
                            <div class="col p-3 rounded ">
                                <div class="card trans_shado img_annonce" style="border-bottom: 10px solid #fd9722;">
                                    <div class="card-inner rounded pt-5 pb-2 text-center" style="height:285px;padding-left: 5px;padding-right: 5px; background: linear-gradient(to bottom, orange, white, white);">
                                        <h5 class="nk-block-title mt-5">
                                            <span>Augmenter votre visibilité</span>
                                        </h5>
                                        <div class="h6 fs-13px text-center mt-2">
                                            <a class="btn btn-outline-warning" @if(Auth::check()) data-bs-toggle="modal" data-bs-target="#FormuleUser" @else data-bs-toggle="modal" data-bs-target="#LoginRequis" @endif>
                                                <span>Prêt</span>
                                                <em class="icon ni ni-arrow-right" ></em>
                                            </a>
                                        </div>
                                        <div class="text-center mt-2">
                                            <em class="icon ni ni-yelp text-warning" style="font-size: 50px;"></em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                @if($vanns->isNotEmpty())
                <div class="nk-block nk-block-lg rounded p-0 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3 ">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title text-azure">
                                    <span>Dernières annonces : Ventes</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'> --}}
                    <div class="row g-gs">
                        @foreach($vanns as $value)
                        {{-- <div class="col p-3"> --}}
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                            <div class="card trans_shado img_annonce" @if($value->type_annonce === 'vente') style="border-bottom: 5px solid #058efc;" @else style="border-bottom: 5px solid orange;" @endif >
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$value->uuid)}}">
                                        <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                    </a>
                                    <ul class="product-badges d-flex flex-column">
                                        <li>
                                            <span class="badge bg-danger">
                                                    <em class="icon ni ni-camera"></em>
                                                    <span>{{$value->nbre_photo}}</span>
                                            </span>
                                        </li>
                                        @if($value->type_annonce === 'vente' && $value->credit_auto === 'oui')
                                            <li>
                                                <span class="badge bg-success">
                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                    <span>Crédit Auto</span>
                                                </span>
                                            </li>
                                            {{-- <li>
                                                <span class="badge bg-light">
                                                    <span>{{$value->prix_mois.' Fcfa / Mois'}}</span>
                                                </span>
                                            </li> --}}
                                        @endif
                                    </ul> 
                                </div>
                                <div class="card-inner pt-0 pb-2 text-center" style="height:145px;padding-left: 5px;padding-right: 5px;">
                                    <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                        <div class="user-avatar md sq p-2 border bg-white rounded-circle border-info border-2 ">
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
                    </div>
                    <div class="nk-block-head mt-2">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a class="btn btn-outline-gray btn-white btn-wider btn-dim btn-sm" href="{{route('index_annonce', 'type_annonce=vente')}}">
                                    <span>Voir plus</span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($lanns->isNotEmpty())
                <div class="nk-block nk-block-lg rounded p-0 mt-5">
                    <div class="nk-block-head">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title text-orange">
                                    <span>Derniéres annonces : Locations</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'> --}}
                    <div class="row g-gs">
                        @foreach($lanns as $value)
                        {{-- <div class="col p-3"> --}}
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                            <div class="card trans_shado img_annonce" @if($value->type_annonce === 'vente') style="border-bottom: 5px solid #058efc;" @else style="border-bottom: 5px solid orange;" @endif >
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$value->uuid)}}">
                                        <img class="" style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($value->photo) }}" />
                                    </a>
                                    <ul class="product-badges">
                                        <li>
                                            <span class="badge bg-danger">
                                                    <em class="icon ni ni-camera"></em>
                                                    <span>{{$value->nbre_photo}}</span>
                                            </span>
                                        </li>
                                    </ul> 
                                </div>
                                <div class="card-inner pt-0 pb-2 text-center" style="height:145px;padding-left: 5px;padding-right: 5px;">
                                    <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                        <div class="user-avatar md sq p-2 border bg-white rounded-circle border-warning border-2 ">
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
                    </div>
                    <div class="nk-block-head mt-2">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <a class="btn btn-outline-gray btn-white btn-wider btn-dim btn-sm" href="{{route('index_annonce', 'type_annonce=location')}}">
                                    <span>Voir plus</span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

    <div class="modal fade" tabindex="-1" id="FormuleUser" role="dialog">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content bg-white" style="border-radius: 0;">
                <div class="modal-header">
                    <h5 class="modal-title">Formule</h5>
                    <a class="fs-20px" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body modal-body-lg bg-light">
                    <div class="nk-block">
                        <div class="row g-gs align-items-center justify-content-center">
                            @foreach($formules as $key => $value)
                            <div class="col-xxl-3 col-md-6">
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
                                        @if($formule_user)
                                            @if($value->id === $formule_user->formule_id)
                                                <span class="badge badge-md bg-secondary">Actuel</span>
                                            @else
                                                <button class="btn btn-outline-success btn-block">
                                                    Souscrire Maintenant
                                                </button>
                                            @endif
                                        @else
                                            @if($value->nom === 'BASIQUE')
                                                <span class="badge badge-md bg-secondary">Actuel</span>
                                            @else
                                                <button class="btn btn-outline-success btn-block">
                                                    Souscrire Maintenant
                                                </button>
                                            @endif
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
    </div>

<script>
    function showNoAnnoncesAlert(marque) {
        Swal.fire("Information", "Il n'y a pas d'annonces disponibles pour la marque " + marque, "info");
    }
</script>


@endsection
