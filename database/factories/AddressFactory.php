<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'user_id'   => factory(User::class)->create()->id,
        'address_1' => $faker->address,
        'address_2' => $faker->secondaryAddress,
        'city'      => $faker->city,
        'state'     => $faker->state,
        'country'   => $faker->country,
        'zip_code'  => $faker->postcode
    ];
});
