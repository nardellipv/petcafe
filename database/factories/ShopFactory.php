<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);
    return [
        'name' => $title,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'phoneWsp' => $faker->randomElement($array = array('Y', 'N')),
        'about' => $faker->text($maxNbChars = 500),
        'votes' => rand(0, 100),
        'visit' => rand(0, 100),
        'web' => $faker->url,
        'facebook' => 'https://www.facebook.com/celiacosmendozaOK',
        'instagram' => 'https://www.instagram.com/celiacosmendoza/',
        'logo' => '',
        'type' => $faker->randomElement($array = array('FREE','BASIC','CLASIC','PREMIUM')),
        'slug' => $title,
        'status' => $faker->randomElement($array = array('ACTIVE', 'DESACTIVE')),
        'user_id' => rand(1, 10),
        'city_id' => 6,
    ];
});
