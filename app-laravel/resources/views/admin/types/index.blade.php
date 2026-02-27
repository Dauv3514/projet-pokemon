@extends('layouts.app')

@section('content')

<div class="admin-container">

    <h1>Gestion des Types</h1>

    <a href="{{ route('types.create') }}" class="btn-blue">Créer un Type</a>

    <table class="admin-table">

        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="{{ route('types.edit', $type) }}" class="btn-rename">Modifier</a>

                    <form action="{{ route('types.destroy', $type) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection