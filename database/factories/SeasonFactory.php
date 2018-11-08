<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Season::class, function (Faker $faker) {
    $startdate = Carbon::instance($faker->dateTime());

    $data = [
        'id' => 'sr:season:'.str_random(6),
        'name' => $faker->words(3, true),
        'start_date' => $startdate->format('Y-m-d'),
        'end_date' => $startdate->addWeeks(rand(1, 52))->format('Y-m-d'),
        'year' => rand(2000, 2020),
    ];

    return array_merge($data, [
        'betradar_data' => $data,
    ]);
});
