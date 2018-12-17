<?php

use Laravel\Nova\Http\Middleware\Authenticate;

return [
    'path' => 'apidocs',

    'name' => 'Betprophet API Endpoints',

    'version' => 'v1.0.0',

    'url' => env('API_URL'),

    'api_url' => env('API_URL').'/api/v1',

    'group_open' => true,

    'middleware' => [
        'web',
        Authenticate::class,
    ],

    'driver' => env('APIDOCS_DRIVER', 'file'),

    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
        ],
        'file' => [
            'path' => resource_path('json/apidocs'),
        ],
    ],
];

