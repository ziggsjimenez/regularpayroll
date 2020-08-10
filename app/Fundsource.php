<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundsource extends Model
{
    public function chargeabilities(){

        return $this->hasMany('App\Chargeability');
    }
}
