<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chargeability extends Model
{

    protected $fillable = ['name','amount','fundsource_id','headofoffice','position'];


    public function fundsource(){

        return $this->belongsTo('App\Fundsource');
    }

    public function appointments (){

        return $this->hasMany('App\Appointment');
    }

    public function payrolls (){

        return $this->hasMany('App\Payroll');
    }

}
