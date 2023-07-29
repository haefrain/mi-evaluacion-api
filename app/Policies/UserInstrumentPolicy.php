<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserInstrument;
use Illuminate\Auth\Access\Response;

class UserInstrumentPolicy
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
    public function view(User $users, UserInstrument $model): bool
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
    public function update(User $users, UserInstrument $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $users, UserInstrument $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $users, UserInstrument $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $users, UserInstrument $model): bool
    {
        return true;
    }
}
