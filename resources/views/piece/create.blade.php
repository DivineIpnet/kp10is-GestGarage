@extends('template')

@section('content')
<div  style="height: 400px; width: 80%; margin-left:auto; margin-right:auto;">
    <h2>Ajouter une piece</h2>
    <br>

    @if ($errors->any())
          <div class="alert alert-danger">
             <ul>
             </ul>
     @endif

    <form action="{{ route('piece.store')}}" method="POST" style="background-color:#dadce0;" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
          <label for="nom">nom</label>
          <input type="text" name="nom" class="form-control" id="nom" >
          @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
       <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
