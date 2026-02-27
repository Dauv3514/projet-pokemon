@extends('layouts.app')

@section('content')

<div class="pokemon-create-wrapper">

    <h1 class="pokemon-create-title">Créer un Pokémon</h1>

    <div class="pokemon-create-card">

        <form action="{{ route('admin.pokemons.store') }}" method="POST">
            @csrf

            <div class="pokemon-create-group">
                <label class="pokemon-create-label">Nom</label>
                <input type="text"
                       name="name"
                       required
                       class="pokemon-create-input">
            </div>

            <div class="pokemon-create-group">
                <label class="pokemon-create-label">Type</label>
                <select name="type_id"
                        required
                        class="pokemon-create-input">

                    <option value="">-- Choisir un type --</option>

                    @foreach($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="pokemon-create-btn">
                Créer
            </button>

        </form>

    </div>

</div>

@endsection