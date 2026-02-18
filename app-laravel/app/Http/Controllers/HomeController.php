<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Type;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        // Tous les types pour le dropdown
        $types = Type::all();

        // Récupérer le paramètre 'type' depuis l'URL
        $typeId = $request->query('type');

        // Filtrer les Pokémon si un type est choisi
        if ($typeId) {
            $pokemons = Pokemon::whereHas('types', function($query) use ($typeId) {
                $query->where('types.id', $typeId);
            })->get();
        } else {
            $pokemons = Pokemon::all();
        }

        return view('home', compact('pokemons', 'types'));
    }
}