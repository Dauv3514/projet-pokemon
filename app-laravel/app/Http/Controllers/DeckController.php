<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function addPokemon(Request $request)
    {
        $request->validate([
            'deck_id' => 'required|exists:decks,id',
            'pokemon_id' => 'required|exists:pokemons,id',
            'quantity' => 'required|integer|min:1|max:15',
        ]);

        $deck = Deck::findOrFail($request->deck_id);

        if ($deck->user_id !== auth()->id()) {
            abort(403);
        }

        $pokemonId = $request->pokemon_id;
        $quantity = $request->quantity;
        $total = $deck->pokemons()->sum('quantity');

        if ($total + $quantity > 15) {
            return back()->with('error', 'Maximum 15 Pokémon par deck.');
        }

        if ($deck->pokemons()->where('pokemon_id', $pokemonId)->exists()) {
            $existing = $deck->pokemons()->where('pokemon_id', $pokemonId)->first();
            $newQuantity = $existing->pivot->quantity + $quantity;

            if ($total - $existing->pivot->quantity + $newQuantity > 15) {
                return back()->with('error', 'Maximum 15 Pokémon par deck.');
            }

            $deck->pokemons()->updateExistingPivot($pokemonId, [
                'quantity' => $newQuantity
            ]);
        } else {
            if ($total + $quantity > 15) {
                return back()->with('error', 'Maximum 15 Pokémon par deck.');
            }

            $deck->pokemons()->attach($pokemonId, [
                'quantity' => $quantity
            ]);
        }

        return back()->with('success', 'Pokémon ajouté au deck !');
    }

    public function create()
    {
        return view('create');
    }

    public function index()
    {
        $decks = auth()->user()->decks()->with('pokemons')->get();
        return view('index', compact('decks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $deck = Deck::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('home')->with('success', "Deck '{$deck->name}' créé !");
    }

    public function destroy(Deck $deck)
    {
        if ($deck->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }

        $deck->pokemons()->detach();

        $deck->delete();

        return redirect()->route('decks.index')->with('success', "Deck '{$deck->name}' supprimé !");
    }

    public function update(Request $request, Deck $deck)
    {
        if ($deck->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $deck->update([
            'name' => $request->name,
        ]);

        return redirect()->route('decks.index')->with('success', "Deck renommé en '{$deck->name}' !");
    }

    public function show(Deck $deck)
        {
            if ($deck->user_id !== auth()->id()) {
                abort(403, 'Action non autorisée.');
            }

            $deck->load('pokemons');
            $allPokemons = Pokemon::all();

            return view('showDeck', compact('deck', 'allPokemons'));
        }

    public function storePokemon(Request $request, Deck $deck)
        {
            if ($deck->user_id !== auth()->id()) {
                abort(403);
            }

            $request->validate([
                'pokemon_id' => 'required|exists:pokemons,id',
                'quantity' => 'required|integer|min:1'
            ]);

            if ($deck->pokemons()->where('pokemon_id', $request->pokemon_id)->exists()) {

                $current = $deck->pokemons()
                    ->where('pokemon_id', $request->pokemon_id)
                    ->first()
                    ->pivot
                    ->quantity;

                $deck->pokemons()->updateExistingPivot($request->pokemon_id, [
                    'quantity' => $current + $request->quantity
                ]);

            } else {

                $deck->pokemons()->attach($request->pokemon_id, [
                    'quantity' => $request->quantity
                ]);
            }

            return back()->with('success', 'Pokémon ajouté.');
        }

    public function updatePokemon(Request $request, Deck $deck, Pokemon $pokemon)
        {
            if ($deck->user_id !== auth()->id()) {
                abort(403);
            }

            $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);

            $deck->pokemons()->updateExistingPivot($pokemon->id, [
                'quantity' => $request->quantity
            ]);

            return back()->with('success', 'Quantité mise à jour.');
        }

    public function destroyPokemon(Deck $deck, Pokemon $pokemon)
        {
            if ($deck->user_id !== auth()->id()) {
                abort(403);
            }

            $deck->pokemons()->detach($pokemon->id);

            return back()->with('success', 'Pokémon retiré du deck.');
        }
}