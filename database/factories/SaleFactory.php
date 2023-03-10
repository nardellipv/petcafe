<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'invoice' => $faker->numberBetween('00001','00100'),
        'quantity' => $faker->numberBetween('1','5'),
        'date' => $faker->dateTimeBetween('-5days','now'),
        'status' => $faker->randomElement($array = array('Pagada','Cuenta Corriente', 'Cancelada')),
        'mount' => $faker->numberBetween('100','99999'),
        'discount' => $faker->numberBetween('10','999'),
        'comment' => $faker->text,
        'client_id' => rand('1','10'),
        'shop_id' => rand('1','5'),
        'product_id' => rand('1','100'),
    ];
});
