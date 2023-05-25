<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween('1','5'),
        'status' => $faker->randomElement($array = array('0','1')),
        'sellPrice' => $faker->numberBetween('100','99999'),
        'shop_id' => rand('1','5'),
        'product_id' => rand('1','100'),
    ];
});
