<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        'name' => $title,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'about' => $faker->text($maxNbChars = 500),
        'email' => $faker->email(),
        'shop_id' => rand(1, 10),
    ];
});
