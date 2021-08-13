@extends('template')

@section('content')
        <h2>Liste des pieces</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        @foreach ( $pieces as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nom }}</td>
            <td>
                <form action="{{ route('piece.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('piece.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('piece.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
