<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

class UserRolePolicy
{


    //    Bill Collector Authorization
    public function bc(User $user): bool
    {
        return in_array($user->role, [UserRole::BillCollector, UserRole::Admin]);
    }

    //    Admin Authorization
    function admin(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    //    Accountant Authorization
    function ac(User $user): bool
    {
        return in_array($user->role, [UserRole::Accountant, UserRole::Admin]);
    }

    function any(User $user): bool
    {
        return in_array($user->role, [UserRole::Accountant, UserRole::BillCollector, UserRole::Admin]);
    }

    // Multiple Role Authorization

}
