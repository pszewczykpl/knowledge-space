<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Note;
use App\Models\User;

class NotePolicy
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
        return $user->hasPermission('notes-viewany');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param ?User $user
     * @param Note $note
     * @return bool
     */
    public function view(?User $user, Note $note): bool
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
        return $user->hasPermission('notes-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Note $note
     * @return bool
     */
    public function update(User $user, Note $note): bool
    {
        return $user->hasPermission('notes-update') or ($user->id === $note->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Note $note
     * @return bool
     */
    public function delete(User $user, Note $note): bool
    {
        return $user->hasPermission('notes-delete') or ($user->id === $note->user_id);
    }
}
