<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deductionmodecategory extends Model
{
    public function deductionitems(){

        return $this->hasMany('App\Deductionitem');
    }
}
