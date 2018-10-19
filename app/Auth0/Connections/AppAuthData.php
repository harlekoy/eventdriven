<?php

namespace App\Auth0\Connections;

class AppAuthData
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
        $data = [
            'username'   => $user['username'],
            'email'      => $user['email'],
            'first_name' => $user['name'],
            'avatar'     => $user['picture'],
        ];

        if ($metadata = array_get($user, 'user_metadata')) {
            $data = array_merge($data, [
                'first_name' => $metadata['first_name'],
                'last_name'  => $metadata['last_name'],
            ]);
        }

        return $data;
    }
}
