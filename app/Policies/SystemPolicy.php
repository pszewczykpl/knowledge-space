<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\System;
use App\Models\User;

class SystemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $system
     * @return mixed
     */
    public function view(User $user, System $system)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission('systems-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $system
     * @return mixed
     */
    public function update(User $user, System $system)
    {
        if($user->hasPermission('systems-update')) {
            return true;
        }

        return $user->id === $system->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $system
     * @return mixed
     */
    public function delete(User $user, System $system)
    {
        if($user->hasPermission('systems-delete')) {
            return true;
        }

        return $user->id === $system->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $system
     * @return mixed
     */
    public function restore(User $user, System $system)
    {
        if($user->hasPermission('restore')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System  $system
     * @return mixed
     */
    public function forceDelete(User $user, System $system)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}
