<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'hp',
        'attack',
        'defense',
        'sp_attack',
        'sp_defense',
        'speed',
        'height_m',
        'weight_kg',
        'generation',
        'is_legendary',
    ];

    // Relation avec les types
    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_type');
    }

    // Relation avec les decks
    public function decks()
    {
        return $this->belongsToMany(Deck::class, 'deck_has_pokemon')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
