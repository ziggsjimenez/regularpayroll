<?php

use Illuminate\Database\Seeder;

use App\Employee;
use App\Deductionitem;
use App\Employeededuction;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function setDeductions($employee_id){
        $deductionitems = Deductionitem::get()->all();

        foreach ($deductionitems as $deductionitem)
        {
            $employeededuction = new Employeededuction;
            $employeededuction->employee_id = $employee_id;
            $employeededuction->deductionitem_id = $deductionitem->id;
            $employeededuction->amount = $this->getAmount($deductionitem->id,$employee_id);
            $employeededuction->status = "Inactive";
            $employeededuction->save();
        }
    }

    private function getAmount($deductionitem_id,$employee_id){

        $employee = Employee::find($employee_id);

        switch($deductionitem_id)
        {
            case 1: $amount = ($employee->rate * .09);break;
            case 2: $amount = ($employee->rate * .12);break;
            case 7:case 8: $amount = ($employee->rate * .02);break;
            default: $amount = 0;break;
        }

        return $amount;

    }

    public function run()
    {
        $employees = [
            ['lastname'=>'Lastimosa','firstname'=>'Lydia','middlename'=>'O.','extname'=>'','rate'=>84074,'office_id'=>13],
            ['lastname'=>'Magallones','firstname'=>'Cherry Fe Amor','middlename'=>'Q.','extname'=>'','rate'=>58787,'office_id'=>13],
            ['lastname'=>'Bacol','firstname'=>'Janice','middlename'=>'C.','extname'=>'','rate'=>46040,'office_id'=>13],
            ['lastname'=>'Domingo','firstname'=>'Judith','middlename'=>'M.','extname'=>'','rate'=>30600,'office_id'=>13],
            ['lastname'=>'Mancawan','firstname'=>'Geogy','middlename'=>'D.','extname'=>'','rate'=>22709,'office_id'=>13],
            ['lastname'=>'Cubero','firstname'=>'Christopher','middlename'=>'D.','extname'=>'','rate'=>18679,'office_id'=>13],
            ['lastname'=>'Barrientos','firstname'=>'Mila','middlename'=>'M.','extname'=>'','rate'=>17600,'office_id'=>13],
            ['lastname'=>'Abueva','firstname'=>'Jared','middlename'=>'S.','extname'=>'','rate'=>12263,'office_id'=>13],
            ['lastname'=>'Onahon','firstname'=>'Moses','middlename'=>'S.','extname'=>'','rate'=>12076,'office_id'=>13],
            ['lastname'=>'Quilang','firstname'=>'Marlon','middlename'=>'P.','extname'=>'','rate'=>11984,'office_id'=>13],
            ['lastname'=>'Jayoma','firstname'=>'Raymond Arnold','middlename'=>'A.','extname'=>'','rate'=>9961,'office_id'=>13],
        ];

        foreach($employees as $employee){

            $newemployee = new Employee;

            $newemployee->lastname = $employee['lastname'];
            $newemployee->firstname = $employee['firstname'];
            $newemployee->middlename= $employee['middlename'];
            $newemployee->extname= $employee['extname'];
            $newemployee->rate= $employee['rate'];
            $newemployee->office_id= $employee['office_id'];
            $newemployee->save();

            $this->setDeductions($newemployee->id);
        }
    }
}
