<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Bancassurance;
use App\Models\User;

class BancassurancePolicy
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
        return $user->hasPermission('bancassurances-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Bancassurance $bancassurance
     * @return bool
     */
    public function update(User $user, Bancassurance $bancassurance): bool
    {
        return $user->hasPermission('bancassurances-update') or ($user->id === $bancassurance->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Bancassurance $bancassurance
     * @return bool
     */
    public function delete(User $user, Bancassurance $bancassurance): bool
    {
        return $user->hasPermission('bancassurances-delete') or ($user->id === $bancassurance->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Bancassurance $bancassurance
     * @return bool
     */
    public function restore(User $user, Bancassurance $bancassurance): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Bancassurance $bancassurance
     * @return bool
     */
    public function forceDelete(User $user, Bancassurance $bancassurance): bool
    {
        return $user->hasPermission('force-delete');
    }
}
