<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use Faker\Generator as Faker;

$factory->define(Board::class, function (Faker $faker) {
    return [
        'landing_rate' => null,
        'voting_allowed' => $faker->boolean,
        'user_id' => 1
    ];
});
