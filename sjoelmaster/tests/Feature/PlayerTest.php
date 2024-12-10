<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class PlayerTest extends TestCase
{
    public function test_create_player()
{
    $player = Player::create(['name' => 'Jane Doe']);
    $this->assertDatabaseHas('players', ['name' => 'Jane Doe']);
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
}
