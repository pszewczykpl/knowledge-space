<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Permission;
use App\User;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->hasPermission('permissions-viewany')) {
            return true;
        }

        return false;
    }
}
