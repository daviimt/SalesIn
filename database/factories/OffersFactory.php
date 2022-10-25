<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offers;
use Faker\Generator as Faker;

$factory->define(Offers::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'date_max' => $faker -> dateTimeBetween('now', '07 days'),
        'num_candidates' => $faker->randomDigitNotNull,
        'cicle_id' => \App\Cicles::all()->random()->id
    ];
});
