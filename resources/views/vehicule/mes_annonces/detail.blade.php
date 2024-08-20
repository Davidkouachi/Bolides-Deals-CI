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

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                            <div class="row g-gs user-info" >
                                                <div class="col-12 mt-2">
                                                    @if($ann->statut !== 'vendu')
                                                    <a class="btn btn-outline-info btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalAnnoncemodif" >
                                                        <span>Modifier l'annonce</span>
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                    @endif
                                                    <a id="suppr_ann" class="btn btn-outline-danger btn-dim btn-sm mt-1 me-1" >
                                                        <span>Supprimer l'annonce</span>
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                    @if($ann->statut === 'hors ligne')
                                                    <a class="btn btn-outline-warning btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalAnnoncerefresh">
                                                        <span>Renouveler l'annonce</span>
                                                        <em class="icon ni ni-reload"></em>
                                                    </a>
                                                    @endif
                                                    @if($ann->statut !== 'vendu')
                                                    <a id="vendu_ann" class="btn btn-outline-success btn-dim btn-sm mt-1 me-1" >
                                                        <span>Véhicule vendu</span>
                                                        <em class="icon ni ni-check-circle-cut"></em>
                                                    </a>
                                                    @endif
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img height="120px" width="120px" src="{{ $imgqr }}" alt="Code QR">
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <a class="btn btn-white btn-outline-light btn-dim btn-sm mt-1 me-1" data-bs-toggle="modal" data-bs-target="#modalPartager">
                                                        <span>Partager le lien</span>
                                                        <em class="icon ni ni-share"></em>
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

<script>
    document.getElementById('suppr_ann').addEventListener('click', function(event) {
        event.preventDefault();

        Swal.fire({
                title: "Confirmation?",
                text: "Vous êtes sur de vouloir supprimé cette annonce ?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Oui",
                cancelButtonText: "Non"
        }).then(function(e) {
            e.value && Swal.fire("Succés!", "Annonce supprimée.", "success")
        })
    });
</script>

<script>
    document.getElementById('vendu_ann').addEventListener('click', function(event) {
        event.preventDefault();

        Swal.fire("Succés!", "Article vendu", "success")
    });
</script>

@endsection


