@extends('app')

@section('titre', 'Paiements')

@section('content')

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">

                <div class="nk-block ">
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-preview">
                                    <div class="card-inner text-center rounded">
                                        <img height="200" width="200" src="{{asset('images/logo/logo.png')}}">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="sdk">
                        <button class="btn btn-primary" onclick="checkout()">Checkout</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '36190578066c674ca2f6243.66046219',//   YOUR APIKEY
                site_id: '5878395',//YOUR_SITE_ID
                mode: 'PRODUCTION',
                close_after_response: true,
                notify_url: 'http://127.0.0.1:8000/paiement',
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(),
                amount: 100,
                currency: 'XOF',
                channels: 'ALL',
                description: 'Test de paiement',
                customer_name:"Joe",//Le nom du client
                customer_surname:"Down",//Le prenom du client
                customer_email: "down@test.com",//l'email du client
                customer_phone_number: "088767611",//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "Antananarivo",// La ville du client
                customer_country : "CM",// le code ISO du pays
                customer_state : "CM",// le code ISO l'état
                customer_zip_code : "06510", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    NioApp.Toast("<h5>Erreur</h5><p>Votre paiement a échoué.</p>", "error", {position: "top-center"});
                } else if (data.status == "ACCEPTED") {
                    NioApp.Toast("<h5>Succès</h5><p>Votre paiement a été effectué avec succès.</p>", "success", {position: "top-center"});
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
            CinetPay.onClose(function(data) {
                if (data.status === "REFUSED") {
                    NioApp.Toast("<h5>Erreur</h5><p>Votre paiement a échoué.</p>", "error", {position: "top-center"});
                } else if (data.status === "ACCEPTED") {
                    NioApp.Toast("<h5>Succès</h5><p>Votre paiement a été effectué avec succès.</p>", "success", {position: "top-center"});
                } else {
                    NioApp.Toast("<h5>Information</h5><p>Fermeture du guichet.</p>", "info", {position: "top-center"});
                }
                window.location.reload();
            });
        }
    </script>


@endsection
