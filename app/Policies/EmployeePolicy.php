<?php

namespace App\Policies;

use App\Employee;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Employee $employee)
    {
        return $user->id == $employee->shop->user_id;
    }

    public function delete(User $user, Employee $employee)
    {
        return $user->id == $employee->shop->user_id;
    }
}
