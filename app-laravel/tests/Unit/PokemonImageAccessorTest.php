<?php

namespace Tests\Unit;

use App\Models\Pokemon;
use Tests\TestCase;

class PokemonImageAccessorTest extends TestCase
{
    public function test_image_accessor_returns_expected_url(): void
    {
        $pokemon = new Pokemon(['name' => 'PiKaChu']);

        $this->assertStringEndsWith(
            '/images/pikachu.png',
            $pokemon->image
        );
    }
}