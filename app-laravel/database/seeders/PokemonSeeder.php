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
                'name' => $p['name'],
                'hp' => $p['hp'],
                'attack' => $p['attack'],
                'defense' => $p['defense'],
                'sp_attack' => $p['sp_attack'],
                'sp_defense' => $p['sp_defense'],
                'speed' => $p['speed'],
                'height_m' => $p['height_m'],
                'weight_kg' => $p['weight_kg'],
                'generation' => $p['generation'],
                'is_legendary' => $p['is_legendary'],
            ]);
        }
    }
}
