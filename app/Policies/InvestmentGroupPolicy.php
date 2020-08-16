<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\InvestmentGroup;
use App\User;

class InvestmentGroupPolicy
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
     * @param  \App\InvestmentGroup  $investmentGroup
     * @return mixed
     */
    public function view(User $user, InvestmentGroup $investmentGroup)
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
        if($user->hasPermission('investment-groups-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\InvestmentGroup  $investmentGroup
     * @return mixed
     */
    public function update(User $user, InvestmentGroup $investmentGroup)
    {
        if($user->hasPermission('investment-groups-update')) {
            return true;
        }

        return $user->id === $investmentGroup->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\InvestmentGroup  $investmentGroup
     * @return mixed
     */
    public function delete(User $user, InvestmentGroup $investmentGroup)
    {
        if($user->hasPermission('investment-groups-delete')) {
            return true;
        }

        return $user->id === $investmentGroup->user_id;
    }
}
