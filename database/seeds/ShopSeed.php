<?php

use App\Shop;
use Illuminate\Database\Seeder;

class ShopSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Shop::class, 10)->create();
    }
}
