<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    public $table = 'signatures';

    public $fillable = [
        'signature_data',
        'user_id'
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
