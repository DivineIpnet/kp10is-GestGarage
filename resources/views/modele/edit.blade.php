@extends('template')

@section('content')

    <h2>Modifier un modele</h2>

    <form action="{{ route('modele.update', $modele->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{ $modele->nom}}" class="form-control" id="nom" >
      </div>
      <div class="form-group">
         <label for="ann">Annee</label>
         <input type="number" name="annee" value="{{ $modele->annee}}" class="form-control" id="ann" >
      </div>
       <div class="form-group">
          <label for="mark">Marque</label>
          <select name="marque_id" value="{{ $modele->marque_id}}" id="mark" class="form-control">
            @foreach($marques as $marque)
                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
            @endforeach
          </select>
       </div>


      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
