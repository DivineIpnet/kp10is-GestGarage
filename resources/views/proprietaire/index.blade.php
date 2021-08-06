@extends('template')

@section('content')
        <h2>Liste des Proprietaires</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Adresse</th>
            <th>Action</th>
        </tr>
        @foreach ( $proprietaires as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nom }}</td>
            <td>{{ $value->prenom }}</td>
            <td>{{ $value->telephone }}</td>
            <td>{{ $value->adresse }}</td>
            <td>
                <form action="{{ route('proprietaire.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('proprietaire.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('proprietaire.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
