<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'time' => now()
    ];
});
