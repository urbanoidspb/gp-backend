<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'description' => $faker->realText(),
        'time' => now(),
        'is_relevant' => $faker->boolean
    ];
});
