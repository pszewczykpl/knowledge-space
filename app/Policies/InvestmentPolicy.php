<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Investment;
use App\Models\User;

class InvestmentPolicy
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
     * @param  \App\Investment  $investment
     * @return mixed
     */
    public function view(User $user, Investment $investment)
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
        if($user->hasPermission('investments-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Investment  $investment
     * @return mixed
     */
    public function update(User $user, Investment $investment)
    {
        if($user->hasPermission('investments-update')) {
            return true;
        }

        return $user->id === $investment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Investment  $investment
     * @return mixed
     */
    public function delete(User $user, Investment $investment)
    {
        if($user->hasPermission('investments-delete')) {
            return true;
        }

        return $user->id === $investment->user_id;
    }
}
