@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail Proprietaire</h2>
            </div>

        </div>
    </div>

    <div class="row">
         <div class="">
             <div class="form-group">
                 <strong>Nom:</strong>
                 {{ $proprietaire->nom }}
             </div>
            <div class="form-group">
                <strong>Prenom:</strong>
                {{ $proprietaire->prenom }}
            </div>
             <div class="form-group">
                <strong>Telephone:</strong>
                {{ $proprietaire->telephone }}
             </div>
             <div class="form-group">
                 <strong>Adresse:</strong>
                 {{ $proprietaire->adresse }}
             </div>
         </div>
    </div>
    <a href="{{ route('proprietaire.index')}}" class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">Voir la liste</a>

@endsection
