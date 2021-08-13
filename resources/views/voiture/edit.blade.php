@extends('template')

@section('content')

    <h2>Modifier une voiture</h2>

    <form action="{{ route('voiture.update', $voiture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group">
          <label for="img">Image</label>
          <img src="/storage/{{ $voiture->image }}">
          <input type="hidden" name="image" value="{{ $voiture->image }}">
          <input type="file" name="update_image" class="form-control" id="img">
      </div>
      <div class="form-group">
        <label for="matric">Matricule</label>
        <input type="text" name="matricule" value="{{ $voiture->matricule}}" class="form-control" id="matric" placeholder="Matricule">
      </div>

       <div class="form-group">
          <label for="stat">Status</label>
          <select name="status" value="{{ $voiture->status}}" id="stat" class="form-control">
             <option value="" disabled>Status</option>
             <option value="En vente">En vente</option>
             <option value="En reparation">En reparation</option>
             <option value="A detacher">A detacher</option>
             <option value="En depot">En depot</option>
          </select>
       </div>

     <div class="form-group">
        <label for="type">Type de Voiture</label>
        <select name="type_voiture_id" value="{{ $voiture->type_voiture_id}}" class="form-control" id="type">
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
        <select name="marque_id" value="{{ $voiture->marque_id}}" class="form-control" id="mark">
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
        <select name="proprietaire_id" value="{{ $voiture->proprietaire_id}}" class="form-control" id="prop">
            @foreach($proprietaires as $prop)
                <option value="{{ $prop->id }}">{{ $prop->nom }}</option>
            @endforeach
        </select>
        @error('proprietaire_id')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="piece">Piece</label>
        <select name="piece_id" value="{{ $voiture->piece_id}}" class="form-control" id="piece">
            @foreach($pieces as $piece)
                <option value="{{ $piece->id }}">{{ $piece->nom }}</option>
            @endforeach
        </select>
        @error('piece_id')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>


      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
