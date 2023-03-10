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
            ['name' => 'Visa', 'photo' => 'assets/icons/payments/visa.png'],
            ['name' => 'MasterCard', 'photo' => 'assets/icons/payments/mastercard.png'],
            ['name' => 'AmericanExpress', 'photo' => 'assets/icons/payments/amex.png'],
            ['name' => 'AngenCard', 'photo' => 'assets/icons/payments/agencard.png'],
            ['name' => 'Cabal', 'photo' => 'assets/icons/payments/cabal.png'],
            ['name' => 'Maestro', 'photo' => 'assets/icons/payments/maestro.png'],
            ['name' => 'Diners Club', 'photo' => 'assets/icons/payments/diners.png'],
            ['name' => 'Mercado Pago', 'photo' => 'assets/icons/payments/mp.png'],
        ];

        foreach ($payments as $payment) {
            \App\Payment::create($payment);
        }
    }
}
