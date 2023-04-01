<?php

namespace App\Policies;

use App\Client;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Client $client)
    {
    }

    public function update(User $user, Client $client)
    {
        return $user->id == $client->shop->user_id;
    }

    public function delete(User $user, Client $client)
    {
        return $user->id == $client->shop->user_id;
    }
}
