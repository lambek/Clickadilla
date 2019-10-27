<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleIndicatorsStringTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('api/indicators', ["type" => "string", "length" => "60"]);
        $response->assertStatus(200)
            ->assertJson(["id" => true, "string" => true])
            ->assertJsonCount(2);
    }
}
