<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Modules\HumanResource\Models\Ranking;
//use Modules\Shared\Models\Branch;
//use Modules\Shared\Models\Department;
//use Modules\UnitManager\Models\Region;

class Staff extends Model 
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'staff';
    protected $dates =['deleted_at'];
 
    public $fillable = [
        'user_id',
        'ranking_id',
        'department_id',
        'branch_id',
        'dash_type',
        'gender',
        'staff_id',
        'region',
        'phone',
        'profile_picture',
        'status',
        'alternative_email',
        'created_by',
        'date_approved',
        'approved_by',
        'security_key',
        'date_modified',
        'modified_by',
        'office_position',
        'position',
        'about_me',
        'total_received_email',
        'total_sent_email',
        'total_draft_email',
        'total_event',
        'my_groups',
        'designation_id',
        'account_holder_name',
        'account_number',
        'bank_name',
        'bank_identifier_code',
        'branch_location',
        'dob',
    ];

    protected $casts = [
        'department_unit' => 'string',
        'status' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   

    /* public function department(){
        return $this->belongsTo(Department::class);
    }
    
    public function ranking()
    {
        return $this->belongsTo(Ranking::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    } */
    /* public static array $rules = [
        'department_unit' => 'required|unique:departments,department_unit',
        'status' => 'required',
    ]; */

    /* public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'managing_id', 'id');
    } */
}
