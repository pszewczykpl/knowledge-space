<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Partner;
use App\Models\User;

class PartnerPolicy
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
     * @param Partner $partner
     * @return bool
     */
    public function view(?User $user, Partner $partner): bool
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
}
