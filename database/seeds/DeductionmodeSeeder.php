<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeductionmodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deductionmodes = [
            ['name'=>'Annual'],
            ['name'=>'1st Quincena'],
            ['name'=>'2nd Quincena'],
        ];

        foreach($deductionmodes as $deductionmode){
            DB::table('deductionmodes')->insert([
                'name' => $deductionmode['name']
            ]);
        }
    }
}
