<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pokemons', function (Blueprint $table) {
            // Supprimer les colonnes inutiles
            $table->dropColumn([
                'japanese_name',
                'classfication',
                'abilities',
                'percentage_male',
                'capture_rate',
                'base_egg_steps',
                'base_happiness',
                'base_total',
                'experience_growth',
                'against_normal',
                'against_fire',
                'against_water',
                'against_electric',
                'against_grass',
                'against_ice',
                'against_fight',
                'against_poison',
                'against_ground',
                'against_flying',
                'against_psychic',
                'against_bug',
                'against_rock',
                'against_ghost',
                'against_dragon',
                'against_dark',
                'against_steel',
                'against_fairy',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pokemons', function (Blueprint $table) {
            // Remettre les colonnes si on veut rollback
            $table->string('japanese_name')->nullable();
            $table->string('classfication')->nullable();
            $table->text('abilities')->nullable();
            $table->float('percentage_male')->nullable();
            $table->integer('capture_rate')->nullable();
            $table->integer('base_egg_steps')->nullable();
            $table->integer('base_happiness')->nullable();
            $table->integer('base_total')->nullable();
            $table->bigInteger('experience_growth')->nullable();
            $table->float('against_normal')->nullable();
            $table->float('against_fire')->nullable();
            $table->float('against_water')->nullable();
            $table->float('against_electric')->nullable();
            $table->float('against_grass')->nullable();
            $table->float('against_ice')->nullable();
            $table->float('against_fight')->nullable();
            $table->float('against_poison')->nullable();
            $table->float('against_ground')->nullable();
            $table->float('against_flying')->nullable();
            $table->float('against_psychic')->nullable();
            $table->float('against_bug')->nullable();
            $table->float('against_rock')->nullable();
            $table->float('against_ghost')->nullable();
            $table->float('against_dragon')->nullable();
            $table->float('against_dark')->nullable();
            $table->float('against_steel')->nullable();
            $table->float('against_fairy')->nullable();
        });
    }
};