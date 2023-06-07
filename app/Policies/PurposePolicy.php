<?php

namespace App\Policies;

use App\Models\Purpose;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PurposePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list purposes');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Purpose $purpose): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Purpose $purpose): bool
    {
        // return $user->hasPermissionTo('edit purposes');
        return $user->id === $purpose->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Purpose $purpose): bool
    {
         return $user->hasPermissionTo('delete purposes');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Purpose $purpose): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Purpose $purpose): bool
    {
        return true;
    }
}
