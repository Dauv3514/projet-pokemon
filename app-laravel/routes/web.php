<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('pokemon', PokemonController::class);
Route::get('/home/{pokemon}', [PokemonController::class, 'show'])->name('pokemons.show');
