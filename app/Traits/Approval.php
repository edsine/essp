<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use App\Models\Request;

trait Approval
{
    public function createRequest($employer_id, $model_type, $model_id, $order=1, $status=1){
        return 'request'.$employer_id.$model_type.$model_id;
    }

    //used in user model to get user requests
    public function indexRequests(){

    }

    //used to create relationship with approval request model
    //to get request from any approval created e.g dta|leave (dta->request())
    public function request(): MorphOne
    {
        return $this->morphOne(Request::class, 'requestable');
    }
}
