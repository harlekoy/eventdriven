<?php

return [
    'token' => env('BETRADAR_TOKEN'),
    'version' => env('BETRADAR_VERSION', 'v1'),
    'domain' => env('BETRADAR_DOMAIN', 'https://stgapi.betradar.com'),
    'apiGroups' => [
        'sportEvents' => Betprophet\Betradar\UnifiedFeeds\SportEvents::class,
        'staticSportEvents' => Betprophet\Betradar\UnifiedFeeds\StaticSportEvents::class,
        'entity' => Betprophet\Betradar\UnifiedFeeds\Entity::class,
    ],
    'amqp' => [
        'host' => env('BETRADAR_AMQP_HOST', 'stgmq.betradar.com'),
        'port' => env('BETRADAR_AMQP_PORT', '5671'),
        'vhost' => env('BETRADAR_AMQP_VHOST', '/unifiedfeed/12356'),
    ],
];
