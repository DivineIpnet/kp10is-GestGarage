@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail Voiture</h2>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <img src="/storage/{{ $voiture->image }}" alt="Image de la voiture" width="80%;"/>
        </div>
         <div class="col-xs-6 col-sm-6 col-md-6">
             <div class="form-group">
                 <strong>Matricule:</strong>
                 {{ $voiture->matricule }}
             </div>
            <div class="form-group">
                <strong>Marque:</strong>
                {{ $voiture->marque->nom }}
            </div>
             <div class="form-group">
                 <strong>Type:</strong>
                 {{ $voiture->type_voiture_id }}
             </div>
             <div class="form-group">
                 <strong>Proprietaire:</strong>
                 {{ $voiture->proprietaire->nom }}
             </div>
             <div class="form-group">
                 <strong>Status:</strong>
                 {{ $voiture->status }}
             </div>
         </div>
    </div>
    <a href="{{ route('voiture.index')}}" class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">Voir la liste</a>

@endsection
