<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GestionGarage</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style1.css')}}" />

    </head>
    <body>
        <div  class="row na"  style="background-color: #707170; color: black;" >

            @if (Route::has('login'))

            <div id="wrap" >
                <ul class="navbar">
                   <li class="">
                   <br>
                     <strong style="text-align:center; font-size:18px; color:white;">GestionGarage</strong>
                  </li>
                  <li class="">
                      <a  href="{{ route('voiture.home')}}">Acceuil <span class="sr-only">(current)</span></a>
                  </li>
                @auth
                    <li >
                         <a  href="#">Proprietaire</a>
                         <ul class="">
                            <li class="">
                                <a  href="{{ route('proprietaire.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a href="{{ route('proprietaire.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>
                    <li>
                         <a  href="#">Type Voiture</a>
                         <ul>
                            <li>
                                <a  href="{{ route('typevoiture.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a href="{{ route('typevoiture.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>
                   <li >
                         <a  href="#">Marque</a>
                         <ul>
                            <li>
                                <a  href="{{ route('marque.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a  href="{{ route('marque.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>
                   <li >
                         <a  href="#">Modele</a>
                         <ul>
                            <li>
                                <a  href="{{ route('modele.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a  href="{{ route('modele.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>
                   <li >
                         <a  href="#">Piece</a>
                         <ul>
                            <li>
                                <a href="{{ route('piece.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a href="{{ route('piece.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>
                     <li >
                         <a href="#">Voiture</a>
                         <ul>
                            <li>
                                <a href="{{ route('voiture.create')}}">Ajouter </a>
                            </li>
                            <li>
                                <a href="{{ route('voiture.index')}}">Liste </a>
                            </li>
                         </ul>
                    </li>

                    @if(Auth::user()->role == 'admin')
                   <li >
                         <a href="{{ route('admin')}}">Admin </a>
                    </li>
                    @endif
                   <li >
                        <form method="POST" action="{{ route('logout') }}">
                         @csrf
                             <x-jet-dropdown-link href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); this.closest('form').submit();">
                                   Logout
                             </x-jet-dropdown-link>
                         </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login')}}" class="btn btn-primary">SignIn</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register')}}" class="btn btn-primary">SignUP</a>
                        </li>
                    @endif
                @endif
                </ul>
            </div>
            @endif

        </div>
<br>

        <div class='container' style="background-color:;">
            @yield('content')
        </div>
        <script></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
