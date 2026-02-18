<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = ['name'];

    // Relation plusieurs-à-plusieurs avec Pokémon
    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_type');
    }
}