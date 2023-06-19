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
        $this->call(ProvinceSeed::class);
        // $this->call(ShopSeed::class);
        // $this->call(ProductSeed::class);
        // $this->call(ClientSeeder::class);
        // $this->call(SaleSeed::class);
        $this->call(PaymentSeeder::class);
        // $this->call(PaymentShopSeeder::class);
        // $this->call(CashSeeder::class);
        // $this->call(EmployeeSedeer::class);
    }
}
