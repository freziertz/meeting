<?php

namespace App\Policies;

use App\Models\Timezone;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TimezonePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list timezones');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Timezone $timezone): bool
    {
        // return $user->hasPermissionTo('list timezones');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create timezones');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Timezone $timezone): bool
    {
        return $user->hasPermissionTo('edit timezones');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Timezone $timezone): bool
    {
        return $user->hasPermissionTo('delete timezones');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Timezone $timezone): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Timezone $timezone): bool
    {
        return false;
    }
}
