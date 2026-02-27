@extends('layouts.app')

@section('content')

<div class="pokemon-edit-wrapper">

    <h1 class="pokemon-edit-title">Modifier le Pokémon</h1>

    <div class="pokemon-edit-card">

        <form action="{{ route('admin.pokemons.update', $pokemon) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="pokemon-edit-group">
                <label class="pokemon-edit-label">Nom</label>
                <input type="text"
                       name="name"
                       value="{{ $pokemon->name }}"
                       required
                       class="pokemon-edit-input">
            </div>

            <div class="pokemon-edit-group">
                <label class="pokemon-edit-label">Type</label>
                <select name="type_id"
                        required
                        class="pokemon-edit-input">

                    @foreach($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $pokemon->type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="pokemon-edit-btn">
                Mettre à jour
            </button>

        </form>

    </div>

</div>

@endsection