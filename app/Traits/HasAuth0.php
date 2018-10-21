<?php

namespace App\Traits;

use App\Auth0\ManagementAPI;
use App\Models\Address;

trait HasAuth0
{
    /**
     * Boot has address.
     */
    protected static function bootHasAuth0()
    {
        static::creating(function ($model) {
            // For admin dashboard purposes
            if ($password = request()->get('password')) {
                $response = $model->createAuth0User($model);

                $model->auth0id = $model->getAuth0Id($response);
            }
        });
    }

    /**
     * Create Auth0 user.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function createAuth0User($model)
    {
        $api = ManagementAPI::create();

        return $api->users->create(array_merge(array_filter([
            'connection'   => config('auth0.connection_types.db'),
            'email'        => $model->email,
            'username'     => $model->username,
            'password'     => request()->get('password'),
            'phone_number' => $model->phone_number,
            'verify_email' => true,
        ]), $this->metadata($model)));
    }

    /**
     * Get Auth0 metadata.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function metadata($model)
    {
        return [
            'user_metadata' => array_filter([
                'first_name' => $model->first_name,
                'last_name'  => $model->last_name,
                'dob'        => $model->dob,
            ])
        ];
    }

    /**
     * Get Auth0 ID.
     *
     * @param  array $response
     *
     * @return string
     */
    public function getAuth0Id($response)
    {
        $identity = head($response['identities']);

        return $identity['provider'].'|'.$identity['user_id'];
    }
}
