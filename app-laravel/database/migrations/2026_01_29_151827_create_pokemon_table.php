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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('japanese_name')->nullable();
            $table->string('classfication')->nullable();
            $table->text('abilities')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('sp_attack')->nullable();
            $table->integer('sp_defense')->nullable();
            $table->integer('speed')->nullable();
            $table->float('height_m')->nullable();
            $table->float('weight_kg')->nullable();
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
            $table->boolean('is_legendary')->default(false);
            $table->integer('generation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
