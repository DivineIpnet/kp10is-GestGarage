@extends('template')

@section('content')
        <h2>Liste des voitures</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Matricule</th>
            <th>Status</th>
            <th>Type</th>
            <th>Marque</th>
            <th>Proprietaire</th>
            <th>Piece</th>
            <th>Action</th>
        </tr>
        @foreach ( $voitures as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->matricule }}</td>
            <td>{{ $value->status }}</td>
            <td>{{ $value->type_voiture_id}}</td>
            <td>{{ $value->marque->nom }}</td>
            <td>{{ $value->proprietaire->nom }}</td>
            <td>{{ $value->piece->nom }}</td>
            <td>
                <form action="{{ route('voiture.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('voiture.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('voiture.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
