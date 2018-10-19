<?php

namespace App\Auth0\Connections;

class GoogleAuthData
{
    /**
     * Handle auth data.
     *
     * @param  array $user
     *
     * @return array
     */
    public function handle($user)
    {
        return [
            'email'      => $user['email'],
            'first_name' => $user['given_name'],
            'last_name'  => $user['family_name'],
            'avatar'     => $user['picture'],
        ];
    }
}
