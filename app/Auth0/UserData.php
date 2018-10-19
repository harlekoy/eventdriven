<?php

namespace App\Auth0;

use App\Auth0\ManagementAPI;
use Auth0\SDK\API\Authentication;
use Auth0\SDK\API\Management;

class UserData
{
    /**
     * Get user data base on connection.
     *
     * @param  string $connection
     * @param  array $data
     *
     * @return array
     */
    public static function get($connection, $data)
    {
        $class = array_get(config('auth0.connections'), $connection);
        $provider = new $class();

        return $provider->handle($data);
    }

    /**
     * Get the user auth identity.
     *
     * @param  int $id
     * @return array
     */
    public static function identity($id)
    {
        $api = ManagementAPI::create();
        $user = $api->users->get($id);
        $identity = explode('|', $user['user_id']);
        $connection = head($identity);

        return self::get($connection, $user);
    }
}
