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
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <span class="badge badge-md rounded-pill @php echo $ann->type_annonce === 'vente' ? 'bg-info' : 'bg-warning'; @endphp">
                                                <em class="icon ni ni-cc-alt2"></em>
                                                <span>{{ ucfirst($ann->type_annonce) }}</span>
                                            </span>
                                            <div class="user-avatar xl sq mt-2" style="background: transparent;">
                                                <span class="tb-product">
                                                    <img height="110px" width="110px" style="object-fit: cover;" class="thumb" src="{{ Storage::url($ann->marque_photo) }}">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
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
                            <div class="col-lg-12 mt-2">
                                <div class="product-details entry me-xxl-3">
                                    <h5 class="mb-2" >
                                        Caractéristiques :
                                    </h5>
                                    <ul class="list list-sm list-checked mb-3">
                                        <li>
                                            <b>Marque</b> : {{$ann->marque}}.
                                        </li>
                                        <li>
                                            <b>Model</b> : {{$ann->model}}.
                                        </li>
                                        <li>
                                            <b>Version</b> : {{$ann->version}}.
                                        </li>
                                        <li>
                                            <b>Année</b> : {{$ann->annee}}.
                                        </li>
                                        <li>
                                            <b>Kilométrage</b> : {{$ann->kilometrage.' KM'}}.
                                        </li>
                                        <li>
                                            <b>Transmission</b> : {{$ann->transmission}}.
                                        </li>
                                        <li>
                                            <b>Type de carburant</b> : {{$ann->type_carburant}}.
                                        </li>
                                        <li>
                                            <b>Puissance fiscale</b> : {{$ann->puiss_fiscal.' CV'}}.
                                        </li>
                                        <li>
                                            <b>Cylindré</b> : {{$ann->cylindre}}.
                                        </li>
                                        <li>
                                            <b>Couleur</b> : {{$ann->couleur}}.
                                        </li>
                                        <li>
                                            <b>Hors taxe</b> : {{$ann->hors_taxe}}.
                                        </li>
                                        <li>
                                            <b>Neuf</b> : {{$ann->neuf}}.
                                        </li>
                                    </ul>
                                    <h5 class="mb-2" >
                                        Nb :
                                    </h5>
                                    <ul class="list list-sm list-checked mb-3">
                                        <li>
                                            @if($ann->type_annonce === 'vente')
                                                <b>Troc possible</b> : {{$ann->troc}}.
                                            @else
                                                <b>Réduction à partir de </b> : {{$ann->nbre_reduc}}.
                                            @endif
                                        </li>
                                        <li>
                                            <b>le véhicule se déplace</b> : {{$ann->deplace}}.
                                        </li>
                                    </ul>
                                    <h4>
                                        Descriptions / Conditions :
                                    </h4>
                                    <p>
                                        {{$ann->description}}
                                    </p>
                                    <div class="alert alert-fill alert-warning alert-icon" role="alert">    
                                        <em class="icon ni ni-alert-fill"></em>     
                                        <strong> Conseils de sécurité !!! </strong>
                                        <br> 
                                        <ul>
                                            <li>1- Ne faite pas de paiements sans avoir vérifié le véhicule ou l'identité du vendeur</li>
                                            <li>2- Rencontrer de préference le vendeur dans un lieu public fréquentés ou dans un parc automobiles</li>
                                            <li>3- Etre accompagner de son mecanicien, pour des vérifications approfondies du véhicule</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <h4>
                                                Vendeur
                                            </h4>
                                            @if($ann->photo_user)
                                            <div class="user-avatar xl sq " style="background: transparent;">
                                                <span>
                                                    <img height="110px" width="110px" style="object-fit: cover;" class="thumb" src="{{asset('storage/images/1723922093.01370637-4125-40ff-a3e0-94f8942b6bd4.png')}}">
                                                </span>
                                            </div>
                                            @else
                                            <div class="user-avatar xl sq ">
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
                                                <span class="sub-text">{{$ann->email_user}}</span>
                                                @if($ann->appel)
                                                <a class="btn btn-outline-warning btn-dim btn-sm me-1 mt-1" href="tel:+225{{$ann->appel}}" target="_blank">
                                                    <em class="icon ni ni-call"></em>
                                                    <span> {{'(+225) '.$ann->appel}} </span>
                                                </a>
                                                @endif
                                                @if($ann->whatsapp)
                                                <a class="btn btn-outline-success btn-dim btn-sm me-1 mt-1" href="https://wa.me/+225{{$ann->whatsapp}}" target="_blank">
                                                    <em class="icon ni ni-whatsapp"></em>
                                                    <span> {{'(+225) '.$ann->whatsapp}} </span>
                                                </a>
                                                @endif
                                                @if($ann->sms)
                                                <a class="btn btn-outline-info btn-dim btn-sm me-1 mt-1" href="sms:+225{{$ann->sms}}" target="_blank">
                                                    <em class="icon ni ni-mail"></em>
                                                    <span> {{'(+225) '.$ann->sms}} </span>
                                                </a>
                                                @endif
                                            </div>
                                            <div class="row g-gs user-info" >
                                                <div class="col-12 mt-2">
                                                    <img height="120px" width="120px" src="{{ $imgqr }}" alt="Code QR">
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <a class="btn btn-white btn-outline-light btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalPartager">
                                                        <span>Partager le lien</span>
                                                        <em class="icon ni ni-share"></em>
                                                    </a>
                                                    <a class="btn btn-white btn-outline-danger btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalSignal">
                                                        <em class="icon ni ni-thumbs-down"></em>
                                                        <span>Signaler le vendeur</span>
                                                    </a>
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
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">
                                Annonces similaires
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="slider-init row product-slider" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 2, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 2}} ]}'>
                    <div class="col ">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="">
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
            </div>
        </div>
    </div>
</div>

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
                            <a class="btn btn-outline-success btn-dim btn-block" href="https://wa.me/?text={{ urlencode($data_qrcode) }}" target="_blank">
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
                            <a class="btn btn-outline-info btn-dim btn-block" href="https://twitter.com/intent/tweet?text={{ urlencode($data_qrcode) }}" target="_blank">
                                <em class="icon ni ni-twitter"></em>
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-primary btn-dim btn-block" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($data_qrcode) }}" target="_blank">
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

<div class="modal fade" tabindex="-1" id="modalAlert">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross"></em>
            </a> 
            <div class="modal-body modal-body-lg text-center">
                <div class="nk-modal">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                    <h4 class="nk-modal-title">Vendeur signalé!</h4>
                    <div class="nk-modal-action"><a href="#" class="btn btn-white btn-lg btn-mw btn-outline-success btn-dim" data-bs-dismiss="modal">OK</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalSignal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Motif</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form id="form" method="post" action="" class="">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Motif</label>
                        <div class="form-control-wrap">
                            <textarea name="text" class="form-control no-resize" required ></textarea>
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
                <span class="sub-text">Signaler le vendeur</span>
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


@endsection


