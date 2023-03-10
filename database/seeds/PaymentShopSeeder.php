<?php

use Illuminate\Database\Seeder;

class PaymentShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Payment_shop::class, 20)->create();
    }
}
