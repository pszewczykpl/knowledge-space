<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\News;
use App\Models\User;

class NewsPolicy
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
        return $user->hasPermission('news-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function update(User $user, News $news): bool
    {
        return $user->hasPermission('news-update') or ($user->id === $news->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function delete(User $user, News $news): bool
    {
        return $user->hasPermission('news-delete') or ($user->id === $news->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function restore(User $user, News $news): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param News $news
     * @return bool
     */
    public function forceDelete(User $user, News $news): bool
    {
        return $user->hasPermission('force-delete');
    }
}
