@extends('app')

@section('titre', 'Statistique')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-body">

            <div class="nk-block-head nk-page-head nk-block-head-sm">
                <div class="nk-block-head-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">
                            Statistique
                        </h3>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="nk-block-head" hidden>
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Solid Line Chart</h4>
                        <div class="nk-block-des">
                            <p>A line chart is a way of plotting data points on a line. Often, it is used to show trend data, or the comparison of two data sets.</p>
                        </div>
                    </div>
                </div>
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="card-title-group mb-3">
                            <div class="card-title ">
                                <h6 class="title">
                                    Tendances des annonces
                                </h6>
                                <div class="form-group align-items-center mt-4 w-50">
                                    <div class="form-control-wrap">
                                        <label for="">Année</label>
                                        <select id="yearSelect" class="form-select js-select2" data-placeholder="Année">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" style="height: 300px;">
                            <canvas class="" id="camenber"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="card-head text-center">
                                    <h6 class="title">Statut Actuel</h6>
                                </div>
                                <div class="card-tools" style="height: 400px;">
                                    <canvas class="" id="camenber2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-full">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Top 10 des vues</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner pt-0" data-simplebar style="height: 400px;">
                                <ul class="gy-4">
                                    @foreach($anns as $key => $value)
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent">
                                                <img src="{{ Storage::url($value->photo) }}" alt="{{ $value->marque }}" class="thumb">
                                            </div>
                                            <div class="ms-2">
                                                <div class="lead-text">
                                                    {{$value->marque}}
                                                    {{$value->model}}
                                                    {{$value->annee}}
                                                </div>
                                                <div class="sub-text">{{$value->prix.' Fcfa'}}</div>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="sub-text me-2">{{$value->views.' vues'}}</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-full">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Top 10 des Véhicules Chers</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner pt-0" data-simplebar style="height: 400px;">
                                <ul class="gy-4">
                                    @foreach($canns as $key => $value)
                                    <li class="justify-between align-center border-bottom border-0 border-dashed">
                                        <div class="align-center">
                                            <div class="user-avatar sq bg-transparent">
                                                <img src="{{ Storage::url($value->photo) }}" alt="{{ $value->marque }}" class="thumb">
                                            </div>
                                            <div class="ms-2">
                                                <div class="lead-text">
                                                    {{$value->marque}}
                                                    {{$value->model}}
                                                    {{$value->annee}}
                                                </div>
                                                <div class="sub-text">{{$value->prix.' Fcfa'}}</div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/apexcharts.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var yearSelect = document.getElementById('yearSelect');
            var currentYear = new Date().getFullYear();
            var startYear = 2024; // Commencer à partir de 2021

            for (var year = currentYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                if (year === currentYear) {
                    option.selected = true; // Sélectionner automatiquement l'année en cours
                }
                yearSelect.appendChild(option);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            fetchData();

            $(document).ready(function() {
                $('#yearSelect').on('change', function() {
                    fetchData();
                });
            });

            function fetchData() {

                var annee = $('#yearSelect').val();

                $.ajax({
                    url: "{{ route('stat_anne') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: { annee: annee },
                    success: function(data) {
                        updateChart(data);
                    },
                    error: function(error) {
                        console.error('Erreur:', error);
                    }
                });
            }

            function updateChart(data) {
                var dynamicFields = document.getElementById("camenber");

                // Supprimer le contenu existant
                while (dynamicFields.firstChild) {
                    dynamicFields.removeChild(dynamicFields.firstChild);
                }

                const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

                var ctx = document.getElementById('camenber').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [
                            {
                                label: 'Total des Annonces ('+data.total_annonces+')',
                                data: data.vente.map((v, i) => v + data.location[i]), // Assurez-vous que 'total_annonces' est fourni dans la réponse JSON
                                fill: false,
                                borderColor: 'rgb(242, 66, 110)', // Couleur noire pour le total des annonces
                                tension: 0.4
                            },
                            {
                                label: 'Vente Total ('+data.total_vente+')',
                                data: data.vente,
                                fill: false, // Activer le remplissage pour l'effet de zone
                                // backgroundColor: 'rgba(0, 0, 255, 0.3)',
                                borderColor: 'rgb(5, 142, 252)',
                                tension: 0.4
                            },
                            {
                                label: 'Location Total ('+data.total_location+')',
                                data: data.location,
                                fill: false, // Activer le remplissage pour l'effet de zone
                                // backgroundColor: 'rgba(255, 165, 0, 0.3)',
                                borderColor: 'rgb(253, 151, 34)',
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    },
                }); 
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            StatData();

            function StatData() {
                $.ajax({
                    url: "{{ route('stat_statut') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        StatChart(data);
                    },
                    error: function(error) {
                        console.error('Erreur:', error);
                    }
                });
            }

            function StatChart(data) {
                var dynamicFields = document.getElementById("camenber2");

                // Supprimer le contenu existant
                while (dynamicFields.firstChild) {
                    dynamicFields.removeChild(dynamicFields.firstChild);
                }

                var ctx = document.getElementById('camenber2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['En ligne ('+data.total_ligne+')', 'Hors ligne ('+data.total_hligne+')', 'Indisponible ('+data.total_indispo+')'],
                        datasets: [
                            {
                                label: 'Statuts des annonces',
                                data: [data.total_ligne, data.total_hligne, data.total_indispo],
                                backgroundColor: ['rgb(15, 202, 122)', 'rgb(242, 66, 110)', 'rgb(253, 151, 34)'],
                                borderColor: ['rgb(15, 202, 122)', 'rgb(242, 66, 110)', 'rgb(253, 151, 34)'],
                                borderWidth: 1,
                                borderColor: 'white',
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    },
                }); 
            }
        });
    </script>



@endsection