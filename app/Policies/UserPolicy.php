<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole('Administrator')) {
            $model = Auth::user()->id;
            return $user->id === $model;
        }
        if ($user->hasRole('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model)
    {
        if ($user->hasRole('Administrator')) {
            return $user->id === $model->id;
        }
        if ($user->hasRole('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('User Create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model)
    {
        if ($user->hasRole('Administrator')) {
            return $user->id === $model->id;
        }
        if ($user->hasRole('Manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        if ($user->hasPermissionTo('User Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model)
    {
        if ($user->hasPermissionTo('User Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model)
    {
        if ($user->hasPermissionTo('User Delete')) {
            return true;
        }
        return false;
    }
}
