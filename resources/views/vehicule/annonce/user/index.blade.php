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
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title ">
                            Annonces de {{$user->name.' '.$user->prenom}} ({{$anns->count()}})
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block nk-block-lg">
                <div class="nk-block ">
                    <ul class="filter-button-group mb-4 pb-1">
                        <li>
                            <button class="filter-button active" data-filter="*" type="button">
                                Tout
                            </button>
                        </li>
                        @foreach($types as $value)
                        <li>
                            <button class="filter-button" data-filter=".{{ $value->nom }}" type="button">
                                {{ $value->nom }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="row g-gs filter-container " data-animation="true">
                        @if($anns->isNotEmpty())
                            @foreach($anns as $ann)
                            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 filter-item {{$ann->type_marque}}" data-category="{{$ann->type_marque}}">
                                <div class="card product-card">
                                    <div class="product-thumb card h-50 " style="display:flex;justify-content:center;align-items:center;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;">
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
                                    <div class="card-inner pt-0 pb-2 text-center" style="height:145px;padding-left: 5px;padding-right: 5px;">
                                        <div class="user-card d-flex" style="margin-top: -32px;margin-left: 10px;">
                                            <div class="user-avatar md sq p-2 border bg-white rounded-circle ">
                                                <img src="{{ Storage::url($ann->marque_photo) }}" style="object-fit: cover;background: transparent;">
                                            </div>
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
                                            <a href="{{route('index_detail',$ann->uuid)}}">
                                                {{$ann->marque}}
                                                {{$ann->model}}
                                                {{$ann->annee}}
                                            </a>
                                        </p>
                                        <div class="h6 fs-13px text-warning text-center" style="margin-top: -13px;">
                                            {{$ann->prix.' Fcfa'}}
                                        </div>
                                        <span class="text-soft text-center">
                                            {{\Carbon\Carbon::parse($ann->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p class="text-muted">Aucune annonce disponible pour ce vendeur.</p>
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


@endsection
