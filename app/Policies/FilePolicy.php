<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\File;
use App\Models\User;

class FilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param File $file
     * @return bool
     */
    public function view(User $user, File $file): bool
    {
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
        return $user->hasPermission('files-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param File $file
     * @return bool
     */
    public function update(User $user, File $file): bool
    {
        return $user->hasPermission('files-update') or ($user->id === $file->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param File $file
     * @return bool
     */
    public function delete(User $user, File $file): bool
    {
        return $user->hasPermission('files-delete') or ($user->id === $file->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param File $file
     * @return bool
     */
    public function restore(User $user, File $file): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param File $file
     * @return bool
     */
    public function forceDelete(User $user, File $file): bool
    {
        return $user->hasPermission('force-delete');
    }
}
