<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinceSeed::class);
        $this->call(CitySeed::class);
        $this->call(UserSeed::class);
        $this->call(ShopSeed::class);
        $this->call(ProductSeed::class);
        $this->call(CustomerSeed::class);        
        $this->call(SaleSeed::class);
    }
}
