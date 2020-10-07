<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if($user->hasPermission('replies-create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reply  $reply
     * @return mixed
     */
    public function delete(User $user, Reply $reply)
    {
        if($user->hasPermission('replies-delete')) {
            return true;
        }

        return $user->id === $reply->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reply  $reply
     * @return mixed
     */
    public function restore(User $user, Reply $reply)
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
     * @param  \App\Models\Reply  $reply
     * @return mixed
     */
    public function forceDelete(User $user, Reply $reply)
    {
        if($user->hasPermission('force-delete')) {
            return true;
        }

        return false;
    }
}
