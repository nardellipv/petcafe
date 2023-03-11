<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'description' => $faker->text(100),
        'provider' => $faker->company,
        'internalCode' => rand('100000', '999999'),
        'image' => $faker->imageUrl($width = 300, $height = 300),
        'buyPrice' => rand('100', '9999'),
        'sellPrice' => rand('100', '9999'),
        'discount' => rand('10', '99'),
        'quantity' => rand('1', '500'),
        'expire' => $faker->dateTimeBetween('-180days','30days'),
        'post' => $faker->randomElement($array = array('Si','No')),
        'slug' => Str::slug($name),
        'shop_id' => rand('1', '10'),
    ];
});
