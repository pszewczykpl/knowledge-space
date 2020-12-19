<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\PostCategory;
use App\Models\User;

class PostCategoryPolicy
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
        if($user->hasPermission('post-categories-viewany')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCategory  $postCategory
     * @return mixed
     */
    public function view(User $user, PostCategory $postCategory)
    {
        if($user->hasPermission('post-categories-view')) {
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
        if($user->hasPermission('post-categories-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCategory  $postCategory
     * @return mixed
     */
    public function update(User $user, PostCategory $postCategory)
    {
        if($user->hasPermission('post-categories-update')) {
            return true;
        }

        return $user->id === $postCategory->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\PostCategory  $postCategory
     * @return mixed
     */
    public function delete(User $user, PostCategory $postCategory)
    {
        if($user->hasPermission('post-categories-delete')) {
            return true;
        }

        return $user->id === $postCategory->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PostCategory  $postCategory
     * @return mixed
     */
    public function restore(User $user, PostCategory $postCategory)
    {
        if($user->hasPermission('restore')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PostCategory  $postCategory
     * @return mixed
     */
    public function forceDelete(User $user, PostCategory $postCategory)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}