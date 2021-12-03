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
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('post-categories-viewany');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param PostCategory $postCategory
     * @return bool
     */
    public function view(User $user, PostCategory $postCategory): bool
    {
        return $user->hasPermission('post-categories-view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('post-categories-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param PostCategory $postCategory
     * @return bool
     */
    public function update(User $user, PostCategory $postCategory): bool
    {
        return $user->hasPermission('post-categories-update') or ($user->id === $postCategory->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param PostCategory $postCategory
     * @return bool
     */
    public function delete(User $user, PostCategory $postCategory): bool
    {
        return $user->hasPermission('post-categories-delete') or ($user->id === $postCategory->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param PostCategory $postCategory
     * @return bool
     */
    public function restore(User $user, PostCategory $postCategory): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param PostCategory $postCategory
     * @return bool
     */
    public function forceDelete(User $user, PostCategory $postCategory): bool
    {
        return $user->hasPermission('force-delete');
    }
}