<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post1;
use Illuminate\Auth\Access\Response;

class Post1Policy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, post1 $post1): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, post1 $post1): bool
    {
        return $user->id=== $post1->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, post1 $post1): bool
    {
        return $user->id=== $post1->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, post1 $post1): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, post1 $post1): bool
    {
        return false;
    }
}
