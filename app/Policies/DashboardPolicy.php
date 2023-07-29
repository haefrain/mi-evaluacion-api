<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class DashboardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $users): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $users): bool
    {
        return true;
    }
}
