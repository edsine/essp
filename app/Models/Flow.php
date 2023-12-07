<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Flow extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id', 'approval_order',
        //'duration_metric', 'duration_period',
        'approval_scopeable_type', 'approval_scopeable_id',
        'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Approval\Database\factories\FlowFactory::new();
    }

    public function actions(): BelongsToMany
    {
        return $this->belongsToMany(Action::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withPivot([
            'scopeable_type', 'scopeable_id',
        ]);
    }

    public function approval_scopeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function requests()
    {
        return null; //return $this->hasMany(Request::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
