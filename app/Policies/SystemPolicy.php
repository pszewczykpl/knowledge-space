<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\System;
use App\Models\User;

class SystemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('systems-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param System $system
     * @return bool
     */
    public function update(User $user, System $system): bool
    {
        return $user->hasPermission('systems-update') or ($user->id === $system->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param System $system
     * @return bool
     */
    public function delete(User $user, System $system): bool
    {
        return $user->hasPermission('systems-delete') or ($user->id === $system->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param System $system
     * @return bool
     */
    public function restore(User $user, System $system): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param System $system
     * @return bool
     */
    public function forceDelete(User $user, System $system): bool
    {
        return $user->hasPermission('force-delete');
    }
}
