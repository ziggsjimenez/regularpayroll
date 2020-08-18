<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deductionmode extends Model
{
    public function deductionitems(){

        return $this->hasMany('App\Deductionitem');
    }

    public function payrolls(){

        return $this->hasMany('App\Payroll');
    }
}
