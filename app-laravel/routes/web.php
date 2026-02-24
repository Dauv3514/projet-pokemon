<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\DeckController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('pokemon', PokemonController::class);
Route::get('/home/{pokemon}', [PokemonController::class, 'show'])->name('pokemons.show');

Route::post('/decks/add-pokemon', [DeckController::class, 'addPokemon'])
    ->name('decks.addPokemon')
    ->middleware('auth');

Route::get('/decks/create', [DeckController::class, 'create'])
    ->name('decks.create')
    ->middleware('auth');

Route::post('/decks', [DeckController::class, 'store'])
    ->name('decks.store')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    // Liste de tous les decks
    Route::get('/decks', [DeckController::class, 'index'])->name('decks.index');

    // Voir un deck individuel
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');

    // Supprimer un deck si tu veux aussi gérer ça
    Route::delete('/decks/{deck}', [DeckController::class, 'destroy'])->name('decks.destroy');

     // Update un deck (renommer)
    Route::put('/decks/{deck}', [DeckController::class, 'update'])->name('decks.update');
});