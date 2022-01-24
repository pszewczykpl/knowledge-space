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
     * @param Risk $risk
     * @return bool
     */
    public function view(?User $user, Risk $risk): bool
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
        return $user->hasPermission('risks-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return bool
     */
    public function update(User $user, Risk $risk): bool
    {
        return $user->hasPermission('risks-update') or ($user->id === $risk->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Risk $risk
     * @return bool
     */
    public function delete(User $user, Risk $risk): bool
    {
        return $user->hasPermission('risks-delete') or ($user->id === $risk->user_id);
    }
}
