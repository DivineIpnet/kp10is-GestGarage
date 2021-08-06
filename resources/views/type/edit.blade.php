@extends('template')

@section('content')

    <h2>Modifier un type de voiture</h2>

    <form action="{{ route('typevoiture.update', $typevoiture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{ $typevoiture->nom}}" class="form-control" id="nom" >
      </div>

      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
