<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Partner;
use App\Models\User;

class PartnerPolicy
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
        return $user->hasPermission('partners-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Partner $partner
     * @return bool
     */
    public function update(User $user, Partner $partner): bool
    {
        return $user->hasPermission('partners-update') or ($user->id === $partner->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Partner $partner
     * @return bool
     */
    public function delete(User $user, Partner $partner): bool
    {
        return $user->hasPermission('partners-delete') or ($user->id === $partner->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Partner $partner
     * @return bool
     */
    public function restore(User $user, Partner $partner): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Partner $partner
     * @return bool
     */
    public function forceDelete(User $user, Partner $partner): bool
    {
        return $user->hasPermission('force-delete');
    }
}
