<?php

namespace App\Policies;

use App\Models\DiseaseClaim;
use App\Models\Employer;
use Illuminate\Auth\Access\Response;

class DiseaseClaimPolicy
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
    public function view(Employer $employer, DiseaseClaim $diseaseClaim): bool
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
    public function update(Employer $employer, DiseaseClaim $diseaseClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employer $employer, DiseaseClaim $diseaseClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Employer $employer, DiseaseClaim $diseaseClaim): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employer $employer, DiseaseClaim $diseaseClaim): bool
    {
        //
    }
}
