<?php

namespace App\Policies;

use App\Models\ReviewRoom;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewRoomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list review_rooms');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReviewRoom $reviewroom): bool
    {
        // return $user->hasPermissionTo('list review_rooms');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create review_rooms');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReviewRoom $reviewroom): bool
    {
        return $user->hasPermissionTo('edit review_rooms');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReviewRoom $reviewroom): bool
    {
        return $user->hasPermissionTo('delete review_rooms');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ReviewRoom $reviewroom): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReviewRoom $reviewroom): bool
    {
        return false;
    }
}
