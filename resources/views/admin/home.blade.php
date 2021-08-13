@extends('admin.templatead')

@section('titr')
    <h4 id="dash">ACCUEIL</h4>
@endsection

@section('content')
    <div>

        <div class="row">
            <div class="col-12">
                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de voiture
                    <br>
                    {{$nbrsV}}
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de marque
                    <br>
                    {{$nbrsMark}}
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de modele
                    <br>
                    {{$nbrsMod}}
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de client
                    <br>
                    {{$nbrsPro}}
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de piece
                    <br>
                    {{$nbrsP}}
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 som">
                    Nombre de type
                    <br>
                    {{$nbrsType}}
                </div>

            </div>
        </div>

        <!--div class="row diag" style="width:95%; height:400px;">
            <canvas id="myChart"></canvas>
        </div-->

        <div class="row diag" style="width:95%; height:400px;">
            <canvas id="hist"></canvas>
        </div>
        <div class="row diag" style="width:95%; height:400px;">
            <canvas id="graphlin"></canvas>
        </div>
        <div class="row diag" style="width:95%; height:400px;">
            <canvas id="sect"></canvas>
        </div>
        <div class="row diag" style="width:95%; height:400px;">
            <canvas id="point"></canvas>
        </div>
       <div class="row">

        </div>
<br>
        <div class="row">
            <table class="table">
                <tr>
                    <th>Pieces</th>
                    <th>Nombre de voiture</th>
                </tr>
                @foreach($pieces as $ps)
                <tr>
                    <td>{{$ps->nom}}</td>
                    <td>{{$ps->voitures->count()}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection


        <script>
        window.onload = () => {
               var ctx = document.getElementById('hist');
               var dt=<?php echo $datas;?>;
               var lab=<?php echo $labels;?>;
               var hist = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: lab,
                        datasets: [
                            {
                                label: 'Nombre de Voiture',
                                data: dt,
                                backgroundColor: 'dodgerblue'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                          legend: {
                            position: 'top',
                          },
                          title: {
                            display: true,
                            text: 'Histogramme'
                          }
                        },
                        scales: {
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    steps: 2,
                                    stepValue: 2,
                                    max: 20
                                }
                            }]
                        }
                    }
                });
            }
            </script>

