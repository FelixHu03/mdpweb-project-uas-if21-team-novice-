<?php

namespace App\Policies;

use App\Models\Tamu;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TamuPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'A'|| $user->role === 'M' || $user->role === 'R';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tamu $tamu): bool
    {
        return $user->role === 'A'|| $user->role === 'M' || $user->role === 'R';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'A'|| $user->role === 'M' || $user->role === 'R';
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tamu $tamu): bool
    {
        return $user->role === 'A'|| $user->role === 'M' || $user->role === 'R';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tamu $tamu): bool
    {
        
        return $user->role === 'A'|| $user->role === 'M' || $user->role === 'R';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tamu $tamu): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tamu $tamu): bool
    {
        //
    }
}
