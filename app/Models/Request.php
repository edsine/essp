<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Approval\Events\RequestCreated;
use Modules\Approval\Events\RequestUpdated;
use App\Events\RequestSavedEvent;
use App\Models\Staff;

class Request extends Model
{
    use HasFactory, SoftDeletes;

    protected $dispatchesEvents = [
        //'created' => RequestCreated::class,
        //'updated' => RequestUpdated::class,
        'saved' => RequestSavedEvent::class,
    ];

    protected $fillable = [
        'staff_id', 'type_id',
        'typeable_id', 'typeable_type',
        'order', 'action_id', 'next_step', 'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Approval\Database\factories\RequestFactory::new();
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /* public function flows()
    {
        return $this->type()->with('flows');
    } */

    /* public function nextStep()
    {
        return $this->type()->with('flows');
    } */

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function requestable(): MorphTo
    {
        return $this->morphTo();
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
