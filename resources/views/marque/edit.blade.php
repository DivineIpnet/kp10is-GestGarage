@extends('template')

@section('content')

    <h2>Modifier une marque</h2>

    <form action="{{ route('marque.update', $marque->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{ $marque->nom}}" class="form-control" id="nom" >
      </div>


      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
