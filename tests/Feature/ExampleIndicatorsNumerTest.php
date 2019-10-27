<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleIndicatorsNumerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('api/indicators', ["type" => "number", "length" => "60"]);
        $response->assertStatus(200)
            ->assertJson(["id" => true, "number" => true])
            ->assertJsonCount(2);
    }
}
