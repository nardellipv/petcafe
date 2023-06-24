<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();

        $payments = [
            ['name' => 'Visa', 'type'=>'P', 'photo' => 'assets/icons/payments/visa.png'],
            ['name' => 'MasterCard', 'type'=>'P', 'photo' => 'assets/icons/payments/mastercard.png'],
            ['name' => 'AmericanExpress', 'type'=>'P', 'photo' => 'assets/icons/payments/amex.png'],
            ['name' => 'AngenCard', 'type'=>'P', 'photo' => 'assets/icons/payments/agencard.png'],
            ['name' => 'Cabal', 'type'=>'P', 'photo' => 'assets/icons/payments/cabal.png'],
            ['name' => 'Maestro', 'type'=>'P', 'photo' => 'assets/icons/payments/maestro.png'],
            ['name' => 'Diners Club', 'type'=>'P', 'photo' => 'assets/icons/payments/diners.png'],
            ['name' => 'Mercado Pago', 'type'=>'B', 'photo' => 'assets/icons/payments/mp.png'],
            ['name' => 'Efectivo', 'type'=>'B', 'photo' => 'assets/icons/payments/mp.png'],
        ];

        foreach ($payments as $payment) {
            \App\Payment::create($payment);
        }
    }
}
