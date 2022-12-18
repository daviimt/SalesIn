<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articles;
use Faker\Generator as Faker;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence,
        // 'image'=> $faker->sentence,
        'description'=> $faker->paragraph,
        'cicle_id'=> \App\Cicles::all()->random()->id
    ];
});
