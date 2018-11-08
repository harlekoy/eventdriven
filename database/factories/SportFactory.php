<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Sport::class, function (Faker $faker) {
    $data = [
        'id'      => 'sr:sport:'.str_random(6),
        'name'    => ucwords($faker->words(2, true)),
        'enable' => 1,
    ];

    return array_merge($data, [
        'betradar_data' => $data,
    ]);
});
