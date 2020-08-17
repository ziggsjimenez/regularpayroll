<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    public function payrollitem(){

        return $this->belongsTo('App\Payrollitem');

    }

    public function refundtype(){

        return $this->belongsTo('App\Refundtype');
    }
}
