<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeededuction extends Model
{

    public function deductionitem(){

        return $this->belongsTo('App\Deductionitem');
    }

}
