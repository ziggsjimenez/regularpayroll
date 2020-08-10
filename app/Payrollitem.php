<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payrollitem extends Model
{

    protected $fillable = ['days','rate','payroll_id','emplooyee_id'];

    public function employee(){

        return $this->belongsTo('App\Employee');
    }

    public function payroll(){

        return $this->belongsTo('App\Payroll');
    }

    public function deductions(){

        return $this->hasMany('App\Deduction');
    }

    public function totaldeductions(){

        return $this->hasMany('App\Deduction')->sum('amount');
    }

    public function totalamountdue(){

        return $this->rate * $this->days;
    }

    public function nettakehomepay(){

        return $this->totalamountdue()-$this->totaldeductions();
    }

    public function refunds (){

        return $this->hasMany('App\Refund');

    }
}
