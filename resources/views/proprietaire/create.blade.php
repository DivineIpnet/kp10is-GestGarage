@extends('template')

@section('content')
<div  style="height: 400px; width: 80%; margin-left:auto; margin-right:auto;">
    <h2>Ajouter un proprietaire</h2>
    <br>

    @if ($errors->any())
          <div class="alert alert-danger">
             <ul>
             </ul>
     @endif

    <form action="{{ route('proprietaire.store')}}" method="POST" style="background-color:#dadce0;" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
          @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
      <div class="form-group">
        <label for="pren">Prenom</label>
        <input type="text" name="prenom" class="form-control" id="pren" placeholder="Prenom">
        @error('prenom')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="tel">Telephone</label>
        <input type="number" name="telephone" class="form-control" id="tel">
          @error('telephone')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
        <label for="add">Adresse</label>
        <input type="text" name="adresse" class="form-control" id="add" placeholder="Adresse">
          @error('adresse')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
