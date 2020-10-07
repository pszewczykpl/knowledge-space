<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\News;
use App\Models\User;

class NewsPolicy
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
        if($user->hasPermission('news-viewany')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function view(User $user, News $news)
    {
        if($user->hasPermission('news-view')) {
            return true;
        }

        return $user->id === $news->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->hasPermission('news-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function update(User $user, News $news)
    {
        if($user->hasPermission('news-update')) {
            return true;
        }

        return $user->id === $news->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\News  $news
     * @return mixed
     */
    public function delete(User $user, News $news)
    {
        if($user->hasPermission('news-delete')) {
            return true;
        }

        return $user->id === $news->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\News  $news
     * @return mixed
     */
    public function restore(User $user, News $news)
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
     * @param  \App\Models\News  $news
     * @return mixed
     */
    public function forceDelete(User $user, News $news)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}
