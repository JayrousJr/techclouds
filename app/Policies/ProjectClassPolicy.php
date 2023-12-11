<?php

namespace App\Policies;

use App\Models\ProjectClass;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectClassPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('ProjectClass View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProjectClass $projectClass)
    {
        if ($user->hasPermissionTo('ProjectClass View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('ProjectClass Create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProjectClass $projectClass)
    {
        if ($user->hasPermissionTo('ProjectClass Edit')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProjectClass $projectClass)
    {
        if ($user->hasPermissionTo('ProjectClass Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProjectClass $projectClass)
    {
        if ($user->hasPermissionTo('ProjectClass Delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProjectClass $projectClass)
    {
        if ($user->hasPermissionTo('ProjectClass Delete')) {
            return true;
        }
        return false;
    }
}
