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
            $employeededuction->amount = $deductionitem->defaultamount;
            $employeededuction->status = "Inactive";
            $employeededuction->save();
        }

    }

    public function run()
    {
        $employees = [
            ['lastname'=>'Lastimosa','firstname'=>'Lydia','middlename'=>'O.','extname'=>''],
            ['lastname'=>'Magallones','firstname'=>'Cherry Fe Amor','middlename'=>'Q.','extname'=>''],
            ['lastname'=>'Bacol','firstname'=>'Janice','middlename'=>'C.','extname'=>''],
            ['lastname'=>'Domingo','firstname'=>'Judith','middlename'=>'M.','extname'=>''],
            ['lastname'=>'Mancawan','firstname'=>'Geogy','middlename'=>'D.','extname'=>''],
            ['lastname'=>'Cubero','firstname'=>'Christopher','middlename'=>'D.','extname'=>''],
            ['lastname'=>'Barrientos','firstname'=>'Mila','middlename'=>'M.','extname'=>''],
            ['lastname'=>'Abueva','firstname'=>'Jared','middlename'=>'S.','extname'=>''],
            ['lastname'=>'Onahon','firstname'=>'Moses','middlename'=>'S.','extname'=>''],
            ['lastname'=>'Quilang','firstname'=>'Marlon','middlename'=>'P.','extname'=>''],
            ['lastname'=>'Jayoma','firstname'=>'Raymond Arnold','middlename'=>'A.','extname'=>''],
        ];

        foreach($employees as $employee){

            $newemployee = new Employee;

            $newemployee->lastname = $employee['lastname'];
            $newemployee->firstname = $employee['firstname'];
            $newemployee->middlename= $employee['middlename'];
            $newemployee->extname= $employee['extname'];
            $newemployee->save();

            $this->setDeductions($newemployee->id);
        }
    }
}
