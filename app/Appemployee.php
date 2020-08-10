<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appemployee extends Model
{
    public function employee(){

        return $this->belongsTo('App\Employee');
    }

    public function appointment(){

        return $this->belongsTo('App\Appointment');
    }

    public function office(){

        return $this->belongsTo('App\Office');
    }

    public function dailyrate(){

        return $this->monthlyrate/22;
    }


}
