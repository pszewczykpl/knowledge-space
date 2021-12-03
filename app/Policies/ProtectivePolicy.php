<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Protective;
use App\Models\User;

class ProtectivePolicy
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
        return $user->hasPermission('protectives-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Protective $protective
     * @return bool
     */
    public function update(User $user, Protective $protective): bool
    {
        return $user->hasPermission('protectives-update') or ($user->id === $protective->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Protective $protective
     * @return bool
     */
    public function delete(User $user, Protective $protective): bool
    {
        return $user->hasPermission('protectives-delete') or ($user->id === $protective->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Protective $protective
     * @return bool
     */
    public function restore(User $user, Protective $protective): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Protective $protective
     * @return bool
     */
    public function forceDelete(User $user, Protective $protective): bool
    {
        return $user->hasPermission('force-delete');
    }
}
