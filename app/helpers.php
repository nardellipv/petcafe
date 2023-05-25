<?php

use App\Shop;
use Illuminate\Support\Facades\Auth;

function userConnect()
{
    return Auth::user();
}

function shopConnect()
{
    $shop = Shop::where('user_id', userConnect()->id)
        ->first();

    return $shop;
}
