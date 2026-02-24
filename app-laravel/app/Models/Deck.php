<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model {
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function pokemons() {
        return $this->belongsToMany(Pokemon::class, 'deck_has_pokemon')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}