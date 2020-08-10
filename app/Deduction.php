<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{

    public function payrollitem(){

        return $this->belongsTo('App\Payrollitem');
    }

    public function deductionitem(){

        return $this->belongsTo('App\Deductionitem');
    }

}
