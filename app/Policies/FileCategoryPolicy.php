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
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->hasPermission('file-categories-viewany')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\FileCategory  $fileCategory
     * @return mixed
     */
    public function view(User $user, FileCategory $fileCategory)
    {
        if($user->hasPermission('file-categories-view')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission('file-categories-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\FileCategory  $fileCategory
     * @return mixed
     */
    public function update(User $user, FileCategory $fileCategory)
    {
        if($user->hasPermission('file-categories-update')) {
            return true;
        }

        return $user->id === $fileCategory->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\FileCategory  $fileCategory
     * @return mixed
     */
    public function delete(User $user, FileCategory $fileCategory)
    {
        if($user->hasPermission('file-categories-delete')) {
            return true;
        }

        return $user->id === $fileCategory->user_id;
    }
}
