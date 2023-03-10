<?php

namespace App\Policies;

use App\Shop;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function shopProfile(User $user, Shop $shop)
    {
        return $user->id == $shop->user_id;
    }
}
