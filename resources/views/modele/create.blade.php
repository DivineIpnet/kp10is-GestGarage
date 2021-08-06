@extends('template')

@section('content')
<div  style="height: 400px; width: 80%; margin-left:auto; margin-right:auto;">
    <h2>Ajouter un modele</h2>
    <br>

    @if ($errors->any())
          <div class="alert alert-danger">
             <ul>
             </ul>
     @endif

    <form action="{{ route('modele.store')}}" method="POST" style="background-color:#dadce0;" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" name="nom" class="form-control" id="nom" >
          @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
      <div class="form-group">
         <label for="ann">Annee</label>
         <input type="number" name="annee" class="form-control" id="ann" placeholder="Annee">
          @error('annee')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

       <div class="form-group">
        <label for="mark">Marque</label>
        <select name="marque_id" id="mark" class="form-control">
        @foreach($marques as $marque)
            <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
        @endforeach
        </select>
          @error('marque_id')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
