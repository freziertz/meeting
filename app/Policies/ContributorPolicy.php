<?php

namespace App\Policies;

use App\Models\Contributor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContributorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list contributors');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contributor $contributor): bool
    {
        // return $user->hasPermissionTo('list contributors');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create contributors');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contributor $contributor): bool
    {
        return $user->hasPermissionTo('edit contributors');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contributor $contributor): bool
    {
        return $user->hasPermissionTo('delete contributors');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contributor $contributor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contributor $contributor): bool
    {
        return false;
    }
}
