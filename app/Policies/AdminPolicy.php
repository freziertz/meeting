<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list admins');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Admin $admin): bool
    {
        // return $user->hasPermissionTo('list admins');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create admins');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Admin $admin): bool
    {
        return $user->hasPermissionTo('edit admins');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Admin $admin): bool
    {
        return $user->hasPermissionTo('delete admins');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Admin $admin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Admin $admin): bool
    {
        return false;
    }
}
