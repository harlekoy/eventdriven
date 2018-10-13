<?php

use App\Auth0\ManagementAPI;
use App\User;
use Auth0\SDK\API\Authentication;
use Auth0\SDK\API\Management;
use Auth0\SDK\API\Management\Users;
use Auth0\SDK\Exception\ApiException;
use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Get the Auth0 users to sync all available user in the Auth0.
     *
     * @return array
     */
    public function auth0Users()
    {
        $api = ManagementAPI::create();

        return $api->users->getAll();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {dd($this->auth0Users());
        foreach ($this->auth0Users() as $data) {
            User::insert([
                'auth0id'           => $data['user_id'],
                'email'             => $data['email'],
                'email_verified_at' => $data['email_verified'] ? now() : null,
                'name'              => $data['name'],
                'username'          => array_get($data, 'username'),
                'updated_at'        => Carbon::parse($data['updated_at'])->toDateTimeString(),
                'created_at'        => Carbon::parse($data['created_at'])->toDateTimeString(),
                // 'data'     =>
            ]);
        }
    }
}
