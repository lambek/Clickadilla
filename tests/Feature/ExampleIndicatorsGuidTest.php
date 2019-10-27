<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleIndicatorsGuidTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('api/indicators', ["type" => "guid"]);
        $response->assertStatus(200)
            ->assertJson(["id" => true, "guid" => true])
            ->assertJsonCount(2);
    }
}
