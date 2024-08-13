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
                            <div class="col-lg-12 ">
                                <div class="slider-init row product-slider mb-3" data-slick='{"slidesToShow": 5, "centerMode": false, "slidesToScroll": 1, "infinite":false, "adaptiveHeight":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 5}},{"breakpoint": 1240,"settings":{"slidesToShow": 4}}, {"breakpoint": 999,"settings":{"slidesToShow": 3}},{"breakpoint": 650,"settings":{"slidesToShow": 1}} ]}'>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/car.jpg')}}" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/logo/selects/car.jpg') }}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;"> 
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/immeuble.jpg')}}" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{asset('images/logo/selects/immeuble.jpg')}}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/Daewoo.jpg')}}" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{asset('images/logo/Daewoo.jpg')}}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;"> 
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/outside-guide-grand-canyon_h.webp')}}" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{asset('images/logo/outside-guide-grand-canyon_h.webp')}}" style="height: auto; width:auto; object-fit: cover; cursor: pointer;"> 
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/car.jpg')}}"> 
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/car.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/car.jpg')}}"> 
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100" style=" display: flex;justify-content: center;align-items: center;">
                                            <img style="height: auto; width:auto; object-fit: cover;" src="{{asset('images/logo/selects/car.jpg')}}"> 
                                        </div>
                                    </div>
                                </div>
                                <h5 class="product-price text-warning">
                                    999.999.999 Fcfa
                                </h5>
                                <h5 class="product-title">
                                    Classy Modern Smart watch
                                </h5>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="product-details entry me-xxl-3">
                                    <h3>
                                        Product details of Comfy cushions
                                    </h3>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Neque porro quisquam est, qui dolorem consectetur, adipisci velit.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.
                                    </p>
                                    <ul class="list list-sm list-checked">
                                        <li>
                                            Meets and/or exceeds performance standards.
                                        </li>
                                        <li>
                                            Liumbar support.
                                        </li>
                                        <li>
                                            Made of bonded teather and poiyurethane.
                                        </li>
                                        <li>
                                            Metal frame.
                                        </li>
                                        <li>
                                            Anatomically shaped cork-latex
                                        </li>
                                        <li>
                                            As attractively priced as you look attractive in one
                                        </li>
                                    </ul>
                                    <p>
                                        Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.
                                    </p>
                                    <h3>
                                        The best seats in the house
                                    </h3>
                                    <p>
                                        I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings. Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae.
                                    </p>
                                    <div class="alert alert-fill alert-warning alert-icon" role="alert">    
                                        <em class="icon ni ni-alert-fill"></em>     
                                        <strong> Conseils de sécurité !!! </strong>
                                        <br> 
                                        <ul>
                                            <li>1- N'envoyer pas de paiement sans avoir vérifié le véhicule ou l'identité du vendeur</li>
                                            <li>2- Rencontrer de préference le vendeur dans un lieu public fréquenté ou dans un parc automobile</li>
                                            <li>3- Etre accompagner de son mecanicien, pour des vérifications approfondie du véhicule</li>
                                        </ul>
                                    </div>

                                    <a class="btn btn-white btn-outline-danger btn-dim mt-2" data-bs-toggle="modal" data-bs-target="#modalSignal">
                                        <em class="icon ni ni-thumbs-down"></em>
                                        <span>Signaler le vendeur</span>
                                    </a>
                                    <a class="btn btn-white btn-outline-info btn-dim mt-2" data-bs-toggle="modal" data-bs-target="#modalContact">
                                        <span>Voir contact</span>
                                        <em class="icon ni ni-user"></em>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <img height="150px" width="150px" src="{{ $imgqr }}" alt="Code QR">
                            </div>
                            <div class="col-12 mt-2">
                                <a class="btn btn-white btn-outline-light btn-dim " data-bs-toggle="modal" data-bs-target="#modalPartager">
                                    <span>Partager l'annonce</span>
                                    <em class="icon ni ni-share"></em>
                                </a>
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
                                    <a href="{{route('index_detail')}}">
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
                                        <a href="{{route('index_detail')}}">
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

<div class="modal fade zoom" tabindex="-1" id="modalContact">
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
                            <a class="btn btn-outline-success btn-dim btn-block" href="https://wa.me/?text={{ $data_qrcode }}" target="_blank" >
                                <em class="icon ni ni-whatsapp"></em>
                                <span>WahtsApp</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-primary btn-dim btn-block" href="https://www.facebook.com/sharer/sharer.php?u=https://exemple.com" target="_blank">
                                <em class="icon ni ni-facebook-circle"></em>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li class="col-lg-12">
                            <a class="btn btn-outline-warning btn-dim btn-block" href="sms:?body=Votre%20message%20ic%20https://exemple.com" target="_blank">
                                <em class="icon ni ni-chat"></em>
                                <span> Sms </span>
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
                <h5 class="modal-title">Motif(s)</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="#" class="form-validate">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="default-textarea">Motif</label>
                        <div class="form-control-wrap">
                            <textarea name="text" class="form-control no-resize" id="default-textarea" required data-msg="Error message re"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customFileLabel">Fichier (facultatif)</label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">Choisir un fichier</label>
                            </div>
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
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
        <img id="modalImage" src="" class="img-fluid" alt="Large Image" style="width: auto; height: auto;">
    </div>
</div>

<script src="{{asset('assets/js/app/js/annonce/photo_view.js') }}"></script>


@endsection


