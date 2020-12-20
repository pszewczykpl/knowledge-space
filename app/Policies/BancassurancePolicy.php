<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Bancassurance;
use App\Models\User;

class BancassurancePolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bancassurance  $bancassurance
     * @return mixed
     */
    public function view(User $user, Bancassurance $bancassurance)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission('bancassurances-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bancassurance  $bancassurance
     * @return mixed
     */
    public function update(User $user, Bancassurance $bancassurance)
    {
        if($user->hasPermission('bancassurances-update')) {
            return true;
        }

        return $user->id === $bancassurance->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bancassurance  $bancassurance
     * @return mixed
     */
    public function delete(User $user, Bancassurance $bancassurance)
    {
        if($user->hasPermission('bancassurances-delete')) {
            return true;
        }

        return $user->id === $bancassurance->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return mixed
     */
    public function restore(User $user, Bancassurance $bancassurance)
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
     * @param  \App\Models\Bancassurance  $bancassurance
     * @return mixed
     */
    public function forceDelete(User $user, Bancassurance $bancassurance)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}
