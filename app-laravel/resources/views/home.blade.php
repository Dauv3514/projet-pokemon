@extends('layouts.app')

@section('content')

<div class="page-container">

    <h1 class="page-title">
        Liste des Pokémons
    </h1>

    <div class="filters">

        <form method="GET" action="{{ route('home') }}" id="filterForm">
            <select name="type" onchange="document.getElementById('filterForm').submit()">
                <option value="">Tous les types</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                        {{ ucfirst($type->name) }}
                    </option>
                @endforeach
            </select>
        </form>

        @auth
        <div style="margin-top:15px; display:flex; gap:12px; justify-content:center;">
            
            <a href="{{ route('decks.create') }}" class="btn-primary">
                Créer un deck
            </a>

            <a href="{{ route('decks.index') }}" class="btn-primary">
                Voir mes decks
            </a>

        </div>
        @endauth

    </div>

    <div class="pokemon-grid">

        @foreach($pokemons as $pokemon)

            <div class="pokemon-card-wrapper">

                <a href="{{ route('pokemons.show', $pokemon) }}" style="text-decoration:none; color:inherit;">
                    <div class="pokemon-card">

                        <img
                            src="{{ $pokemon->image }}"
                            alt="{{ $pokemon->name }}"
                            onerror="this.src='{{ asset('images/default.png') }}';"
                        />

                        <div>
                            <div class="pokemon-name">
                                {{ $pokemon->name }}
                            </div>

                            <ul class="pokemon-stats">
                                <li>HP: {{ $pokemon->hp }}</li>
                                <li>Atk: {{ $pokemon->attack }}</li>
                                <li>Def: {{ $pokemon->defense }}</li>
                                <li>Spd: {{ $pokemon->speed }}</li>
                            </ul>
                        </div>

                    </div>
                </a>
            </div>

        @endforeach

    </div>

</div>

@endsection