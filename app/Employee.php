<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['lastname','firstname','middlename','extname','address','birthday','contact'];

    public function fullname(){

        $fullname = $this->lastname.', '.$this->firstname.' '.$this->middlename.' '.$this->extname;
        return $fullname;
    }

    public function deductions(){

        return $this->hasMany('App\Employeededuction');
    }

    public function appemployee(){

        return $this->hasOne('App\Appemployee');
    }

    public function payrollitem($id){

        $payrollitem = Payrollitem::where('employee_id','=',$this->id)->where('payroll_id','=',$id)->first();

        return $payrollitem;

    }

    public function office(){

        return $this->belongsTo('App\Office');
    }


}
