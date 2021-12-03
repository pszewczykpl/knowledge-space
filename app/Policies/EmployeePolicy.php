<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Employee;
use App\Models\User;

class EmployeePolicy
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
        return $user->hasPermission('employees-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function update(User $user, Employee $employee): bool
    {
        return $user->hasPermission('employees-update') or ($user->id === $employee->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->hasPermission('employees-delete') or ($user->id === $employee->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function restore(User $user, Employee $employee): bool
    {
        return $user->hasPermission('restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Employee $employee
     * @return bool
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return $user->hasPermission('force-delete');
    }
}
