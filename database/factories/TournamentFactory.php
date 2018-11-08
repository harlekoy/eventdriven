<?php

use App\Models\Category;
use App\Models\Season;
use App\Models\Sport;
use Faker\Generator as Faker;

$factory->define(App\Models\Tournament::class, function (Faker $faker) {
    $data = [
        'id'            => 'sr:tournament:'.str_random(6),
        'sport_id'      => factory(Sport::class)->create()->id,
        'season_id'     => factory(Season::class)->create()->id,
        'category_id'   => factory(Category::class)->create()->id,
        'name'          => $faker->words(2, true),
    ];

    return array_merge($data, [
        'betradar_data' => $data,
    ]);
});
