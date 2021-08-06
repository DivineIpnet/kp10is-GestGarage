@extends('template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail user</h2>
            </div>

        </div>
    </div>

    <div class="row">
         <div class="">
             <div class="form-group">
                 <strong>Name:</strong>
                 {{ $user->name }}
             </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
             <div class="form-group">
                 <strong>Password:</strong>
                 {{ $user->password }}
             </div>
             <div class="form-group">
                 <strong>Role:</strong>
                 {{ $user->role }}
             </div>
         </div>
    </div>
    <a href="{{ route('user.index')}}" class="btn btn-primary btn-lg" style="margin-left:auto; margin-right:auto; margin-top:100px;">Voir la liste</a>

@endsection
