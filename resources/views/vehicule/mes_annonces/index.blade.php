@extends('app')

@section('titre', 'Mes Annonces')

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
                <div class="nk-block" >
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview">
                                <div class="card-inner text-center rounded row g-gs">
                                    <div class="col-12">
                                        <h4>Mes Annonces</h4>
                                    </div>
                                    <div class="col-12" style="margin-top: -20px;" hidden>
                                        <div class="card-inner">
                                            <ul class="nav nav-tabs nav-tabs-s2 mt-n2">
                                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tabVente">Ventes</a></li>
                                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tabLocation">Locations</a></li>
                                            </ul>
                                            <div class="tab-content text-center">
                                                <div class="tab-pane active" id="tabVente">
                                                    <div class="row g-gs">
                                                        <div class="col">
                                                            <div class="amount">En ligne</div>
                                                            <div class="title">28.49%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="amount">Hors ligne</div>
                                                            <div class="title">7m 28s</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="amount">Indisponible</div>
                                                            <div class="title">3.98K</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabLocation">
                                                    <div class="row g-gs">
                                                        <div class="col">
                                                            <div class="amount">En ligne</div>
                                                            <div class="title">28.49%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="amount">Hors-ligne</div>
                                                            <div class="title">7m 28s</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="amount">Indisponible</div>
                                                            <div class="title">3.98K</div>
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
                <div class="nk-block">
                    <ul class="filter-button-group mb-4 pb-1">
                        <li>
                            <button class="filter-button active trans_shado" data-filter="*" type="button">
                                Tout
                            </button>
                        </li>
                        @foreach($types as $value)
                        <li>
                            <button class="filter-button trans_shado" data-filter=".{{$value->nom}}" type="button">
                                {{$value->nom}} 
                            </button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="row g-gs filter-container" data-animation="true">
                        @if($anns->isNotEmpty())
                            @foreach($anns as $ann)
                            {{-- <div class="filter-item  {{$ann->type_marque}}" data-category="{{$ann->type_marque}}" style="width: 195px;"> filter-button-group --}}
                            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 filter-item {{$ann->type_marque}}" data-category="{{$ann->type_marque}}">
                                <div class="card product-card trans_shado img_annonce" @if($ann->type_annonce === 'vente') style="border-bottom: 5px solid #058efc;" @else style="border-bottom: 5px solid orange;" @endif >
                                    <div class="product-thumb card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
                                        <a href="{{route('index_mesannonces_detail',['id' => Auth::user()->id, 'uuid' => $ann->uuid])}}">
                                            <img style="object-fit: cover;height: 160px; width:auto;" src="{{ Storage::url($ann->photo) }}" />
                                        </a>
                                        <ul class="product-badges">
                                            <li>
                                                <span class="badge 
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
                                            </li>
                                            <li>
                                                <span class="badge bg-danger">
                                                        <em class="icon ni ni-img"></em>
                                                        <span>{{$ann->nbre_photo}}</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="badge bg-secondary">
                                                    <em class="icon ni ni-eye"></em>
                                                    <span>{{$ann->views.' vue(s)'}}</span>
                                                </span>
                                            </li>
                                            @if($ann->type_annonce === 'vente' && $ann->credit_auto === 'oui')
                                                <li>
                                                    <span class="badge bg-success">
                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                        <span>Crédit Auto</span>
                                                    </span>
                                                </li>
                                            @endif
                                        </ul> 
                                    </div>
                                    <div class="card-inner pt-0 pb-2 text-center" style="height:145px;padding-left: 5px;padding-right: 5px;">
                                        <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                            <div class="user-avatar md sq p-2 border bg-white rounded-circle @php echo $ann->type_annonce === 'vente' ? 'border-info border-2' : 'border-warning border-2'; @endphp ">
                                                <img src="{{ Storage::url($ann->marque_photo) }}" style="object-fit: cover;background: transparent;">
                                            </div>
                                            {{-- <div class="user-avatar sm sq" style="background: transparent;margin-left: 0px;">
                                                <img src="{{asset('images/logo/certificat/certification-logo-2.png')}}" style="object-fit: cover;background: transparent;">
                                            </div> --}}
                                        </div>
                                        <ul class="product-tags">
                                            <li>
                                                <a class="fs-13px">
                                                    <em class="icon ni ni-map-pin-fill"></em>
                                                    <span>{{$ann->ville}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="product-title text-dark fs-12px text-center" style="margin-top: -5px;">
                                            <a href="{{route('index_mesannonces_detail',['id' => Auth::user()->id, 'uuid' => $ann->uuid])}}">
                                                {{$ann->marque}}
                                                {{$ann->model}}
                                                {{$ann->annee}}
                                            </a>
                                        </p>
                                        <div class="h6 fs-13px text-warning text-center" style="margin-top: -13px;">
                                            {{$ann->prix.' Fcfa'}}
                                        </div>
                                        <span class="text-soft text-center">
                                            {{\Carbon\Carbon::parse($ann->refresh_date)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p class="text-muted">Vous n'avez aucune annonce.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="nk-block">
                    <div>
                        @if ($anns->hasPages())
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($anns->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        <span class="page-link" aria-hidden="true">Prev</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $anns->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($anns->links()->elements as $element)
                                    @if (is_string($element))
                                        {{-- "Three Dots" Separator --}}
                                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($anns->lastPage() > 10)
                                                @if ($page == $anns->currentPage())
                                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                                @elseif ($page <= 3 || $page > $anns->lastPage() - 3 || abs($page - $anns->currentPage()) <= 1)
                                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                @elseif ($page == 4 || $page == $anns->lastPage() - 3)
                                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                                @endif
                                            @else
                                                <li class="page-item {{ $page == $anns->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($anns->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $anns->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                        <span class="page-link" aria-hidden="true">Next</span>
                                    </li>
                                @endif
                            </ul>
                        @endif
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
                <form action="{{ route('index_mesannonces') }}" class="row g-gs" method="get">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics1">
                                Type d'annonces
                            </label>
                            <div class="form-control-wrap">
                                <select name="type_annonce" class="form-select js-select2" data-placeholder="Selectionner" id="type_annonce">
                                    <option value=""></option>
                                    <option selected value="tout" {{ $filterTypeAnnonce == 'tout' ? 'selected' : '' }} >
                                        Tout
                                    </option>
                                    <option value="vente" {{ $filterTypeAnnonce == 'vente' ? 'selected' : '' }}>
                                        Vente
                                    </option>
                                    <option value="location" {{ $filterTypeAnnonce == 'location' ? 'selected' : '' }}>
                                        Location
                                    </option>
                                </select>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        $('#type_annonce').on('change', function() {
                                            var selectedValue = $(this).val();

                                            if (selectedValue == 'vente') {
                                                document.getElementById('div_vneuf').style.display = 'block';
                                            } else {
                                                document.getElementById('div_vneuf').style.display = 'none';
                                                $('select[name="vneuf"]').val('tout').trigger('change');
                                            }
                                        });

                                        // Trigger the change event on page load
                                        $('#type_annonce').trigger('change');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="div_vneuf" style="display: none;">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics1">
                                Véhicule neuf ou d'occasion
                            </label>
                            <div class="form-control-wrap">
                                <select name="vneuf" class="form-select js-select2" data-placeholder="Selectionner">
                                    <option value=""></option>
                                    <option selected value="tout" {{ $filterNeuf == 'tout' ? 'selected' : '' }} >
                                        Tout
                                    </option>
                                    <option value="oui" {{ $filterNeuf == 'oui' ? 'selected' : '' }}>
                                        Véhicule neuf
                                    </option>
                                    <option value="non" {{ $filterNeuf == 'non' ? 'selected' : '' }}>
                                        Véhicule d'occasion
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics1">
                                Statut
                            </label>
                            <div class="form-control-wrap">
                                <select name="statut" class="form-select js-select2" data-placeholder="Selectionner">
                                    <option value=""></option>
                                    <option selected value="tout" {{ $filterStatut == 'tout' ? 'selected' : '' }} >
                                        Tout
                                    </option>
                                    <option value="hors ligne" {{ $filterStatut == 'hors ligne' ? 'selected' : '' }}>
                                        Hors ligne
                                    </option>
                                    <option value="en ligne" {{ $filterStatut == 'en ligne' ? 'selected' : '' }}>
                                        En ligne
                                    </option>
                                    <option value="vendu" {{ $filterStatut == 'vendu' ? 'selected' : '' }}>
                                        Vendu
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topics1">
                                Marque
                            </label>
                            <div class="form-control-wrap">
                                <select name="marque" class="form-select js-select2" data-placeholder="Selectionner">
                                    <option value=""></option>
                                    <option selected value="tout" {{ $filterMarqueId == 'tout' ? 'selected' : '' }} >
                                        Tout
                                    </option>
                                    @foreach($marques as $value)
                                    <option value="{{ $value->id }}" {{ $value->id == $filterMarqueId ? 'selected' : '' }}>
                                        {{ $value->marque }}
                                    </option>
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
                                <input name="model" placeholder="Entrer le model" type="text" class="form-control" value="{{ old('model', $filterModel) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="rech_annee">
                        <div class="form-group">
                            <label class="form-label" for="cp1-team-size">Année</label>
                            <div class="form-control-wrap">
                                <select name="annee" class="form-select js-select2" data-placeholder="selectionner">
                                    <option value=""></option>
                                    <!-- Ajoutez les années disponibles ici, en marquant la valeur sélectionnée -->
                                    <option selected value="tout" {{ $filterAnnee == 'tout' ? 'selected' : '' }} >
                                        Tout
                                    </option>
                                    @foreach(range(date('Y'), 2000) as $year)
                                    <option value="{{ $year }}" {{ $year == $filterAnnee ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                    @endforeach
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
                                    <input name="km_min" id="min-km" placeholder="min" type="tel" class="form-control" maxlength="7" value="{{ old('km_min', $filterKmMin) }}">
                                    <input name="km_max" id="max-km" placeholder="max" type="tel" class="form-control" maxlength="7" value="{{ old('km_max', $filterKmMax) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="fv-topic3">
                                Prix (Fcfa)
                            </label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input name="prix_min" id="min-prix" placeholder="min" type="tel" class="form-control" value="{{ old('prix_min', $filterPrixMin) }}">
                                    <input name="prix_max" id="max-prix" placeholder="max" type="tel" class="form-control" value="{{ old('prix_max', $filterPrixMax) }}">
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

@if (session('suppr'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire("Succés!", "{{session('suppr')}}", "success");
        });
    </script>
    @php session()->forget('suppr'); @endphp
@endif

@endsection