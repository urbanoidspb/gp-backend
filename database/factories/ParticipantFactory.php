<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'patronymic' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'event_id' => function () {
            return factory(\App\Models\Event::class)->create()->id;
        }
    ];
});
