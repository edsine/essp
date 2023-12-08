<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cycle', 'scopeable_type', 'scopeable_id', 'metric', 'duration', 'status',
    ];

    protected static function newFactory()
    {
        return \Modules\Approval\Database\factories\TypeFactory::new();
    }

    public function flows()
    {
        return $this->hasMany(Flow::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
