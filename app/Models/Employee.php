<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employer_id', 'last_name', 'first_name', 'middle_name', 'date_of_birth',
        'gender', 'marital_status', 'email', 'employment_date', 'address',
        'state_of_origin', 'local_govt_area', 'phone_number', 'means_of_identification',
        'identity_number', 'identity_issue_date', 'identity_expiry_date',
        'next_of_kin', 'next_of_kin_phone', 'monthly_remuneration', 'status',
        'dependants_number', 'job_title', 'staff_id', 'alternate_phone',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }
}
