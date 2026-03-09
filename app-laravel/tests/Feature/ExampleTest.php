<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_guest_is_redirected_when_accessing_decks(): void
    {
        $response = $this->get('/decks');

        $response->assertRedirect('/login');
    }
}
