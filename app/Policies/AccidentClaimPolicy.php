<?php

namespace App\Policies;

use App\Models\AccidentClaim;
use App\Models\Employer;
use Illuminate\Auth\Access\Response;

class AccidentClaimPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Employer $employer): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Employer $employer, AccidentClaim $accidentClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Employer $employer): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Employer $employer, AccidentClaim $accidentClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employer $employer, AccidentClaim $accidentClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Employer $employer, AccidentClaim $accidentClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employer $employer, AccidentClaim $accidentClaim): bool
    {
        //
    }
}
