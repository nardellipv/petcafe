<?php

namespace App\Policies;

use App\Provider;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Provider $provider)
    {        
        return $user->id == $provider->shop->user_id;
    }

    public function update(User $user, Provider $provider)
    {
        return $user->id == $provider->shop->user_id;
    }

    public function delete(User $user, Provider $provider)
    {
        return $user->id == $provider->shop->user_id;
    }
}
