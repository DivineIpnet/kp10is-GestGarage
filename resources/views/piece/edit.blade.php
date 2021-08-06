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
       <div class="form-group">
          <label for="voit">Voiture</label>
          <select name="voiture_id" value="{{ $piece->voiture_id}}" id="voit" class="form-control">
             @foreach($voitures as $voiture)
                  <option value="{{$voiture->id}}">{{$voiture->nom}}</option>
             @endforeach

          </select>
       </div>


      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
