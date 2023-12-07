<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Approval;

class DeathClaim extends Model
{
    use HasFactory, SoftDeletes;
    use Approval;
    public $table = 'death_claims';
    public $primarykey='id';

    protected $fillable = [
        'employer_id', 'employee_id', 'last_salary', 'monthly_contribution',
        'incident_description', 'incident_date', 'incident_time',
        'employer_account_name', 'employer_account_number', 'employer_bank_name', 'employer_sort_code',
        'employee_account_name', 'employee_account_number', 'employee_bank_name', 'employee_sort_code',
        'document', 'status', 'branch_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
