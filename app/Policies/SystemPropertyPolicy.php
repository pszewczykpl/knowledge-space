<?php

namespace App\Policies;

use App\Models\SystemProperty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemPropertyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if($user->hasPermission('system-properties-viewany')) {
            return true;
        }

        return false;
    }

    public function update(User $user)
    {
        if($user->hasPermission('system-properties-update')) {
            return true;
        }

        return false;
    }
}
