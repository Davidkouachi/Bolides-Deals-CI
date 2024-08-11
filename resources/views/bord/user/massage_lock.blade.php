@extends('app')

@section('titre', 'Compte Vérouillé')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
        	<div class="nk-block">
                <div class="row g-gs">
				    <div class="col-lg-12">
				        <div class=" form-group alert alert-pro alert-danger text-center">
				            <div class="alert-text">
				                <img height="200" width="200" src="{{asset('images/logo/logo.png')}}">
				                <h3 class="nk-block-title page-title text-danger">
				                    Compte Vérouillé
				                </h3>
				                <p>Your order has been successfully placed for diposit. Your will be redirect for make your payment. </p>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
        </div>
    </div>
</div>

@endsection