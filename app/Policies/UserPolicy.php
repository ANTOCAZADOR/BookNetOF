<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol === 'administrator'; 
    }

    /**
     * Determine whether the user can view the model.
     */
    /*public function view(User $user): 
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    /*public function create(User $user): 
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    /*public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    /*public function delete(User $user): 
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    /*public function restore(User $user): 
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    /*public function forceDelete(User $user):
    {
        //
    }*/

    public function viewAdminDashboard(User $user): bool
    {
        return $user->rol === 'administrator'; // Devuelve true si el usuario es admin
    }


}