<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    public function run(): void
    {
        // chemin vers le JSON
        $jsonPath = database_path('seeders/pokemons.json');

        // lire le fichier
        $json = file_get_contents($jsonPath);

        // convertir en tableau PHP
        $pokemons = json_decode($json, true);

        foreach ($pokemons as $p) {

            // 1️⃣ créer le pokemon
            $pokemon = Pokemon::create([
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

            // 2️⃣ récupérer les types
            $types = array_filter([
                $p['type1'] ?? null,
                $p['type2'] ?? null
            ]);

            foreach ($types as $typeName) {

                // 3️⃣ créer le type si absent
                $type = Type::firstOrCreate([
                    'name' => strtolower($typeName)
                ]);

                // 4️⃣ attacher au pokemon
                $pokemon->types()->attach($type->id);
            }
        }
    }
}