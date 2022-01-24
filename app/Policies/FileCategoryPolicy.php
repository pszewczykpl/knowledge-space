<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\FileCategory;
use App\Models\User;

class FileCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('file-categories-viewany');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param FileCategory $fileCategory
     * @return bool
     */
    public function view(User $user, FileCategory $fileCategory): bool
    {
        return $user->hasPermission('file-categories-view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('file-categories-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param FileCategory $fileCategory
     * @return bool
     */
    public function update(User $user, FileCategory $fileCategory): bool
    {
        return $user->hasPermission('file-categories-update') or ($user->id === $fileCategory->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param FileCategory $fileCategory
     * @return bool
     */
    public function delete(User $user, FileCategory $fileCategory): bool
    {
        return $user->hasPermission('file-categories-delete') or ($user->id === $fileCategory->user_id);
    }
}
