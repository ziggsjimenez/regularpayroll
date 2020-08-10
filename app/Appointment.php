<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['description','chargeability_id','status_id'];

    public function chargeability (){

        return $this->belongsTo('App\Chargeability');
    }

    public function status(){

        return $this->belongsTo('App\Status');
    }

    public function appemployees(){

        return $this->hasMany('App\Appemployee');
    }
}
