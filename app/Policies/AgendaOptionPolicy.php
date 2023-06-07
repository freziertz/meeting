<?php

namespace App\Policies;

use App\Models\AgendaOption;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AgendaOptionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list agenda_options');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AgendaOption $agendaoption): bool
    {
        // return $user->hasPermissionTo('list agenda_options');
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return $user->hasRole('Admin');
        return $user->hasPermissionTo('create agenda_options');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AgendaOption $agendaoption): bool
    {
        return $user->hasPermissionTo('edit agenda_options');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AgendaOption $agendaoption): bool
    {
        return $user->hasPermissionTo('delete agenda_options');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AgendaOption $agendaoption): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AgendaOption $agendaoption): bool
    {
        return false;
    }
}
