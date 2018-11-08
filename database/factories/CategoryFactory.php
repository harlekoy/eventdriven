<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    $data = [
        'id'           => 'sr:category:'.str_random(6),
        'name'         => $faker->words(2, true),
        'country_code' => 'USA',
    ];

    return array_merge($data, [
        'betradar_data' => $data,
    ]);
});
