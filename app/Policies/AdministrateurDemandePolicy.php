<?php

namespace App\Policies;

use App\Models\User;
use App\Models\administrateur_demande;
use Illuminate\Auth\Access\Response;

class AdministrateurDemandePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, administrateur_demande $administrateurDemande): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, administrateur_demande $administrateurDemande): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, administrateur_demande $administrateurDemande): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, administrateur_demande $administrateurDemande): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, administrateur_demande $administrateurDemande): bool
    {
        //
    }
}
