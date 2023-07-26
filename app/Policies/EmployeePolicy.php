<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
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
    public function view(Employer $employer, Employee $employee): bool
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
    public function update(Employer $employer, Employee $employee): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employer $employer, Employee $employee): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Employer $employer, Employee $employee): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Employer $employer, Employee $employee): bool
    {
        //
    }
}
