@extends('layouts.app')

@section('content')

<div class="decks-container">

    <h1 class="decks-title">Mes Decks</h1>

    @if($decks->isEmpty())
        <p class="decks-empty">
            Vous n’avez encore créé aucun deck.
        </p>
    @else

        <div class="decks-grid">

            @foreach($decks as $deck)

                <div class="deck-card">

                    <h2 class="deck-name">
                        {{ $deck->name }}
                    </h2>

                    <p>
                        Nombre de Pokémon :
                        {{ $deck->pokemons->sum('pivot.quantity') }}
                    </p>

                    <ul style="margin-top:10px; font-size:14px; color:#555;">
                        @foreach($deck->pokemons as $pokemon)
                            <li>
                                {{ $pokemon->name }} x{{ $pokemon->pivot->quantity }}
                            </li>
                        @endforeach
                    </ul>

                   <div class="deck-actions">

                        {{-- Voir --}}
                        <a href="{{ route('decks.show', $deck) }}"
                           class="btn-view">
                            Voir
                        </a>

                        <button 
                            class="btn-rename"
                            onclick="openRenameModal({{ $deck->id }}, '{{ $deck->name }}')">
                            Renommer
                        </button>

                        {{-- Supprimer --}}
                        <button 
                            class="btn-delete"
                            onclick="openDeleteModal({{ $deck->id }}, '{{ $deck->name }}')">
                            Supprimer
                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

{{-- Modal Renommer Deck --}}
<div id="renameModal" class="modal-overlay" style="display:none;">
    <div class="modal-box">
        <h2>Renommer le deck</h2>

        <form id="renameForm" method="POST">
            @csrf
            @method('PUT')

            <input 
                type="text" 
                name="name" 
                id="deckNameInput" 
                required
                class="modal-input"
            >

            <div class="modal-actions">
                <button type="button" onclick="closeRenameModal()" class="btn-cancel">
                    Annuler
                </button>

                <button type="submit" class="btn-save">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Suppression Deck --}}
<div id="deleteModal" class="modal-overlay" style="display:none;">
    <div class="modal-box modal-danger">

        <h2>Supprimer le deck</h2>

        <p id="deleteMessage" style="text-align:center; margin-bottom:20px;">
        </p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="modal-actions">
                <button type="button" onclick="closeDeleteModal()" class="btn-cancel">
                    Annuler
                </button>

                <button type="submit" class="btn-danger">
                    Supprimer
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function openRenameModal(deckId, deckName) {
        document.getElementById('renameModal').style.display = 'flex';
        document.getElementById('deckNameInput').value = deckName;
        document.getElementById('renameForm').action = '/decks/' + deckId;
    }

    function closeRenameModal() {
        document.getElementById('renameModal').style.display = 'none';
    }

    function openDeleteModal(deckId, deckName) {
        document.getElementById('deleteModal').style.display = 'flex';
        document.getElementById('deleteMessage').innerHTML =
            'Es-tu sûr de vouloir supprimer le deck <strong>"' + deckName + '"</strong> ?<br>Cette action est irréversible.';
        document.getElementById('deleteForm').action = '/decks/' + deckId;
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>

@endsection