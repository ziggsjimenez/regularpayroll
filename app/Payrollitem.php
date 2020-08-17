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

    public function totalrefunds(){

        return $this->hasMany('App\Refund')->sum('amount');
    }

    public function totalamountdue(){

        return $this->rate * $this->days;
    }

    public function nettakehomepay(){

        return $this->totalamountdue()-$this->totaldeductions()+$this->totaldeductions();
    }

    public function refunds (){

        return $this->hasMany('App\Refund');

    }

    public function getRefundAmount($payrollitem_id,$id){

        return Refund::where('payrollitem_id','=',$this->id)->where('refundtype_id','=',$id)->first();;
    }

    public function getdeductionamount($id){

        $deduction = Deduction::where('payrollitem_id','=',$this->id)->where('deductionitem_id','=',$id)->first();

        if($deduction==null)
            $result = 0;
        else
            $result = $deduction['amount'];

        return $result;

    }

    public function getTotalRefund($id){

        return $this->hasMany('App\Refund')->where('refundtype_id','=',$id);

    }

}
