<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    // Chemin vers le fichier JSON
    $jsonPath = database_path('seeders/pokemons.json');

    // Lire le JSON
    $json = file_get_contents($jsonPath);

    // Décoder en tableau PHP
    $pokemons = json_decode($json, true);

    // Boucler sur chaque Pokémon et créer l'enregistrement
    foreach ($pokemons as $p) {
        Pokemon::create([
            'abilities' => $p['abilities'],
            'against_bug' => $p['against_bug'],
            'against_dark' => $p['against_dark'],
            'against_dragon' => $p['against_dragon'],
            'against_electric' => $p['against_electric'],
            'against_fairy' => $p['against_fairy'],
            'against_fight' => $p['against_fight'],
            'against_fire' => $p['against_fire'],
            'against_flying' => $p['against_flying'],
            'against_ghost' => $p['against_ghost'],
            'against_grass' => $p['against_grass'],
            'against_ground' => $p['against_ground'],
            'against_ice' => $p['against_ice'],
            'against_normal' => $p['against_normal'],
            'against_poison' => $p['against_poison'],
            'against_psychic' => $p['against_psychic'],
            'against_rock' => $p['against_rock'],
            'against_steel' => $p['against_steel'],
            'against_water' => $p['against_water'],
            'attack' => $p['attack'],
            'base_egg_steps' => $p['base_egg_steps'],
            'base_happiness' => $p['base_happiness'],
            'base_total' => $p['base_total'],
            'capture_rate' => $p['capture_rate'],
            'classfication' => $p['classfication'],
            'defense' => $p['defense'],
            'experience_growth' => $p['experience_growth'],
            'height_m' => $p['height_m'],
            'hp' => $p['hp'],
            'japanese_name' => $p['japanese_name'],
            'name' => $p['name'],
            'percentage_male' => $p['percentage_male'],
            'pokedex_number' => $p['pokedex_number'],
            'sp_attack' => $p['sp_attack'],
            'sp_defense' => $p['sp_defense'],
            'speed' => $p['speed'],
            'weight_kg' => $p['weight_kg'],
            'generation' => $p['generation'],
            'is_legendary' => $p['is_legendary'],
        ]);
    }
}
}
