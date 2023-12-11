<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Auth\Access\Response;

class VisitorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if ($user->hasPermissionTo('Visitor View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Visitor $visitor)
    {
        if ($user->hasPermissionTo('Visitor View')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Visitor $visitor)
    {

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Visitor $visitor)
    {

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Visitor $visitor)
    {

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Visitor $visitor)
    {

        return false;
    }
}
