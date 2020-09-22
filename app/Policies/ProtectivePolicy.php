<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Protective;
use App\Models\User;

class ProtectivePolicy
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
     * @param  \App\Protective  $protective
     * @return mixed
     */
    public function view(User $user, Protective $protective)
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
        if($user->hasPermission('protectives-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Protective  $protective
     * @return mixed
     */
    public function update(User $user, Protective $protective)
    {
        if($user->hasPermission('protectives-update')) {
            return true;
        }

        return $user->id === $protective->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Protective  $protective
     * @return mixed
     */
    public function delete(User $user, Protective $protective)
    {
        if($user->hasPermission('protectives-delete')) {
            return true;
        }

        return $user->id === $protective->user_id;
    }
}
