<?php

namespace App\Auth0;

use Auth0\SDK\API\Authentication;
use Auth0\SDK\API\Management;

class ManagementAPI
{
    /**
     * Get Auth0 domain without the protocol.
     *
     * @return string
     */
    public function domain()
    {
        return parse_url(env('AUTH0_DOMAIN'), PHP_URL_HOST);
    }

    /**
     * Get client credentials specially the "access_token".
     *
     * @return array
     */
    public function clientCredentials()
    {
        $config = config('laravel-auth0');
        $api = new Authentication($this->domain());

        return $api->client_credentials([
            'client_secret' => $config['client_secret'],
            'client_id'     => $config['client_id'],
            'audience'      => "{$config['domain']}api/v2/",
        ]);
    }

    /**
     * Get Auth0 Management API handler.
     *
     * @return \Auth0\SDK\API\Management
     */
    public function managementApi()
    {
        $response = $this->clientCredentials();

        return new Management(
            $response['access_token'], $this->domain()
        );
    }

    public static function create()
    {
        $static = new static();

        return $static->managementApi();
    }
}
