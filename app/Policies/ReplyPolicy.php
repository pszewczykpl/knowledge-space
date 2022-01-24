<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param ?User $user
     * @param Reply $reply
     * @return bool
     */
    public function view(?User $user, Reply $reply): bool
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
        return $user->hasPermission('replies-create');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Reply $reply
     * @return bool
     */
    public function delete(User $user, Reply $reply): bool
    {
        return $user->hasPermission('replies-delete') or ($user->id === $reply->user_id);
    }
}
