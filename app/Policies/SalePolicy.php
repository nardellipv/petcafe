<?php

namespace App\Policies;

use App\Sale;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Sale $sale)
    {
        return $user->id == $sale->shop->user_id;
    }

    public function update(User $user, Sale $sale)
    {
        return $user->id == $sale->shop->user_id;
    }

    public function delete(User $user, Sale $sale)
    {
        return $user->id == $sale->shop->user_id;
    }
}
