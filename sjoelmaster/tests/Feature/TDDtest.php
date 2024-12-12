<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class TDDtest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_calculate_average_score()
{
    Player::create(['name' => 'John Doe']);
    // Veronderstel dat de gemiddelde score berekend moet worden
    $this->assertTrue(true); // Placeholder
}
}
