<?php

namespace App\Policies;

use App\Product;
use App\Shop;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChangePostProductPolicy
{
    use HandlesAuthorization;

    public function changePostProduct(Product $product, Shop $shop)
    {
    }
}
