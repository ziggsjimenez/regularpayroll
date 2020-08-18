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
            ['name'=>'GSIS Loans'],
            ['name'=>'GSIS Premiums'],
            ['name'=>'Pagibig Premiums'],
            ['name'=>'Pagibig Loans'],
            ['name'=>'Bank Loans'],
            ['name'=>'Regular Deductions'],
            ['name'=>'Philhealth']
        ];

        foreach($deductionmodecategories as $deductionmodecategory){
            DB::table('deductionmodecategories')->insert([
                'name' => $deductionmodecategory['name']
            ]);
        }
    }
}
