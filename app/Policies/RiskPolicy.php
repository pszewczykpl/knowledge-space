<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Risk;
use App\Models\User;

class RiskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return mixed
     */
    public function view(User $user, Risk $risk)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission('risks-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return mixed
     */
    public function update(User $user, Risk $risk)
    {
        if($user->hasPermission('risks-update')) {
            return true;
        }

        return $user->id === $risk->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return mixed
     */
    public function delete(User $user, Risk $risk)
    {
        if($user->hasPermission('risks-delete')) {
            return true;
        }

        return $user->id === $risk->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return mixed
     */
    public function restore(User $user, Risk $risk)
    {
        if($user->hasPermission('restore')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return mixed
     */
    public function forceDelete(User $user, Risk $risk)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}
