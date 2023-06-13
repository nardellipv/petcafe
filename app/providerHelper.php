<?php

use App\Provider;

function selectProvider()
{
    $providers = Provider::where('shop_id', shopConnect()->id)
        ->get();

    return $providers;
}
