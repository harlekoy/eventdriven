<?php

return [
    'token'   => env('BETRADAR_TOKEN'),
    'version' => env('BETRADAR_VERSION', 'v1'),
    'domain'  => env('BETRADAR_DOMAIN', 'https://stgapi.betradar.com'),

    'apiGroups' => [
        'sportEvents'       => Betprophet\Betradar\UnifiedFeeds\SportEvents::class,
        'staticSportEvents' => Betprophet\Betradar\UnifiedFeeds\StaticSportEvents::class,
        'entity'            => Betprophet\Betradar\UnifiedFeeds\Entity::class,
        'calendar'          => Betprophet\Betradar\UnifiedFeeds\BookingCalendar::class,
        'betting'           => Betprophet\Betradar\UnifiedFeeds\Betting::class,
        'recovery'          => Betprophet\Betradar\UnifiedFeeds\OddsRecovery::class,
    ],

    'amqp' => [
        'host'  => env('BETRADAR_AMQP_HOST', 'mq.betradar.com'),
        'port'  => env('BETRADAR_AMQP_PORT', '5671'),
        'vhost' => env('BETRADAR_AMQP_VHOST', '/unifiedfeed/12356'),
    ],

    'amqp_handlers' => [
        'alive'             => Betprophet\Betradar\Connections\Handlers\Alive::class,
        'fixture_change'    => Betprophet\Betradar\Connections\Handlers\FixtureChange::class,
        'odds_change'       => Betprophet\Betradar\Connections\Handlers\OddsChange::class,
        'bet_settlement'    => Betprophet\Betradar\Connections\Handlers\BetSettlement::class,
        'bet_stop'          => Betprophet\Betradar\Connections\Handlers\BetStop::class,
        'snapshot_complete' => Betprophet\Betradar\Connections\Handlers\SnapshotComplete::class,
    ],
];
