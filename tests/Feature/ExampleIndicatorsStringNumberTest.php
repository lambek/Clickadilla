<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleIndicatorsStringNumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('api/indicators', ["type" => "stringnumber", "length" => "60"]);
        $response->assertStatus(200)
            ->assertJson(["id" => true, "stringnumber" => true])
            ->assertJsonCount(2);
    }
}
