<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Admin</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style2.css" />
        <link rel="stylesheet" href="/css/chart/Chart.min.css" />

	</head>

	<body>
		<div class="">
			<div class="row header" style="background-color:#6495ED;">
				<div class="header-left">
                        <span>GestionGarage</span>
				</div>
				<ul class="nav user-menu float-right">
				</ul>
			</div>
			<br>
			<div class="row">
                <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2" style="background-color: #778899; marding:; padding:0px;" id="sidebar">
                    <div id="sidebar-menu" style="background-color: #778899; marding:0px; padding:0px;" class="sidebar-menu">
                        <ul>
                            <li class="active">
                                <a href="#" class="hom">
                                    <span>Dashboard</span>
                                </a>

                            </li>
                            <li class="">
                                <a>
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
                                <a>
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
                                <a>
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
                                <a>
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
                                <a>
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
                                <a>
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
                            </li>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-9 col-lg-10 page-wrapper" style="background-color: #DCDCDC;" >
                    @yield('content')
                </div>
            </div>
		</div>
            <script src="/js/chart/Chart.min.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20','21', '22','23', '24', '25', '26', '27', '28', '29', '30'],
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
               var ctx = document.getElementById('hist');
               const labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15'];
                var nombre= <?php echo $nbr; ?>;
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Nombre de Voiture',
                                data:,
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
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            </script>
            <script>
                var ctx = document.getElementById('graphlin').getContext('2d');
                const labelss = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15'];
                var graphlin = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labelss,
                        datasets: [
                            {
                                label: 'Voiture',
                                data: [2,8,5,9,8,7,3,2,9,8]
                            },
                            {
                                 label: 'Piece',
                                 data: [3,8,4,9,8,4]
                             },
                            {
                                label: 'Modele',
                                data: [1,2,3,4,5,6,7,8,9]
                            },
                            {
                                label: 'Marque',
                                data: [9,8,7,6,5,4,3,2,1]
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
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            </script>
            <script>
                var ctx = document.getElementById('sect').getContext('2d');
                var sect = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['piece1', 'piece2', 'piece3'],
                        datasets: [
                            {
                                label: 'Voiture',
                                data: [2,8,5,9,8,7,3,2,9,8]
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
//                 const labels = Utils.months({count: 7});
                var point = new Chart(ctx, {
                    type: 'scatter',
                    data: {
                        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15'],
                        datasets: [
                            {
                                label: 'Voiture',
                                data: [2,8,5,9,8,7,3,2,9,8]
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
		</body>


	</html>

