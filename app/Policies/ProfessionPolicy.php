<?php

namespace App\Policies;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfessionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('Profession View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Profession $profession)
    {
        if ($user->hasPermissionTo('Profession View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('Profession Create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Profession $profession)
    {
        if ($user->hasPermissionTo('Profession Edit')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Profession $profession)
    {
        if ($user->hasPermissionTo('Profession Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Profession $profession)
    {
        if ($user->hasPermissionTo('Profession Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Profession $profession)
    {
        if ($user->hasPermissionTo('Profession Delete')) {
            return true;
        }
        return false;
    }
}
