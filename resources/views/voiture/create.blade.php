@extends('template')

@section('content')
<div  style="height: 400px; width: 80%; margin-left:auto; margin-right:auto;">
    <h2>Ajouter une voiture</h2>
    <br>

    @if ($errors->any())
          <div class="alert alert-danger">
             <ul>
             </ul>
     @endif

    <form action="{{ route('voiture.store')}}" method="POST" style="background-color:#dadce0;" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
          <label for="img">Image</label>
          <input type="file" name="image" class="form-control" id="img" >
          @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
      <div class="form-group">
        <label for="matric">Matricule</label>
        <input type="text" name="matricule" class="form-control" id="matric" placeholder="Matricule">
        @error('matricule')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
       <div class="form-group">
        <label for="stat">Status</label>
        <select name="status" id="stat" class="form-control">
       		<option value="" disabled>Status</option>
            <option value="En vente">En vente</option>
            <option value="En reparation">En reparation</option>
            <option value="A detacher">A detacher</option>
            <option value="En depot">En depot</option>
        </select>
          @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group">
        <label for="type">Type de Voiture</label>
        <select name="type_voiture_id" class="form-control" id="type">
            @foreach($typevoitures as $type)
                <option value="{{ $type->id }}">{{ $type->nom }}</option>
            @endforeach
        </select>
        @error('type_voiture_id')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="mark">Marque</label>
        <select name="marque_id" class="form-control" id="mark">
            @foreach($marques as $marque)
                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
            @endforeach
        </select>
        @error('marque_id')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="prop">Proprietaire</label>
        <select name="proprietaire_id" class="form-control" id="prop">
            @foreach($proprietaires as $prop)
                <option value="{{ $prop->id }}">{{ $prop->nom }}</option>
            @endforeach
        </select>
        @error('proprietaire_id')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
