<?php

namespace Tests\Feature;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeckManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_a_deck(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/decks', [
            'name' => 'Deck test',
        ]);

        $response->assertRedirect('/home');

        $this->assertDatabaseHas('decks', [
            'name' => 'Deck test',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_view_only_own_deck(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();

        $deck = Deck::create([
            'name' => 'Deck prive',
            'user_id' => $owner->id,
        ]);

        $this->actingAs($owner)
            ->get("/decks/{$deck->id}")
            ->assertOk();

        $this->actingAs($intruder)
            ->get("/decks/{$deck->id}")
            ->assertForbidden();
    }
}
