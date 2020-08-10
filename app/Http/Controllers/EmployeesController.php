<?php

namespace App\Http\Controllers;

use App\Deductionitem;
use App\Employee;
use App\Employeededuction;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::get()->all();

        return view ('employees.index',compact('employees'));
    }


    public function create()
    {
        return view ('employees.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'middlename'=>'required',
            'birthday'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        $emp = new Employee;

        $emp->fill($request->all());

        $emp->save();

        $this->setDeductions($emp->id);

        return redirect(route('employees.index'))->with('success','Record created.');

    }

    private function setDeductions($employee_id){

        $deductionitems = Deductionitem::get()->all();

        foreach ($deductionitems as $deductionitem)
        {
            $employeededuction = new Employeededuction;
            $employeededuction->employee_id = $employee_id;
            $employeededuction->deductionitem_id = $deductionitem->id;
            $employeededuction->amount = $deductionitem->defaultamount;
            $employeededuction->status = "Inactive";
            $employeededuction->save();
        }

    }

    private function getDefaultDeductions(){


    }


    public function show($id)
    {
        $employee = Employee::find($id);

        return view ('employees.show',compact('employee'));
    }


    public function edit($id)
    {
        $emp = Employee::find($id);

        return view ('employees.edit',compact('emp'));
    }


    public function update(Request $request, $id)

    {
        $request->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'middlename'=>'required',
            'birthday'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);

        $emp = Employee::find($id);

        $emp->fill($request->all());

        $emp->save();

        $this->setDeductions($emp->id);

        return redirect(route('employees.index'))->with('success','Record updated.');

    }

    public function destroy($id)
    {

    }

    public function updatedeductionstatus(Request $request){


        $employeededuction_id = $request['employeededuction_id'];

        $employeededuction = Employeededuction::find($employeededuction_id);

        if($employeededuction->status=="Active")
            $employeededuction->status = "Inactive";
       else
            $employeededuction->status = "Active";

        $employeededuction->save();

        return response()->json($employeededuction->status);


    }
}
