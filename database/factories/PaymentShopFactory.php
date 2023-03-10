<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment_shop;
use Faker\Generator as Faker;

$factory->define(Payment_shop::class, function (Faker $faker) {
    return [
        'shop_id' => rand(1, 10),
        'payment_id' => rand(1, 8),
    ];
});
