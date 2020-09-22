<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Fund;
use App\Models\User;

class FundPolicy
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
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function view(User $user, Fund $fund)
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
        if($user->hasPermission('funds-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function update(User $user, Fund $fund)
    {
        if($user->hasPermission('funds-update')) {
            return true;
        }

        return $user->id === $fund->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Fund  $fund
     * @return mixed
     */
    public function delete(User $user, Fund $fund)
    {
        if($user->hasPermission('funds-delete')) {
            return true;
        }

        return $user->id === $fund->user_id;
    }
}
