<?php

namespace App\Http\Controllers;

use App\Appemployee;
use App\Appointment;
use App\Chargeability;
use App\Employee;
use App\Status;
use App\Office;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $appointments = Appointment::get()->all();

        return view ('appointments.index',compact('appointments'));
    }



    public function create()
    {
        $chargeabilities = Chargeability::pluck('name','id');
        $statuses = Status::pluck('name','id');

        return view('appointments.create',compact('chargeabilities','statuses'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'chargeability_id'=>'required',
            'status_id'=>'required'
        ]);

        $appointment = new Appointment;

        $appointment->fill($request->all());

        $appointment->save();

        return redirect(route('appointments.index'))->with('success','Record created');
    }


    public function show($id)
    {
        $appointment = Appointment::find($id);

        $employees = Employee::get()->all();
        $offices = Office::pluck('name','id');

        return view ('appointments.show',compact('appointment','employees','offices'));
    }


    public function edit($id)
    {
        $chargeabilities = Chargeability::pluck('name','id');
        $statuses = Status::pluck('name','id');
        $appointment = Appointment::find($id);

        return view('appointments.edit',compact('chargeabilities','statuses','appointment'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description'=>'required',
            'chargeability_id'=>'required',
            'status_id'=>'required',
        ]);

        $appointment = Appointment::find($id);

        $appointment->fill($request->all());

        $appointment->save();

        return redirect(route('appointments.index'))->with('success','Record updated.');
    }

    public function addemployee(Request $request){

//        appointment_id: "54"
//datefrom: "2020-01-01"
//dateto: "2020-01-01"
//designation: "tet"
//employee_id: "1"
//monthlyrate: "4"
//office_id: "2"
//remarks: "test"
//salarygrade: "4"
//status: "test"



        $datetime1 = new DateTime($request->datefrom);

        $datetime2 = new DateTime($request->dateto);

        $appointment = Appointment::find($request->appointment_id);

//        $difference = $datetime2->diff($datetime1);

        if($datetime2  < $datetime1){
            $msg = "Invalid date range.";
            $view = view('tables.appemployees',compact('appointment'))->render();
            return response()->json(['view'=>$view,'msg'=>$msg]);
        }

        else
        {


        $appemployee = new Appemployee;

        $appemployee->appointment_id = $request->appointment_id;
        $appemployee->datefrom = $request->datefrom;
        $appemployee->dateto = $request->dateto;
        $appemployee->designation = $request->designation;
        $appemployee->employee_id = $request->employee_id;
        $appemployee->monthlyrate = $request->monthlyrate;
        $appemployee->office_id = $request->office_id;
        $appemployee->remarks = $request->remarks;
        $appemployee->salarygrade = $request->salarygrade;
        $appemployee->status = $request->status;
        $appemployee->save();

//        $appointment = Appointment::find($request->appointment_id);
        $msg = "Employee sucessfully added.";
        $view = view('tables.appemployees',compact('appointment'))->render();

        return response()->json(['view'=>$view,'msg'=>$msg]);
        }
    }

    public function loadappemployee(Request $request){

        $appointment_id = $_POST['appointment'];

        $appointment = Appointment::find($appointment_id);

        $view = view('tables.appemployees',compact('appointment'))->render();

        return response()->json($view);

    }

    public function deleteappemployee(Request $request){


        $appemployee_id = $_POST['appemployee'];

        $appemployee = Appemployee::find($appemployee_id);

        $appointment = Appointment::find($appemployee->appointment_id);

        $appemployee->delete();

        $view = view('tables.appemployees',compact('appointment'))->render();

        return response()->json($view);

    }




    public function destroy($id)
    {
        //
    }
}
