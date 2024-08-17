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

                                    <a class="btn btn-outline-info btn-dim mt-2" data-bs-toggle="modal" data-bs-target="#modalAnnoncemodif" >
                                        <span>Modifier l'annonce</span>
                                        <em class="icon ni ni-edit"></em>
                                    </a>
                                    <a id="suppr_ann" class="btn btn-outline-danger btn-dim mt-2" >
                                        <span>Supprimer l'annonce</span>
                                        <em class="icon ni ni-trash"></em>
                                    </a>
                                    <a class="btn btn-outline-warning btn-dim mt-2" data-bs-toggle="modal" data-bs-target="#modalAnnoncerefresh">
                                        <span>Renouveler l'annonce</span>
                                        <em class="icon ni ni-reload"></em>
                                    </a>
                                    <a id="vendu_ann" class="btn btn-outline-success btn-dim mt-2" >
                                        <span>Article vendu</span>
                                        <em class="icon ni ni-check-circle-cut"></em>
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

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center row g-gs">
        <div class="col-12" >
            <img id="modalImage" src="" class="img-fluid" alt="Large Image" style="width: auto; height: auto;">
        </div>
    </div>
</div>

<div class="modal fade" id="modalAnnoncerefresh" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Renouveler l'annonce
                </h5>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name-1">
                                    Full Name
                                </label>
                                <div class="form-control-wrap">
                                    <input required data-msg="Error message" class="form-control" id="full-name-1" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">
                                    Email address
                                </label>
                                <div class="form-control-wrap">
                                    <input class="form-control" id="email-address-1" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="phone-no-1">
                                    Phone No
                                </label>
                                <div class="form-control-wrap">
                                    <input class="form-control" id="phone-no-1" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="pay-amount-1">
                                    Amount
                                </label>
                                <div class="form-control-wrap">
                                    <input class="form-control" id="pay-amount-1" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">
                                    Communication
                                </label>
                                <ul class="custom-control-group g-3 align-center">
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="com-email-1" type="checkbox">
                                            <label class="custom-control-label" for="com-email-1">
                                                Email
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="com-sms-1" type="checkbox">
                                            <label class="custom-control-label" for="com-sms-1">
                                                SMS
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="com-phone-1" type="checkbox">
                                            <label class="custom-control-label" for="com-phone-1">
                                                Phone
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">
                                    Payment Methods
                                </label>
                                <ul class="custom-control-group g-3 align-center">
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="pay-card-1" type="checkbox">
                                            <label class="custom-control-label" for="pay-card-1">
                                                Card
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="pay-bitcoin-1" type="checkbox">
                                            <label class="custom-control-label" for="pay-bitcoin-1">
                                                Bitcoin
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-checkbox">
                                            <input class="custom-control-input" id="pay-cash-1" type="checkbox">
                                            <label class="custom-control-label" for="pay-cash-1">
                                                Cash
                                            </label>
                                            </input>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-mw btn-dim btn-outline-danger" type="reset" data-bs-dismiss="modal">
                                    Annulée
                                </button>
                                <button class="btn btn-mw btn-dim btn-outline-success" type="submit">
                                    Poster
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">
                    Annonce
                </span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAnnoncemodif" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Modifier l'annonce
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-validate">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name-1">
                                        Full Name
                                    </label>
                                    <div class="form-control-wrap">
                                        <input required data-msg="Error message" class="form-control" id="full-name-1" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address-1">
                                        Email address
                                    </label>
                                    <div class="form-control-wrap">
                                        <input class="form-control" id="email-address-1" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no-1">
                                        Phone No
                                    </label>
                                    <div class="form-control-wrap">
                                        <input class="form-control" id="phone-no-1" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="pay-amount-1">
                                        Amount
                                    </label>
                                    <div class="form-control-wrap">
                                        <input class="form-control" id="pay-amount-1" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Communication
                                    </label>
                                    <ul class="custom-control-group g-3 align-center">
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="com-email-1" type="checkbox">
                                                <label class="custom-control-label" for="com-email-1">
                                                    Email
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="com-sms-1" type="checkbox">
                                                <label class="custom-control-label" for="com-sms-1">
                                                    SMS
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="com-phone-1" type="checkbox">
                                                <label class="custom-control-label" for="com-phone-1">
                                                    Phone
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Payment Methods
                                    </label>
                                    <ul class="custom-control-group g-3 align-center">
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="pay-card-1" type="checkbox">
                                                <label class="custom-control-label" for="pay-card-1">
                                                    Card
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="pay-bitcoin-1" type="checkbox">
                                                <label class="custom-control-label" for="pay-bitcoin-1">
                                                    Bitcoin
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" id="pay-cash-1" type="checkbox">
                                                <label class="custom-control-label" for="pay-cash-1">
                                                    Cash
                                                </label>
                                                </input>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-mw btn-dim btn-outline-danger" type="reset" data-bs-dismiss="modal">
                                        Annulée
                                    </button>
                                    <button class="btn btn-mw btn-dim btn-outline-success" type="submit">
                                        Poster
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text">
                        Annonce
                    </span>
                </div>
            </div>
        </div>
</div>

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

<script src="{{asset('assets/js/app/js/annonce/photo_view.js') }}"></script>


@endsection


