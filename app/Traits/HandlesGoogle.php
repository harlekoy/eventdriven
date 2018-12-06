<?php

namespace App\Traits;

use App\Models\User;

trait HandlesGoogle
{
    /**
     * Handle google authentication.
     *
     * @param mixed $user
     *
     * @return \App\Models\User
     */
    public function handleGoogle($user)
    {
         // Check if they're an existing user
        $currentUser = User::where('email', $user->email)->first();

        if (!$currentUser) {
            // create a new user
            $currentUser = User::create([
                'first_name' => $user->name,
                'last_name'  => null,
                'avatar'     => $user->avatar,
            ]);
        }

        auth()->login($currentUser, true);

        return $currentUser;
    }
}
