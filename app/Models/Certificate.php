<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employer_id', 'payment_fee', 'processing_status', 'payment_status',
        'branch_id', 'application_letter', 'payment_id', 'application_year',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
