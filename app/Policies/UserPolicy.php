<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $loggedInUser, User $targetUser)
    {
        return $loggedInUser->id === $targetUser->id;
    }
}
