<?php

namespace App\Http\Controllers;

use App\Appemployee;
use App\Appointment;
use App\Deduction;
use App\Deductionitem;
use App\Employeededuction;
use App\Payroll;
use App\Payrollitem;
use App\Chargeability;
use App\Refund;
use App\Refundtype;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Redirect;

class PayrollController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $payrolls = Payroll::where('deleted','=',0)->get();

        foreach($payrolls as $payroll){

            $payroll->refnum=$this->generaterefnum($payroll->chargeability_id,$payroll->id);
            $payroll->save();

        }

        return view ('payrolls.index',compact('payrolls'));
    }


    public function create()
    {
        $chargeabilities = Chargeability::pluck('name','id');
        $statuses = Status::pluck('name','id');

        return view('payrolls.create',compact('chargeabilities','statuses'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'chargeability_id'=>'required',
            'status_id'=>'required',
            'datefrom'=>'required',
            'dateto'=>'required'
        ]);

        $payroll = new Payroll;

        $payroll->fill($request->all());

        $payroll->refnum=$this->generaterefnum($request['chargeability_id'],0);

        $payroll->save();

        return redirect(route('payrolls.index'))->with('success','Record created');
    }

    private function generaterefnum($chargeability_id,$id){


        if ($id==0){

            $lastpayroll_id = Payroll::latest()->first()['id'];


            if($lastpayroll_id==null){
                $lastpayroll_id=1;
//                dd($lastpayroll_id);
            }


        }

        else {
            $lastpayroll_id = $id;
        }


        $lenchar = strlen(strval($chargeability_id));

        if($lenchar==1){
            $trailingchar1 = "000";
        }

        elseif ($lenchar==2){
            $trailingchar1 = "00";
        }

        elseif ($lenchar==3){
            $trailingchar1 = "0";
        }


        $len = strlen(strval($lastpayroll_id));

        if($len==1){
            $trailingchar = "000";
        }

        elseif ($len==2){
            $trailingchar = "00";
        }

        elseif ($len==3){
            $trailingchar = "0";
        }


        $refnum = date('Y')."-".strval($chargeability_id).$trailingchar1."-".$trailingchar.strval($lastpayroll_id);

        return $refnum;

    }


    public function show($id)
    {
        $payroll = Payroll::find($id);



        $appointments = Appointment::where('chargeability_id','=',$payroll->chargeability_id)->get();

//        $employees = Employee::get()->all();

        return view ('payrolls.show',compact('payroll','appointments'));
    }


    public function edit($id)
    {
        $chargeabilities = Chargeability::pluck('name','id');
        $statuses = Status::pluck('name','id');
        $payroll = Payroll::find($id);

        return view('payrolls.edit',compact('chargeabilities','statuses','payroll'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description'=>'required',
            'chargeability_id'=>'required',
            'status_id'=>'required',
            'datefrom'=>'required',
            'dateto'=>'required'
        ]);

        $payroll = Payroll::find($id);

        $payroll->fill($request->all());

        $payroll->save();

        return Redirect::back()->with('success', 'Record updated!');
    }

    public function addemployee(Request $request){


        $employee_id = $_POST['employee'];
        $payroll_id = $_POST['payroll'];
        $days= $_POST['days'];

        $payroll = Payroll::find($_POST['payroll']);

        $appemployee = Appemployee::where('employee_id','=',$employee_id)->first();

        // check date does not exceed the appointment end

        if($appemployee->dateto < $payroll->dateto)

        {

            return response()->json(['error'=>'Unable to add record. Employee appointment ended.']);

        }

        else
        {


        $payrollitem = new Payrollitem;
        $payrollitem->days = $days;
        $payrollitem->rate = $appemployee->dailyrate();
        $payrollitem->employee_id = $employee_id;
        $payrollitem->payroll_id= $payroll_id;
        $payrollitem->save();

//        generateDeductions($payrollitem->id);



        $deductionitems = Deductionitem::get()->all();



        $view = view('tables.payrollitems',compact('payroll','deductionitems'))->render();

        return response()->json(['msg'=>'Employee added.']);
        }
    }


    public function loadappemployee(Request $request){

        $payroll_id = $_POST['payroll'];

        $deductionitems = Deductionitem::where('status','=','Active')->get();

        $refundtypes = Refundtype::get()->all();

        $payroll = Payroll::find($payroll_id);

        $view = view('tables.payrollitems',compact('payroll','deductionitems','refundtypes'))->render();

        return response()->json($view);

    }

    public function deleteappemployee(Request $request){


        $payrollitem_id = $_POST['payrollitem'];

        $payrollitem = Payrollitem::find($payrollitem_id);

        $payroll = Payroll::find($payrollitem->payroll_id);

        $payrollitem->delete();

        $deductionitems = Deductionitem::get()->all();
        $refundtypes = Refundtype::get()->all();

        $view = view('tables.payrollitems',compact('payroll','deductionitems','refundtypes'))->render();

        return response()->json($view);

    }

    public function updatedeductionamount(){

        $employeedeductionid = $_POST['employeedeductionid'];
        $amount = $_POST['amount'];

        $employeededuction = Employeededuction::find($employeedeductionid);
        $employeededuction->amount=$amount;
        $employeededuction->save();

        return response()->json("Success");
    }

    public function updaterefundamount(){


        $payrollitem_id = $_POST['payrollitem_id'];
        $refundtype_id = $_POST['refundtype_id'];
        $amount = $_POST['amount'];

        $refund = Refund::where('payrollitem_id','=',$payrollitem_id)->where('refundtype_id','=',$refundtype_id)->first();

      if (!$refund){

          $newrefund = new Refund;

          $newrefund->payrollitem_id = $payrollitem_id;
          $newrefund->refundtype_id = $refundtype_id;
          $newrefund->amount = $amount;
          $newrefund->save();
      }

      else {

          $oldrefund = Refund::find($refund->id);

          $oldrefund->amount = $amount;

          $oldrefund->save();
      }


        return response()->json("Success");
    }

    public function preview($payroll_id){

        $payroll = Payroll::find($payroll_id);

        $this->generatePayrollitemDeductions($payroll->id);

        $deductionitems = Deductionitem::where('status','=','Active')->get();

        $deductions = Deduction::get()->all();

        $refundtypes = Refundtype::get()->all();

        return view ('payrolls.printpayroll',compact('payroll','deductionitems','deductions','refundtypes'));

    }

    private function generatePayrollitemDeductions($payroll_id){

        $payroll = Payroll::find($payroll_id);

        foreach ($payroll->payrollitems as $payrollitem){

            $deductions = Deduction::where('payrollitem_id','=',$payrollitem->id);
            $deductions->delete();

            foreach($payrollitem->employee->deductions->where('status','=','Active') as $employeededuction){
                $deduction = new Deduction;
                $deduction->payrollitem_id = $payrollitem->id;
                $deduction->deductionitem_id = $employeededuction->deductionitem_id;
                $deduction->amount = $employeededuction->amount;
                $deduction->save();
            }
        }

    }

    public function printpayslips($id){

        $payroll = Payroll::find($id);

        $deductionitems = Deductionitem::get()->all();

        return view ('payrolls.printpayslips',compact('payroll','deductionitems'));

    }


    public function sendpayslips(){


    }

    public function printobr($id){

        $payroll = Payroll::find($id);

        return view ('payrolls.printobr',compact('payroll'));

    }

    public function copypayroll(Request $request){

        $payroll = Payroll::find($request->payroll_id);

        $payrollcopy = new Payroll;

        $payrollcopy->fill($payroll->toArray());

        $payrollcopy->description = date('mdY')."Copy of ".$payroll->description;

        $payrollcopy->status_id = 1;

        $payrollcopy->refnum=$this->generaterefnum($payroll->chargeability_id,0);

        $payrollcopy->save();


        foreach($payroll->payrollitems as $payrollitem){

            $copypayrollitem = new Payrollitem;

            $copypayrollitem->days = $payrollitem->days;
            $copypayrollitem->rate = $payrollitem->rate;
            $copypayrollitem->employee_id= $payrollitem->employee_id;
            $copypayrollitem->payroll_id = $payrollcopy->id;

            $copypayrollitem->save();

        }


        return redirect(route('payrolls.edit',$payrollcopy->id))->with('error','This is a copied payroll please change details if necessary.');

    }


    public function destroy($id)
    {
        $payroll = Payroll::find($id);

        $payroll->deleted = true;

        $payroll->save();

        return redirect(route('payrolls.index'))->with('success','Payroll deleted.');
    }
}
