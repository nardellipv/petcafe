<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'name' => $faker->creditCardType,
        'type' => $faker->randomElement($array = array('I','P','B')),
        'photo' => $faker->imageUrl($width = 300, $height = 300),
    ];
});
