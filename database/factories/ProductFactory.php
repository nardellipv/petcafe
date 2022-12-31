<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'provider' => $faker->company,
        'internalCode' => rand('100000', '999999'),
        'buyPrice' => rand('100', '9999'),
        'quantity' => rand('1', '500'),
        'expire' => $faker->dateTimeBetween('-180days','30days'),
        'slug' => Str::slug($name),
        'shop_id' => rand('1', '10'),
    ];
});
