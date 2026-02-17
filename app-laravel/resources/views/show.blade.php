@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 flex justify-center items-center min-h-screen">

    <div style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); padding: 24px; text-align: center;">

        {{-- Image Pokémon --}}
        <img
            src="{{ asset('images/' . strtolower($pokemon->name) . '.png') }}"
            alt="{{ $pokemon->name }}"
            onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';"
            style="width: 150px; height: 150px; object-fit: contain; margin-bottom: 16px;"
        />

        {{-- Infos détaillées --}}
        <h2 style="font-size: 20px; font-weight: bold; text-transform: capitalize; margin-bottom: 12px;">
            {{ $pokemon->name }}
        </h2>

        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; color: #555; margin-bottom: 16px; text-align: center;">
            <li><strong>Type :</strong> {{ $pokemon->type->name ?? 'Inconnu' }}</li>
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

        {{-- Bouton Ajouter au deck --}}
        @auth
        <button
            type="button"
            onclick="alert('Ajout au deck simulé pour le front');"
            style="padding: 8px 16px; background-color: #10b981; color: white; border-radius: 6px; font-size: 14px; border: none; cursor: pointer;">
            Ajouter au deck
        </button>
        @endauth

    </div>

</div>
@endsection