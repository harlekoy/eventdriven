<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryControllerTest extends TestCase
{
    public function testGetCountries()
    {
        $response = $this->json('GET', '/api/v1/countries');
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['name', 'code']
                ]
            ]);
    }
}
