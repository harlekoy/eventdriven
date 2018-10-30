<?php

return [
    'token' => env('BETRADAR_TOKEN'),
    'version' => env('BETRADAR_VERSION', 'v1'),
    'domain' => env('BETRADAR_DOMAIN', 'https://stgapi.betradar.com'),
    'apiGroups' => [
        'sportEvents' => Betprophet\Betradar\UnifiedFeeds\SportEvents::class,
    ],
];
