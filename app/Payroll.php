<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['description','chargeability_id','status_id','datefrom','dateto'];

    protected $dates = ['datefrom', 'dateto'];

    public function chargeability (){

        return $this->belongsTo('App\Chargeability');
    }

    public function status(){

        return $this->belongsTo('App\Status');
    }

    public function deductionmode(){

        return $this->belongsTo('App\Deductionmode');
    }

    public function payrollitems(){

        return $this->hasManyThrough('App\Payrollitem','App\Employee','id','payroll_id','id','id')->orderBy('employees.lastname','asc');

    }

    public function payrollemployees(){

        return $this->hasManyThrough('App\Employee','App\Payrollitem','payroll_id','id','id','employee_id')->orderBy('employees.lastname');
    }

    public function totaldeduction($id){

        $sub_total = 0;

        foreach ($this->payrollitems as $payrollitem){

                $sub_total += $payrollitem->deductions->where('deductionitem_id','=',$id)->sum('amount');
        }

        return $sub_total;

    }

    public function totalamount(){

        $sum = 0;
      foreach($this->payrollitems as $payrollitem)
      {
          $sum+=$payrollitem->totalamountdue();
      }

      return $sum;

    }

    public function refnum(){

        $numberofdigits = strlen((string)$this->id);

        return $numberofdigits;
    }


    public function getTotalRefund($id){
        $total = 0;
        foreach($this->payrollitems as $payrollitem){
            $total+=$payrollitem->getTotalRefund($id)->sum('amount');
        }
        return $total;
    }

    public function getGrandTotalRefund(){
        $total = 0;
        foreach($this->payrollitems as $payrollitem){
            $total+=$payrollitem->refunds->sum('amount');
        }
        return $total;
    }

}
