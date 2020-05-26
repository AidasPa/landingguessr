<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Vote::class, function (Faker $faker) {
    return [
        'twitch_username' => $faker->userName,
        'guess' => $faker->numberBetween(-300, -50),
        'board_id' => 1
    ];
});
