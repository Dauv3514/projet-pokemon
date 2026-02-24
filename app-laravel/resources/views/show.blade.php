@extends('layouts.app')

@section('content')

<div class="pokemon-show-container">

    <div class="pokemon-show-card">

        {{-- Image --}}
        <img
            src="{{ asset('images/' . strtolower($pokemon->name) . '.png') }}"
            alt="{{ $pokemon->name }}"
            onerror="this.src='{{ asset('images/default.png') }}';"
            class="pokemon-show-img"
        />

        {{-- Nom --}}
        <h2 class="pokemon-show-name">
            {{ $pokemon->name }}
        </h2>

        {{-- Infos --}}
        <ul class="pokemon-stats">
            <li>
                <strong>Type(s) :</strong>
                {{ $pokemon->types->pluck('name')->map(fn($t) => ucfirst($t))->join(', ') ?: 'Inconnu' }}
            </li>
            <li><strong>HP:</strong> {{ $pokemon->hp }}</li>
            <li><strong>Atk:</strong> {{ $pokemon->attack }}</li>
            <li><strong>Def:</strong> {{ $pokemon->defense }}</li>
            <li><strong>Sp. Atk:</strong> {{ $pokemon->sp_attack }}</li>
            <li><strong>Sp. Def:</strong> {{ $pokemon->sp_defense }}</li>
            <li><strong>Spd:</strong> {{ $pokemon->speed }}</li>
            <li><strong>Taille :</strong> {{ $pokemon->height_m }} m</li>
            <li><strong>Poids :</strong> {{ $pokemon->weight_kg }} kg</li>
            <li><strong>Génération :</strong> {{ $pokemon->generation }}</li>
            <li><strong>Légendaire :</strong> {{ $pokemon->is_legendary ? 'Oui' : 'Non' }}</li>
        </ul>

        {{-- Ajouter au deck --}}
        @auth
            <form method="POST"
                  action="{{ route('decks.addPokemon', $decks->first()) }}"
                  class="pokemon-form">

                @csrf

                <input type="hidden" name="pokemon_id" value="{{ $pokemon->id }}">

                {{-- Deck --}}
                <div style="margin-bottom:10px;">
                    <label class="pokemon-label">Choisir un deck :</label>
                    <select name="deck_id"
                            required
                            class="pokemon-select">
                        @foreach($decks as $deck)
                            <option value="{{ $deck->id }}">
                                {{ $deck->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Quantité --}}
                <div style="margin-bottom:10px;">
                    <label class="pokemon-label">Nombre :</label>
                    <input type="number"
                           name="quantity"
                           value="1"
                           min="1"
                           max="15"
                           class="pokemon-input">
                </div>

                {{-- Bouton bleu --}}
                <button type="submit" class="btn-blue">
                    Ajouter au deck
                </button>

            </form>
        @endauth

    </div>

</div>

@endsection