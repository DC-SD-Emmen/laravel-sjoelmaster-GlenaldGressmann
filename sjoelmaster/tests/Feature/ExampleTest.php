<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_homepage_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
