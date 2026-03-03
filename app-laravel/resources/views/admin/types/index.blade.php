@extends('layouts.app')

@section('content')

<div class="types-admin-wrapper">

    <div class="types-admin-header">
        <h1 class="types-admin-title">Gestion des Types</h1>

        <a href="{{ route('admin.types.create') }}" 
           class="types-admin-create-btn">
            Créer un Type
        </a>
    </div>

    <div class="types-admin-card">

        <div class="types-admin-table">

            <div class="types-admin-table-head">
                <div class="types-col-name">Nom</div>
                <div class="types-col-actions">Actions</div>
            </div>

            @foreach($types as $type)
                <div class="types-admin-row">

                    <div class="types-col-name">
                        {{ $type->name }}
                    </div>

                    <div class="types-col-actions">

                        <a href="{{ route('admin.types.edit', $type) }}" 
                           class="types-btn-edit">
                            Modifier
                        </a>

                        <button type="button"
                                class="types-btn-delete"
                                onclick="openDeleteModal({{ $type->id }}, '{{ $type->name }}')">
                            Supprimer
                        </button>

                        <form id="delete-form-{{ $type->id }}"
                            action="{{ route('admin.types.destroy', $type) }}"
                            method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</div>

@endsection

<div id="deleteModal" class="types-modal-overlay">

    <div class="types-modal">

        <h2 class="types-modal-title">
            Confirmer la suppression
        </h2>

        <p id="deleteModalText" class="types-modal-text"></p>

        <div class="types-modal-actions">

            <button onclick="closeDeleteModal()"
                    class="types-modal-cancel">
                Annuler
            </button>

            <button onclick="confirmDelete()"
                    class="types-modal-confirm">
                Supprimer
            </button>

        </div>

    </div>

</div>

<script>
    let currentDeleteId = null;

    function openDeleteModal(id, name) {
        currentDeleteId = id;

        document.getElementById('deleteModalText').innerText =
            "Voulez-vous vraiment supprimer le type \"" + name + "\" ?";

        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    function confirmDelete() {
        document.getElementById('delete-form-' + currentDeleteId).submit();
    }
</script>