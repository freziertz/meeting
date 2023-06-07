<?php

namespace App\Policies;

use App\Models\ActionHistory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActionHistoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list action_histories');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ActionHistory $actionhistory): bool
    {
        // return $user->hasPermissionTo('list action_histories');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create action_histories');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ActionHistory $actionhistory): bool
    {
        return $user->hasPermissionTo('edit action_histories');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ActionHistory $actionhistory): bool
    {
        return $user->hasPermissionTo('delete action_histories');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ActionHistory $actionhistory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ActionHistory $actionhistory): bool
    {
        return false;
    }
}
