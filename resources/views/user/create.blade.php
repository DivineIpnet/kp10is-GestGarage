@extends('admin.templatead')

@section('titr')
    <h4 id="dash">Utilisateur</h4>
@endsection
@section('content')
<div  style="height: 400px; width: 80%; margin-left:auto; margin-right:auto;">
    <h2>Ajouter un utilisateur</h2>
    <br>

    @if ($errors->any())
          <div class="alert alert-danger">

             <ul>
             @foreach($errors->all() as $error)
                <li>
                {{$error}}
                </li>
             @endforeach
             </ul>

     @endif

    <form action="{{ route('users.store')}}" method="POST" style="background-color:#dadce0;" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" name="name" class="form-control" id="nom" >
          @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email">
        @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirmer Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
        @error('password_confirmation')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" class="form-control" id="role">
        @error('role')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
