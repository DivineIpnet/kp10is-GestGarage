@extends('admin.templatead')

@section('content')

    <h2>Modifier un user</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name}}" class="form-control" id="name" >
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

     <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email}}" class="form-control" id="email" >
        @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
     <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" value="{{ $user->password}}" class="form-control" id="password" >
        @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
     <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" value="{{ $user->role}}" class="form-control" id="role" >
        @error('role')
              <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>


      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

@endsection
