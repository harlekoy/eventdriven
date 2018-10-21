<?php

return [
    'connections' => [
        'google-oauth2' => \App\Auth0\Connections\GoogleAuthData::class,
        'facebook'      => \App\Auth0\Connections\FacebookAuthData::class,
        'auth0'         => \App\Auth0\Connections\AppAuthData::class,
    ],

    'connection_types' => [
        'db' => 'Username-Password-Authentication',
    ]
];
