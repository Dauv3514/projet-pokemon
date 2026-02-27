<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePokemonRequest;
use App\Http\Requests\UpdatePokemonRequest;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Deck;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with('type')->get();

        return view('admin.pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        $types = Type::all();

        return view('admin.pokemons.create', compact('types'));
    }

    public function store(StorePokemonRequest $request)
    {
        Pokemon::create($request->validated());

        return redirect()
            ->route('admin.pokemons.index')
            ->with('success', 'Pokémon créé avec succès.');
    }

    public function show(Pokemon $pokemon)
    {
        $decks = auth()->check()
            ? Deck::where('user_id', auth()->id())->get()
            : collect();

        return view('show', compact('pokemon', 'decks'));
    }

    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();

        return view('admin.pokemons.edit', compact('pokemon', 'types'));
    }

    public function update(UpdatePokemonRequest $request, Pokemon $pokemon)
    {
        $pokemon->update($request->validated());

        return redirect()
            ->route('admin.pokemons.index')
            ->with('success', 'Pokémon mis à jour.');
    }

    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return redirect()
            ->route('admin.pokemons.index')
            ->with('success', 'Pokémon supprimé.');
    }
}