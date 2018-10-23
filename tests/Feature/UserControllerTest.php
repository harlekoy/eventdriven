<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    public function testGetUsers()
    {
        $response = $this->json('GET', '/api/v1/user');
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'username', 'first_name', 'last_name']
                ]
            ]);
    }

    public function testGetUser()
    {
        $response = $this->json('GET', '/api/v1/user/1');
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id', 'username', 'first_name', 'last_name'
                ]
            ]);
    }

    public function testGetUserNotFound()
    {
        $response = $this->json('GET', '/api/v1/user/-1');
        $response->assertNotFound();
    }

    public function testCreateUser()
    {
        $payload = [
            'first_name' => 'Joseph',
            'last_name' => 'Holt',
            'email' => 'joseph.dicdican@gmail.com',
            'username' => 'josephd',
        ];

        $response = $this->json('POST', '/api/v1/user', $payload);
        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => $payload,
            ]);

        $raw_response = $response->getData();
        User::destroy($raw_response->data->id);
    }

    public function testEditUser()
    {
        $user = factory(User::class)->create();
        $payload = factory(User::class)->raw([
            'first_name' => 'Joseph',
            'last_name' => 'Dicdican',
        ]);

        $response = $this->json('PUT', "/api/v1/user/{$user->id}", $payload);
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['id', 'username', 'first_name', 'last_name']
            ]);
        $user->delete();
    }

    public function testDeleteUser()
    {
        $user = factory(User::class)->create();

        $response = $this->json('DELETE', "/api/v1/user/{$user->id}");
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['id', 'username', 'first_name', 'last_name']
            ]);
    }
}
