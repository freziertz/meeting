<?php

namespace App\Policies;

use App\Models\ActionStatus;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActionStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list action_statuses');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ActionStatus $actionstatus): bool
    {
        // return $user->hasPermissionTo('list action_statuses');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create action_statuses');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ActionStatus $actionstatus): bool
    {
        return $user->hasPermissionTo('edit action_statuses');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ActionStatus $actionstatus): bool
    {
        return $user->hasPermissionTo('delete action_statuses');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ActionStatus $actionstatus): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ActionStatus $actionstatus): bool
    {
        return false;
    }
}
