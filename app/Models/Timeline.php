<?php

namespace Modules\Approval\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\WorkflowEngine\Models\Staff;

class Timeline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flow_id', 'request_id', 'action_id', 'staff_id', 'comments',
    ];

    protected static function newFactory()
    {
        return \Modules\Approval\Database\factories\TimelineFactory::new();
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function flow()
    {
        return $this->belongsTo(Flow::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
