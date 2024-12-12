<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScoreControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index()
{
    $response = $this->get('/scores');
    $response->assertStatus(200);
    $response->assertViewIs('scores.index');
}
}
