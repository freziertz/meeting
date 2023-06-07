<?php

namespace App\Policies;

use App\Models\Directory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DirectoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list directories');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Directory $directory): bool
    {
        // return $user->hasPermissionTo('list directories');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create directories');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Directory $directory): bool
    {
        return $user->hasPermissionTo('edit directories');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Directory $directory): bool
    {
        return $user->hasPermissionTo('delete directories');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Directory $directory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Directory $directory): bool
    {
        return false;
    }
}
