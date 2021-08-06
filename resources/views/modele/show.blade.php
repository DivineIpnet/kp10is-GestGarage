@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail modele</h2>
            </div>

        </div>
    </div>

    <div class="row">

         <div class="">
             <div class="form-group">
                 <strong>Nom:</strong>
                 {{ $modele->nom }}
             </div>
            <div class="form-group">
                <strong>Annee:</strong>
                {{ $modele->annee }}
            </div>
             <div class="form-group">
                <strong>Marque:</strong>
                {{ $modele->marque_id }}
             </div>
         </div>
    </div>
    <a href="{{ route('modele.index')}}" class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">Voir la liste</a>

@endsection
