<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>GestionVoiture</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <style>
              body {
                    background-color: #e5e5e5;
              }
              ul{
                list-style-type: none;
                font-size: 20px;
              }
              a{
                color: black;
              }
              .na{
                margin: auto;
                padding: auto;
              }
        </style>
    </head>
    <body>

        <div class="row na"  style="background-color: #707170; color: black;" >
            <div class="col-sm-2">
                <a class="navbar-brand" href="#" style="font-size: 25px;"><strong>GestionVoiture</strong></a>
            </div>

            @if (Route::has('login'))

            <div class="col-sm-6" style="margin-right: 10px; position: static;">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ route('voiture.home')}}">Acceuil <span class="sr-only">(current)</span></a>
                     </li>
                @auth

                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('voiture.create')}}">Ajouter</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('voiture.index')}}">Liste</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4" align="right" style="padding-right: 0; padding: 10px; position: static;">
                <form method="POST" action="{{ route('logout') }}">
                   @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                    </x-jet-dropdown-link>
                </form>
              @else
              <a href="{{ route('login')}}" class="btn btn-primary">SignIn</a>
                @if (Route::has('register'))
                    <a href="{{ route('register')}}" class="btn btn-primary">SignUP</a>
                @endif
              @endif

            </div>
          @endif
        </div>
<br>
        <div class='container' style="background-color:;">
            @yield('content')
        </div>
    </body>
</html>
