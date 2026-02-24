@extends('layouts.app')

@section('content')

<div class="deck-container2">
    <h1 class="deck-title">
        {{ $deck->name }}
    </h1>

<div class="deck-content">
    <div class="deck-card">
        <div class="deck-card-header">
            <h2>Pokémons dans le deck</h2>

            <button type="button"
                    class="btn-blue"
                    onclick="openAddPokemonModal()">
                Ajouter
            </button>
        </div>

        @if($deck->pokemons->isEmpty())
            <p>Aucun Pokémon dans ce deck.</p>
        @else

            <ul class="deck-list">

                @foreach($deck->pokemons as $pokemon)

                    <li class="deck-item">

                        <div class="deck-pokemon-info">
                            <img src="{{ asset('images/' . strtolower($pokemon->name) . '.png') }}"
                                 alt="{{ $pokemon->name }}"
                                 class="deck-pokemon-img"
                                 onerror="this.src='{{ asset('images/default.png') }}';">

                            <span class="deck-pokemon-name">
                                {{ $pokemon->name }}
                                x{{ $pokemon->pivot->quantity }}
                            </span>
                        </div>

                        <div class="btns-container">
                            <button type="button"
                                    class="btn-rename"
                                    onclick="openQuantityModal({{ $deck->id }}, {{ $pokemon->id }}, {{ $pokemon->pivot->quantity }})">
                                Modifier
                            </button>

                            <button type="button"
                                    class="btn-delete"
                                    onclick="openDeletePokemonModal({{ $deck->id }}, {{ $pokemon->id }}, '{{ $pokemon->name }}')">
                                Retirer
                            </button>
                        </div>

                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

<div id="quantityModal" class="modal-overlay" style="display:none;">
    <div class="modal-box">

        <h2>Modifier la quantité</h2>

        <form id="quantityForm" method="POST">
            @csrf
            @method('PUT')

            <input type="number"
                   name="quantity"
                   id="quantityInput"
                   min="1"
                   required
                   class="modal-input">

            <div class="modal-actions">
                <button type="button"
                        onclick="closeQuantityModal()"
                        class="btn-cancel">
                    Annuler
                </button>

                <button type="submit"
                        class="btn-save">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deletePokemonModal" class="modal-overlay" style="display:none;">
    <div class="modal-box modal-danger">

        <h2>Supprimer le Pokémon</h2>

        <p id="deletePokemonMessage"></p>

        <form id="deletePokemonForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-actions">

                <button type="button"
                        onclick="closeDeletePokemonModal()"
                        class="btn-cancel">
                    Annuler
                </button>

                <button type="submit"
                        class="btn-danger">
                    Supprimer
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Ajouter Pokémon --}}
<div id="addPokemonModal" class="modal-overlay" style="display:none;">
    <div class="modal-box">

        <h2>Ajouter un Pokémon</h2>

        <form id="addPokemonForm"
              method="POST"
              action="{{ route('decks.pokemons.store', $deck) }}">
            @csrf

            <select name="pokemon_id"
                    class="modal-input"
                    required>
                @foreach($allPokemons as $pokemon)
                    <option value="{{ $pokemon->id }}">
                        {{ $pokemon->name }}
                    </option>
                @endforeach
            </select>

            <input type="number"
                   name="quantity"
                   value="1"
                   min="1"
                   required
                   class="modal-input">

            <div class="modal-actions">

                <button type="button"
                        onclick="closeAddPokemonModal()"
                        class="btn-cancel">
                    Annuler
                </button>

                <button type="submit"
                        class="btn-save">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>

<script>

    function openQuantityModal(deckId, pokemonId, currentQuantity) {
        document.getElementById('quantityModal').style.display = 'flex';
        document.getElementById('quantityInput').value = currentQuantity;
        document.getElementById('quantityForm').action =
            '/decks/' + deckId + '/pokemons/' + pokemonId;
    }

    function closeQuantityModal() {
        document.getElementById('quantityModal').style.display = 'none';
    }

    function openDeletePokemonModal(deckId, pokemonId, pokemonName) {
        document.getElementById('deletePokemonModal').style.display = 'flex';
        document.getElementById('deletePokemonMessage').innerHTML =
            'Voulez-vous vraiment retirer <strong>' + pokemonName + '</strong> du deck ?';
        document.getElementById('deletePokemonForm').action =
            '/decks/' + deckId + '/pokemons/' + pokemonId;
    }

    function closeDeletePokemonModal() {
        document.getElementById('deletePokemonModal').style.display = 'none';
    }

    function openAddPokemonModal() {
        document.getElementById('addPokemonModal').style.display = 'flex';
    }

    function closeAddPokemonModal() {
        document.getElementById('addPokemonModal').style.display = 'none';
    }

</script>

@endsection