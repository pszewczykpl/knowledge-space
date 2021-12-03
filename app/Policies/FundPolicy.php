<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Fund;
use App\Models\User;

class FundPolicy
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
        return $user->hasPermission('funds-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Fund $fund
     * @return bool
     */
    public function update(User $user, Fund $fund): bool
    {
        return $user->hasPermission('funds-update') or ($user->id === $fund->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Fund $fund
     * @return bool
     */
    public function delete(User $user, Fund $fund): bool
    {
        return $user->hasPermission('funds-delete') or ($user->id === $fund->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Fund $fund
     * @return bool
     */
    public function restore(User $user, Fund $fund): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Fund $fund
     * @return bool
     */
    public function forceDelete(User $user, Fund $fund): bool
    {
        return $user->hasPermission('force-delete');
    }
}
