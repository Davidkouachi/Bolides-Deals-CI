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
			                        <th>Vue</th>
			                        <th>Date de création</th>
			                        <th></th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <tr>
			                        <td class="nk-tb-col " style="width: 50px;">
			                        	
			                        </td>
			                        <td class="nk-tb-col">
			                        	
			                        </td>
			                        <td class="nk-tb-col">
			                        	
			                        </td>
			                        <td class="nk-tb-col">
			                        	
			                        </td>
			                        <td class="nk-tb-col">
			                        	
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
										                        	<a data-bs-toggle="modal" data-bs-target="#modalInfo" href="#">
										                        		<em class="icon ni ni-eye"></em>
										                        		<span>Motif</span>
										                        	</a>
										                        </li>
										                        <li>
										                        	<a>
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


<div class="modal fade zoom" tabindex="-1" id="modalInfo">
    <div class="modal-dialog modal-md" role="document" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informations</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-body">
                <div class="gy-3">
				    <div class="row g-1 align-center">
				        <div class="col-lg-12 row">
				            <div class="col-lg-5 col-md-4 col-6">
				                <div class="form-group ">
				                    <label class="form-label-etat" style="font-size: 14px;">
				                        Motif :
				                    </label>
				                </div>
				            </div>
				            <div class="col-lg-7 col-md-8 col-6">
				                <div class="form-group ">
				                    <span class="fw-normal text-dark" style="font-size: 14px;">
				                        
				                    </span>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection