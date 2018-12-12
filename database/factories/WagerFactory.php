<?php

use App\Models\Player;
use App\Models\SportEvent;
use App\Models\Team;
use App\Models\Wager;
use Faker\Generator as Faker;

$factory->define(Wager::class, function (Faker $faker) {
    $class = $faker->randomElement([Player::class]);
    $model = (new $class)->get()->random();
    $sportEvents = SportEvent::get();

    if ($sportEvents->count()) {
        $sportEvent = $sportEvents->random();
    }

    return [
        'sport_event_id' => $sportEvent ?? null,
        'wagerable_id' => $model->id,
        'wagerable_type' => $class,
        'bet_type' => $faker->randomElement(['to_win', 'proposition_bet']),
        'total_wager_value' => $faker->numberBetween(100, 10000),
        'odds' => $faker->numberBetween(1, 50).':'.$faker->numberBetween(1, 50),
        'selling_percentage' => $faker->numberBetween(0, 100),
        'selling_price' => $faker->numberBetween(100, 10000),
        'status' => $faker->randomElement(['open', 'sold', 'bought']),
    ];
});
