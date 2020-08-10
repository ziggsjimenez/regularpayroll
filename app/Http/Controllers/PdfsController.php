<?php

namespace App\Http\Controllers;

use App\Payrollitem;
use PDF;
use Illuminate\Http\Request;

class PdfsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function payslip($id){

        $payrollitem = Payrollitem::find($id);

        $pdf = PDF::loadView('pdf.payslip', ['payrollitem'=>$payrollitem]);

        return $pdf->download($payrollitem->employee->fullname().'_payslip.pdf');
    }
}
