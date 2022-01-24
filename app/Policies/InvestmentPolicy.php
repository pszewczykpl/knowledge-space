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
     * @param ?User $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        /**
         * Anyone can view any models.
         */
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param ?User $user
     * @param Investment $investment
     * @return bool
     */
    public function view(?User $user, Investment $investment): bool
    {
        /**
         * Anyone can view any models.
         */
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('investments-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return bool
     */
    public function update(User $user, Investment $investment): bool
    {
        return $user->hasPermission('investments-update') or ($user->id === $investment->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return bool
     */
    public function delete(User $user, Investment $investment): bool
    {
        return $user->hasPermission('investments-delete') or ($user->id === $investment->user_id);
    }
}
