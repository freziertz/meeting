<?php

namespace App\Policies;

use App\Models\Presenter;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PresenterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list presenters');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Presenter $presenter): bool
    {
        // return $user->hasPermissionTo('list presenters');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create presenters');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Presenter $presenter): bool
    {
        return $user->hasPermissionTo('edit presenters');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Presenter $presenter): bool
    {
        return $user->hasPermissionTo('delete presenters');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Presenter $presenter): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Presenter $presenter): bool
    {
        return false;
    }
}
