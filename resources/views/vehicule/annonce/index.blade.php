@extends('app')

@section('titre', 'Annonces')

@section('menu_haut')

<li class="dropdown notification-dropdown">
    <a class=" nk-quick-nav-icon" data-bs-toggle="modal" data-bs-target="#modalSearch">
        <em class="icon ni ni-search"></em>
        <span class="fs-15px"></span>
    </a>
</li>

@endsection

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <div class="nk-block" hidden>
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview">
                                <div class="card-inner text-center rounded row g-gs">
                                    <div class="col-12">
                                        <h4>Annonces</h4>
                                    </div>
                                    <div class="col-12">
                                        <form action="#" class="row g-gs">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input placeholder="Model, marque" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input placeholder="Kilométrage" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="input-group">
                                                            <input id="min-price" placeholder="prix min" type="tel" class="form-control form-control-sm">
                                                            <input id="max-price" placeholder="prix max" type="tel" class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-white btn-md btn-dim btn-outline-success ">
                                                        <em class="ni ni-search"></em>
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
                <div class="nk-block">
                    <ul class="filter-button-group mb-4 pb-1">
                        <li>
                            <button class="filter-button active" data-filter="*" type="button">
                                Tout
                            </button>
                        </li>
                        @foreach($types as $value)
                        <li>
                            <button class="filter-button" data-filter=".{{$value->nom}}" type="button">
                                {{$value->nom}} 
                            </button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="row g-gs filter-container" data-animation="true">
                        @foreach($anns as $ann)
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 filter-item {{$ann->type_marque}}" data-category="{{$ann->type_marque}}">
                            <div class="card ">
                                <div class="card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                    <a href="{{route('index_detail',$ann->uuid)}}">
                                        <img style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($ann->photo) }}" />
                                    </a>
                                    <ul class="product-badges">
                                        <li>
                                            <span class="badge @php echo $ann->type_annonce === 'vente' ? 'bg-info' : 'bg-warning'; @endphp">
                                                <em class="icon ni ni-cc-alt2"></em>
                                                <span>{{$ann->type_annonce}}</span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-inner pt-0 pb-2" style="height:105px;padding-left: 5px;padding-right: 5px;">
                                    <ul class="product-tags">
                                        <li>
                                            <a class="fs-13px">
                                                <em class="icon ni ni-map-pin-fill"></em>
                                                <span>{{$ann->ville}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="product-title text-dark fs-12px" style="margin-top: -5px;">
                                        <a href="{{route('index_detail',$ann->uuid)}}">
                                            {{$ann->marque}}
                                            {{$ann->model}}
                                            {{$ann->annee}}
                                        </a>
                                    </p>
                                    <div class="h6 fs-13px text-warning" style="margin-top: -13px;">
                                        {{$ann->prix.' Fcfa'}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
</div>

<div class="modal fade zoom" tabindex="-1" id="modalSearch">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body ">
                <form action="#" class="row g-gs">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics1">
                                Marque
                            </label>
                            <div class="form-control-wrap ">
                                <select class="form-select js-select2" data-placeholder="Selectionner">
                                    <option value=""></option>
                                    @foreach($marques as $value)
                                    <option value="{{$value->id}}">{{$value->marque}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics2">
                                Model
                            </label>
                            <div class="form-control-wrap">
                                <input placeholder="Entrer le model" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group" id="rech_autre">
                            <label class="form-label" for="fv-topic3">
                                Type
                            </label>
                            <div class="form-control-wrap ">
                                <select class="form-select js-select2" data-placeholder="Selectionner">
                                    <option value=""></option>
                                    @foreach($types as $value)
                                    <option value="{{$value->id}}">{{$value->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="rech_annee">
                        <div class="form-group">
                            <label class="form-label" for="cp1-team-size">Année</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" id="annee" data-placeholder="selectionner">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="rech_km">
                        <div class="form-group">
                            <label class="form-label" for="fv-topic3">
                                Kilométrage
                            </label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input id="min-km" placeholder="min" type="tel" class="form-control" maxlength="7">
                                    <input id="max-km" placeholder="max" type="tel" class="form-control" maxlength="7">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topic3">
                                Prix ( Fcfa )
                            </label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input id="min-prix" placeholder="min" type="tel" class="form-control">
                                    <input id="max-prix" placeholder="max" type="tel" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-white btn-md btn-dim btn-outline-danger ">
                                <em class="icon ni ni-cross-circle"></em>
                                <span>Fermer</span>
                            </button>
                            <button type="submit" class="btn btn-white btn-md btn-dim btn-outline-success ">
                                <span>Recherche</span>
                                <em class="icon ni ni-search"></em>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/app/js/annonce/search.js') }}"></script>

@endsection
