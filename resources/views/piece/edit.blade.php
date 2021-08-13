@extends('template')

@section('content')

    <h2>Modifier une piece</h2>

    <form action="{{ route('piece.update', $piece->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{ $piece->nom}}" class="form-control" id="nom" >
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
