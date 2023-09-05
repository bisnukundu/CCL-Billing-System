<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;

class UserRolePolicy
{


//    Bill Collector Authorization
    public function bc(User $user, UserRole $role): bool
    {
        return $user->role === $role;
    }

    //    Admin Authorization
    function admin(User $user, UserRole $role): bool
    {
        return $user->role === $role;
    }

    //    Accountant Authorization
    function ac(User $user, UserRole $role): bool
    {
        return $user->role === $role;
    }

    // Multiple Role Authorization



}
