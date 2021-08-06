@extends('template')

@section('content')
        <h2>Liste des marques</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        @foreach ( $marques as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nom }}</td>
            <td>
                <form action="{{ route('marque.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('marque.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('marque.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
