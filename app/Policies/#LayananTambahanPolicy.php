<?php

namespace App\Policies;

use App\Models\User;
use App\Models\layanan_tambahan;
use Illuminate\Auth\Access\Response;

class LayananTambahanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
      
        return $user->role === 'A' || $user->role === 'M' || $user->role === 'R';
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, layanan_tambahan $lyn): bool
    {
        return false;
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        
        return $user->role === 'A' || $user->role === 'M' || $user->role === 'R';
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, layanan_tambahan $lyn): bool
    {
        return $user->role === 'A' || $user->role === 'M' || $user->role === 'R';
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, layanan_tambahan $lyn): bool
    {
        return $user->role === 'A' || $user->role === 'M' || $user->role === 'R';
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, layanan_tambahan $lyn): bool
    {
    //    
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, layanan_tambahan $lyn): bool
    {
        // 
    }
}
