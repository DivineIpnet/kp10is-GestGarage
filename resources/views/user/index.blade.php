@extends('template')

@section('content')
        <h2>Liste des user</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach ( $users as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email}}</td>
            <td>{{ $value->password }}</td>
            <td>{{ $value->role }}</td>
            <td>
                <form action="{{ route('users.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('users.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
