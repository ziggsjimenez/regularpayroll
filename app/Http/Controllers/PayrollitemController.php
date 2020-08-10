<?php

namespace App\Http\Controllers;

use App\Payrollitem;
use Illuminate\Http\Request;

class PayrollitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id)
    {
        $payrollitem = Payrollitem::find($id);
        return view ('payrollitems.show',compact('payrollitem'));
    }

    public function updatenumdays(){

        if(is_numeric($_POST['days']))
        {
            $payrollitem = Payrollitem::find($_POST['payrollitem_id']);

            $payrollitem->days = $_POST['days'];

            $payrollitem->save();

            return response()->json('Days updated.');
        }

        else {

            return response()->json('Enter numeric data.');
        }


    }
}
