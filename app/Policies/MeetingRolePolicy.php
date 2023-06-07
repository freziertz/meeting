<?php

namespace App\Policies;

use App\Models\MeetingRole;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MeetingRolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list meeting_roles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MeetingRole $meetingrole): bool
    {
        // return $user->hasPermissionTo('list meeting_roles');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create meeting_roles');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MeetingRole $meetingrole): bool
    {
        return $user->hasPermissionTo('edit meeting_roles');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MeetingRole $meetingrole): bool
    {
        return $user->hasPermissionTo('delete meeting_roles');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MeetingRole $meetingrole): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MeetingRole $meetingrole): bool
    {
        return false;
    }
}
