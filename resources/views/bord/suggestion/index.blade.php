@extends('app')

@section('titre', 'Suggestions')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Suggestions
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			            <table class="datatable-init table">
			                <thead>
			                    <tr>
			                        <th style="width: 50px;">
			                        	N°
			                        </th>
			                        <th>Nom</th>
			                        <th>Email</th>
			                        <th>lu</th>
			                        <th>Date d'envoi</th>
			                        <th></th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($suggs as $key => $sugg)
			                    <tr>
			                        <td class="nk-tb-col " style="width: 50px;">
			                        	{{$key+1}}
			                        </td>
			                        <td class="nk-tb-col">
			                        	{{$sugg->nom}}
			                        </td>
			                        <td class="nk-tb-col">
			                        	{{$sugg->email}}
			                        </td>
			                        <td class="nk-tb-col 
				                        @php
				                        	if ($sugg->lu === 'oui') {
				                        		echo "text-success";
				                        	} else {
				                        		echo "text-danger";
				                        	}
				                        @endphp ">
			                        	{{$sugg->lu}}
			                        </td>
			                        <td class="nk-tb-col">
			                        	{{ \Carbon\Carbon::parse($sugg->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
			                        </td>
			                        <td class="nk-tb-col d-flex">
			                            <div class="nk-tb-col-tools">
										    <ul class="nk-tb-actions gx-1 my-n1">
										        <li class="me-n1">
										            <div class="dropdown">
										            	<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
										            		<em class="icon ni ni-more-h"></em>
										            	</a>
										                <div class="dropdown-menu dropdown-menu-end">
										                    <ul class="link-list-opt no-bdr">
										                        <li>
										                        	<a data-bs-toggle="modal" data-bs-target="#modalInfo{{$sugg->id}}">
										                        		<em class="icon ni ni-eye"></em>
										                        		<span>Détail</span>
										                        	</a>
										                        </li>
										                        <li>
										                        	<a data-bs-toggle="modal" data-bs-target="#modalFil{{$sugg->id}}" >
										                        		<em class="icon ni ni-file"></em>
										                        		<span>Ficher</span>
										                        	</a>
										                        </li>
										                    </ul>
										                </div>
										            </div>
										        </li>
										    </ul>
										</div>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>
        </div>
    </div>
</div>

@section('btn_lateral')

@endsection


@foreach ($suggs as $sugg)
<div class="modal fade zoom" tabindex="-1" id="modalInfo{{ $sugg->id }}">
    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <div class="gy-3">
				    <div class="row g-1 align-center">
				    	<div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Date d'envoi :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ \Carbon\Carbon::parse($sugg->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Nom :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{$sugg->nom}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Email :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{$sugg->email}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Lu :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal
				                    	@php
			                        		if ($sugg->lu === 'oui') {
			                        			echo 'text-success';
			                        		}else{
			                        			echo 'text-danger';
			                        		}
			                        	@endphp
				                    " style="font-size: 14px;">
				                        {{$sugg->lu}}
				                    </span>
				                </div>
				            </div>
				        </div>
				        <div class="col-lg-12 row">
				            <div class="col-12">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Message :
				                    </label>
				                </div>
				            </div>
				            <div class="col-12">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        {{ $sugg->message }}
				                    </span>
				                </div>
				            </div>
				        </div>
				        @if($sugg->lu === 'non')
				        <div class="col-lg-12 text-center">
				            <a href="{{route('send_sugg', $sugg->id)}}" class="btn btn-md btn-dim btn-success" >
                                <span>Bien lu</span>
                                <em class="icon ni ni-send"></em>
                            </a>
				        </div>
				        @endif
				    </form>
				</div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($suggs as $sugg)
    <div class="modal fade zoom" tabindex="-1" id="modalFil{{ $sugg->id }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" data-simplebar>
                @if ($sugg->file_nom != '')
                    @php
                        $fileExtension = pathinfo($sugg->file_nom, PATHINFO_EXTENSION);
                    @endphp
                    
                    @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ asset('storage/pdf/'.$sugg->file_nom) }}" alt="Image" width="100%" height="auto">
                    @elseif ($fileExtension == 'pdf')
                        <embed src="{{ asset('storage/pdf/'.$sugg->file_nom) }}" type="application/pdf" width="100%" height="1100px">
                    @else
                        <p class="text-center mt-2"> Fichier non supporté </p>
                    @endif
                @else
                    <p class="text-center mt-2"> Aucun fichier </p>
                @endif
            </div>
        </div>
    </div>
@endforeach


@endsection