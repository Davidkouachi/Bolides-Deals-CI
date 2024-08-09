@extends('app')

@section('titre', 'Marques de véhicules')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Marques
                        </h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
			    <div class="row g-gs align-items-center justify-content-center">
			        <div class="col-lg-6">
			            <div class="card h-100">
			                <div class="card-inner">
			                    <div class="card-head">
			                        <h5 class="card-title">Formulaire</h5>
			                    </div>
			                    <form id="form" action="{{route('trait_marque')}}" class="row g-gs" method="post" enctype="multipart/form-data">
			                    	@csrf
			                    	<div class="col h-50" >
									    <div class="">
									        <div class="card" style="display: flex;justify-content: center;align-items: center;border:block; height: 150px;">
									            <a>
									                <img id="imagePreview" style="object-fit: cover;height: 150px;" class="" src="" />
									            </a>
									            <ul class="product-badges" id="removeButton">
									                <li>
									                    <a class="btn btn-icon btn-danger btn-sm">
									                        <em class="icon ni ni-cross"></em>
									                    </a>
									                </li>
									            </ul>
									        </div>
									    </div>
									</div>

                                    <div class="col-12" >
					                    <div class="form-group">
					                        <div class="form-control-wrap">
					                            <input name="image" required type="file" id="imageInput" style="width:120px;" accept="image/*">
					                        </div>
					                    </div>
				                    </div>
				                    <div class="col-12" >
					                    <div class="form-group">
					                        <div class="form-control-wrap">
					                            <input name="marque" class="form-control" required type="text" oninput="this.value = this.value.toUpperCase()" placeholder="Entrer la Marque"/>
					                        </div>
					                    </div>
				                    </div>
				                    <div class="col-12" >
				                        <div class="form-group row g-gs">
	                                        <div class="col-6 text-center">
	                                            <button type="reset" class="btn btn-mw btn-dim btn-outline-danger" id="btn_reset">
	                                                <em class="icon ni ni-plus-circle"></em>
	                                                <span>Remise à Zéro</span>
	                                            </button>
	                                        </div>
	                                        <div class="col-6 text-center">
	                                            <button class="btn btn-mw btn-dim btn-outline-success " type="submit">
	                                                <span>Sauvgarder</span>
	                                                <em class="icon ni ni-arrow-right-circle"></em>
	                                            </button>
	                                        </div>
	                                    </div>
                                    </div>
			                    </form>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
            <div class="nk-block">
			    <div class="card card-preview">
			        <div class="card-inner">
			            <table class="datatable-init table">
			                <thead>
			                    <tr>
			                        <th>N°</th>
			                        <th>Image</th>
			                        <th>Marque</th>
			                        <th>Date de création</th>
			                        <th>
			                        	
			                        </th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($marques as $key => $value)
			                    <tr>
			                        <td class="nk-tb-col" >
			                        	{{ $key+1}}
			                        </td>
			                        <td class="nk-tb-col" >
                                        <div class="user-avatar md sq" style="background: transparent;">
                                            <img src="{{asset('storage/images/'.$value->image_nom)}}" alt="{{$value->marque}}" class="thumb">
                                        </div>
			                        </td>
			                        <td class="nk-tb-col" >
			                        	{{ $value->marque}}
			                        </td>
			                        <td class="nk-tb-col" >
			                        	{{ \Carbon\Carbon::parse($value->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}
			                        </td>
			                        <td class="nk-tb-col" >
			                        	<a href="" class="btn btn-white btn-dim btn-warning btn-sm">
                                            <em class="icon ni ni-edit" ></em>
                                        </a>
                                        <a href="" class="btn btn-white btn-dim btn-danger btn-sm">
                                            <em class="icon ni ni-trash" ></em>
                                        </a>
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

<script src="{{asset('assets/js/app/js/download_image_marque_vehicule.js') }}"></script>

@endsection