@extends('template')

@section('content')

    <h2>Modifier un proprietaire</h2>

    <form action="{{ route('proprietaire.update', $proprietaire->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{ $proprietaire->nom}}" class="form-control" id="nom">
      </div>
      <div class="form-group">
        <label for="pren">Prenom</label>
        <input type="text" name="prenom" value="{{ $proprietaire->prenom}}" class="form-control" id="pren" >
      </div>
      <div class="form-group">
        <label for="tel">Telephone</label>
        <input type="number" name="telephone" value="{{ $proprietaire->telephone}}" class="form-control" id="tel" >
      </div>
      <div class="form-group">
         <label for="add">Adresse</label>
         <input type="text" name="adresse" value="{{ $proprietaire->adresse}}" class="form-control" id="add">
      </div>

      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
