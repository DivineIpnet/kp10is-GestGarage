@extends('template')

@section('content')
        <h2>Liste des modele</h2>

    <table class="table" style="background-color:#dadce0;">
        <tr>
            <th>NO</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Marque</th>
            <th>Action</th>
        </tr>
        @foreach ( $modeles as $key=> $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nom }}</td>
            <td>{{ $value->annee }}</td>
            <td>{{ $value->marque->nom }}</td>
            <td>
                <form action="{{ route('modele.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('modele.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('modele.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
