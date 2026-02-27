@extends('layouts.app')

@section('content')

<div class="admin-container">

    <h1 class="admin-title">Espace Administration</h1>

    <div class="admin-grid">

        <a href="{{ route('admin.types.index') }}" class="admin-card">
            <h2>Gestion des Types</h2>
            <p>Créer, modifier et supprimer des types.</p>
        </a>

        <a href="{{ route('admin.pokemons.index') }}" class="admin-card">
            <h2>Gestion des Pokémons</h2>
            <p>Administrer les pokémons (CRUD).</p>
        </a>

    </div>

</div>

@endsection