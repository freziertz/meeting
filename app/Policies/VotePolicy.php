<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Auth\Access\Response;

class VotePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list votes');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vote $vote): bool
    {
        // return $user->hasPermissionTo('list votes');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create votes');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vote $vote): bool
    {
        return $user->hasPermissionTo('edit votes');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vote $vote): bool
    {
        return $user->hasPermissionTo('delete votes');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vote $vote): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vote $vote): bool
    {
        return false;
    }
}
