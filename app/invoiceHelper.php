<?php

use App\Employee;
use App\Payment_shop;
use App\Product;
use App\Sale;

function invoiceNumberTemp()
{
    $invoiceNumberTemp = Sale::where('shop_id', shopConnect()->id)
        ->where('status', '0')
        ->first();

    if (!$invoiceNumberTemp) {
        $invoiceNumber = Sale::where('shop_id', shopConnect()->id)
            ->latest()
            ->first();
        if (!$invoiceNumber) {

            $invoice = 1;
        } else {

            $invoice = $invoiceNumber->invoice + 1;
        }
    } else {
        $invoice = $invoiceNumberTemp->invoice;
    }

    return $invoice;
}

function productAdded()
{
    $productsAdded = Sale::with(['product', 'client'])
        ->where('shop_id', shopConnect()->id)
        ->where('status', '0')
        ->get();

    return $productsAdded;
}

function paymentShop()
{
    $payments = Payment_shop::with(['payment'])
        ->where('shop_id', shopConnect()->id)
        ->get();

    $paymentMoveCash = Payment_shop::where('shop_id', shopConnect()->id)
        ->join('payments', 'payments.id', 'payment_shops.payment_id')
        ->where('payments.type', 'B')
        ->get();

    return [$payments, $paymentMoveCash];
}

function employeeConnect()
{
    $employeeConnect = Employee::where('shop_id', shopConnect()->id)
        ->where('isOnline', 1)
        ->first();

    return $employeeConnect;
}

function quantityAndSumProducts()
{
    $products = Product::where('shop_id', shopConnect()->id)
        ->get();

    $sumProduct = Sale::where('shop_id', shopConnect()->id)
        ->where('status', '0')
        ->sum('quantity');

    $sumTotal = Sale::where('shop_id', shopConnect()->id)
        ->where('status', '0')
        ->sum('sellPrice');

    return [$products, $sumProduct, $sumTotal];
}
