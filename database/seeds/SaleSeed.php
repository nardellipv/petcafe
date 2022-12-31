<?php

use App\Sale;
use Illuminate\Database\Seeder;

class SaleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sale::class, 100)->create();
    }
}
