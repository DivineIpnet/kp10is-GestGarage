@extends('template')

@section('content')
    <div  style="background-image: url({{ asset('image/tof2.jpg')}});  height: 400px; width: 100%">
        <div style="text-align: center;">
        @auth('web')
            <!--a href="{{ route('voiture.index')}}" class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">Voir la liste</a-->

            <h2>Bienvenu sur votre application de gestion de Garage</h2>

        @endauth
        @guest()
        Veuillez vous connecter pour utiliser l application
        <a href="{{ route('register')}}"  class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">creer un user</a>

        @endguest
        </div>

@endsection
