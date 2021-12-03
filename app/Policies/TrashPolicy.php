<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class TrashPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('view-deleted');
    }
}
