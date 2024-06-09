<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Informasi;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class InformasisPolicy
{

    use HandlesAuthorization;

    // Peran yang hanya bisa mengedit atau menghapus informasi yang mereka buat
    protected array $restrictedRoles = [
        'rw', 'sekretaris_rw', 'bendahara_rw', 'rt_10', 'rt_11'
    ];

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Informasi $information): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Informasi $informasi): bool
    {
        // if ($user->id == $informasi-> id ) {
        //     return true;
        // }
        
        return true;
        //
        // Admin dapat mengedit apa saja
        // if ($user->hasRole('admin')) {
        //     return true;
        // }

        // // Pengguna dengan peran tertentu hanya bisa mengedit informasi yang mereka buat
        // return in_array($user->role, $this->restrictedRoles) && $user->id === $information->created_by;

        // Admin dapat mengedit apapun, yang lain hanya informasi mereka sendiri
        // return $user->hasRole('admin') || 
        //        (in_array($user->role, $this->restrictedRoles) && $user->id === $informasi->created_by);

        // Check if $user->role is an array or string
        // $roles = $this->restrictedRoles;

        // return $user->hasRole('admin') ||
        //        (in_array($user->role, $roles) && $user->id === $informasi->created_by);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Informasi $informasi): bool
    {
        //
        // // Admin dapat menghapus apa saja
        // if ($user->hasRole('admin')) {
        //     return true;
        // }

        // // Pengguna dengan peran tertentu hanya bisa menghapus informasi yang mereka buat
        // return in_array($user->role, $this->restrictedRoles) && $user->id === $information->created_by;

        // Admin dapat menghapus apapun, yang lain hanya informasi mereka sendiri
        // return $user->hasRole('admin') || 
        //        (in_array($user->role, $user->restrictedRoles) && $user->id === $informasi->created_by);

        // Check if $user->role is an array or string
        $roles = $this->restrictedRoles;

        return $user->hasRole('admin') ||
               (in_array($user->role, $roles) && $user->id === $informasi->created_by);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Informasi $information): bool
    {
        //
        // return true;
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Informasi $information): bool
    {
        //
        // return true;
        return $user->hasRole('admin');
    }

    
}
