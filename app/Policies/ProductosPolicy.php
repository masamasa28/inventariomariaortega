<?php

namespace App\Policies;

use App\Models\User;
use App\Models\productos;
use Illuminate\Auth\Access\Response;

class ProductosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Todos los roles pueden ver productos
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, productos $productos): bool
    {
        return true; // Todos los roles pueden ver productos
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'InventarioAdmi','Gerente']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, productos $productos): bool
    {
        return $user->hasAnyRole(['Admin', 'InventarioAdmi','Gerente']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, productos $productos): bool
    {
        return $user->hasAnyRole(['Admin', 'InventarioAdmi','Gerente']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, productos $productos): bool
    {
        return $user->hasAnyRole(['Admin', 'InventarioAdmi','Gerente']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, productos $productos): bool
    {
        return $user->hasAnyRole(['Admin', 'InventarioAdmi','Gerente']);
    }
}
