<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Admin</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style2.css" />
        <link rel="stylesheet" href="/css/chart/Chart.min.css" />
        <!--link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css")}}"-->

	</head>

	<body>
		<div class="">
			<div class="row header" >
			@if (Route::has('login'))

                <span style="float: left;" id="nom">GestionGarage</span>

				<ul class="nav user-menu" style="float: right; text-align: center;">
				@auth
				    <li style="float: right;">
                        <form method="POST" action="{{ route('logout') }}">
                         @csrf
                             <x-jet-dropdown-link href="{{ route('logout') }}" class="btn " onclick="event.preventDefault(); this.closest('form').submit();">
                                   Logout
                             </x-jet-dropdown-link>
                         </form>
				    </li>
				@else
				    <li style="float: left;">
				        <a style="float: left;" href="{{ route('login')}}" class="btn ">SignIn</a>
				    </li>
				    @if (Route::has('register'))
                        <li style="float: right;">
                            <a href="{{ route('register')}}" class="btn ">SignUP</a>
                        </li>
                    @endif
                @endif
				</ul>
			@endif
			</div>
			<br>
			<div class="row">
                <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2 side" >
                    <div id="sidebar-menu" style="" class="sidebar-menu">
                    <br>
                        <ul>
                            <li class="active">
                                <a href="{{ route('admin') }}" class="hom">
                                    <span>Dashboard</span>
                                </a>

                            </li>
                            <li class="">
                                <a class="hom">
                                    <span>Utilisateur</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('users.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>
                             <!--li class="">
                                <a class="hom">
                                    <span>Proprietaire</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('proprietaire.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('proprietaire.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="hom">
                                    <span>Type de voiture</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('typevoiture.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('typevoiture.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="hom">
                                    <span>Marque</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('marque.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('marque.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="hom">
                                    <span>Modele</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('modele.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('modele.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="hom">
                                    <span>Piece</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('piece.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('piece.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="hom">
                                    <span>Voiture</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('voiture.create') }}">Ajouter</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('voiture.index') }}">Liste</a>
                                    </li>
                                </ul>
                            </li-->
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-9 col-lg-10 " style="background-color: ;" >
                    <div class="row ti">
                    @yield('titr')
                    </div>

                    @yield('content')
                </div>
            </div>
		</div>
            <script src="/js/chart/Chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>

            <script>

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15'],
                        datasets: [{
                            label: 'Voiture',
                            data: [12, 19, 3, 5, 2, 3,4,8,0,6,12,0,34],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <script>
                var ctx = document.getElementById('graphlin').getContext('2d');
                var lab=<?php echo $labels;?>;
                var dt=<?php echo $datas;?>;
                var dtmd=<?php echo $datasMd;?>;
                var dtm=<?php echo $datasM;?>;
                var dtp=<?php echo $datasP;?>;
                var graphlin = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: lab,
                        datasets: [
                            {
                                label: 'Voiture',
                                data: dt,
                                borderColor: 'dodgerblue',
                                backgroundColor: 'lightblue'
                            },
                            {
                                 label: 'Piece',
                                 data: dtp,
                                 borderColor: 'indianred',
                                 backgroundColor: 'pink'
                             },
                            {
                                label: 'Modele',
                                data: dtmd,
                                borderColor: 'seagreen',
                                backgroundColor: 'lightcyan'
                            },
                            {
                                label: 'Marque',
                                data: dtm,
                                borderColor: 'orchid',
                                backgroundColor: 'lavender'
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
                            text: 'Graphe Lineaire'
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

            </script>
            <script>
                var ctx = document.getElementById('sect').getContext('2d');
                var lab=<?php echo $labelsP;?>;
                var dt=<?php echo $dtp;?>;
                var sect = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: lab,
                        datasets: [
                            {
                                label: 'Voiture',
                                data: dt,
                                borderColor:[
                                     'dodgerblue',
                                     'indianred',
                                     'seagreen',
                                     'orchid',
                                     'indianred',
                                ],
                                backgroundColor:[
                                    'lightblue',
                                    'pink',
                                    'lightcyan',
                                    'lavender',
                                    'pink',
                                ],

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
                            text: 'Secteur'
                          }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
            <script>
                var ctx = document.getElementById('point').getContext('2d');
                var labs = <?php echo $labels;?>;
                var dt2 = <?php echo $datas;?>;
                var dtmd2 = <?php echo $datasMd;?>;
                var dtm2 = <?php echo $datasM;?>;
                var dtp2 = <?php echo $datasP;?>;
                var point = new Chart(ctx, {
                    type: 'scatter',
                    data: {
                        labels: labs,
                        datasets: [
                            {
                                label: 'Voiture',
                                data: dt2,
                                borderColor: 'dodgerblue',
                                backgroundColor: 'lightblue'
                            },
                            {
                                label: 'Modele',
                                data: dtmd2,
                                borderColor: 'seagreen',
                                backgroundColor: 'lightcyan'
                            },
                            {
                                label: 'Marque',
                                data: dtm2,
                                borderColor: 'orchid',
                                backgroundColor: 'lavender'
                            },
                            {
                                label: 'Piece',
                                data: dtp2,
                                borderColor: 'indianred',
                                backgroundColor: 'pink'
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
                            text: 'Nuage de point'
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
            </script>
		</body>


	</html>

