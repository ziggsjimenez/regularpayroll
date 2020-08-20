<?php

use Illuminate\Database\Seeder;

class DeductionmodecategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deductionmodecategories = [
            ['name'=>'GSIS Premiums'],
            ['name'=>'GSIS Loans'],
            ['name'=>'Pagibig Premiums'],
            ['name'=>'Pagibig Loans'],
            ['name'=>'Philhealth'],
            ['name'=>'Bank Loans'],
            ['name'=>'Regular Deductions']
        ];

        foreach($deductionmodecategories as $deductionmodecategory){
            DB::table('deductionmodecategories')->insert([
                'name' => $deductionmodecategory['name']
            ]);
        }
    }
}
