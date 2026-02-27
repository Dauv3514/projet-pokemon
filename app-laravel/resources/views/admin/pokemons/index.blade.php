@extends('layouts.app')

@section('content')

<div class="pokemon-admin-wrapper">

    <h1 class="pokemon-admin-title">Gestion des Pokémons</h1>

    <div class="pokemon-admin-header">
        <a href="{{ route('admin.pokemons.create') }}"
           class="pokemon-admin-btn pokemon-admin-btn--primary">
             Créer un Pokémon
        </a>
    </div>

    <div class="pokemon-admin-table-container">

        <table class="pokemon-admin-table">

            <thead>
                <tr>
                    <th>Pokémon</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pokemons as $pokemon)
                <tr>

                    {{-- Nom + Image --}}
                    <td class="pokemon-admin-name">

                        <img
                            src="{{ asset('images/' . strtolower($pokemon->name) . '.png') }}"
                            alt="{{ $pokemon->name }}"
                            class="pokemon-admin-image"
                            onerror="this.src='{{ asset('images/default.png') }}';"
                        />

                        <span>{{ $pokemon->name }}</span>

                    </td>

                    {{-- Actions --}}
                    <td class="pokemon-admin-actions">

                        <a href="{{ route('admin.pokemons.edit', $pokemon) }}"
                           class="pokemon-admin-btn pokemon-admin-btn--edit">
                           Modifier
                        </a>

                        <button type="button"
                                class="pokemon-admin-btn pokemon-admin-btn--delete"
                                onclick="openDeletePokemonModal({{ $pokemon->id }}, '{{ $pokemon->name }}')">
                            Supprimer
                        </button>

                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

{{-- MODAL SUPPRESSION --}}
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

<script>

    function openDeletePokemonModal(pokemonId, pokemonName) {

        document.getElementById('deletePokemonModal').style.display = 'flex';

        document.getElementById('deletePokemonMessage').innerHTML =
            'Voulez-vous vraiment supprimer <strong>' + pokemonName + '</strong> ?';

        document.getElementById('deletePokemonForm').action =
            '/admin/pokemons/' + pokemonId;
    }

    function closeDeletePokemonModal() {
        document.getElementById('deletePokemonModal').style.display = 'none';
    }

</script>

@endsection