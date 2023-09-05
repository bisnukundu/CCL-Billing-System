<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

class UserRolePolicy
{


//    Bill Collector Authorization
    public function bc(User $user): bool
    {
        return $user->role === UserRole::BillCollector;
    }

    //    Admin Authorization
    function admin(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    //    Accountant Authorization
    function ac(User $user): bool
    {
        return $user->role === UserRole::Accountant;
    }

    // Multiple Role Authorization
    function any(User $user, array $roles): bool
    {
        return in_array($user->role, $roles);
    }


}
