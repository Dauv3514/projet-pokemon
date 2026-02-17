@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <h1 class="text-3xl font-bold mb-8 text-center">
        Liste des Pokémons
    </h1>

    <!-- @auth
    {{-- Bouton Ajouter Pokémon --}}
    <div class="text-center mb-6">
        <button
            type="button"
            style="padding: 4px 8px; background-color: #3b82f6; color: #fff; border-radius: 4px; font-size: 12px; border: none; cursor: pointer;">
            Ajouter un Pokémon
        </button>
    </div>
    @endauth -->

    <div style="display: flex; flex-wrap: wrap; gap: 16px; justify-content: center;">

        @foreach($pokemons as $pokemon)
            <div style="display: flex; flex-direction: column; gap: 12px;">

                {{-- Carte cliquable (image + infos) --}}
                <a href="{{ route('pokemons.show', $pokemon) }}" style="text-decoration: none; color: inherit;">
                    <div style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 12px; width: 220px; cursor: pointer; display: flex; flex-direction: column; gap: 12px;">

                        {{-- Image --}}
                        <img
                            src="{{ asset('images/' . strtolower($pokemon->name) . '.png') }}"
                            alt="{{ $pokemon->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';"
                            style="width: 100%; height: 100px; object-fit: contain;"
                        />

                        {{-- Infos --}}
                        <div style="text-align: center;">
                            <h2 style="font-size: 14px; font-weight: bold; text-transform: capitalize; margin-bottom: 4px;">
                                {{ $pokemon->name }}
                            </h2>
                            <ul style="list-style: none; padding: 0; margin: 0; font-size: 12px; color: #555;">
                                <li>HP: {{ $pokemon->hp }}</li>
                                <li>Atk: {{ $pokemon->attack }}</li>
                                <li>Def: {{ $pokemon->defense }}</li>
                                <li>Spd: {{ $pokemon->speed }}</li>
                            </ul>
                        </div>

                    </div>
                </a>

                {{-- CRUD simulé pour front --}}
                @auth
                <div style="display: flex; gap: 8px; justify-content: center; margin-top: 0;">
                    <button
                        type="button"
                        onclick="alert('Modification simulée pour front');"
                        style="padding: 4px 8px; background-color: #facc15; color: #000; border-radius: 4px; font-size: 12px; border: none; cursor: pointer;">
                        Modifier
                    </button>

                    <button
                        type="button"
                        onclick="alert('Suppression simulée pour front');"
                        style="padding: 4px 8px; background-color: #ef4444; color: #fff; border-radius: 4px; font-size: 12px; border: none; cursor: pointer;">
                        Supprimer
                    </button>
                </div>
                @endauth

            </div>
        @endforeach

    </div>

</div>
@endsection