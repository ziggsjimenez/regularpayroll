<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundsourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fundsources = [
            ['name'=>'General Fund','code'=>'GF'],
            ['name'=>'Economic Enterprise','code'=>'EE'],
            ['name'=>'Special Education Fund','code'=>'SEF'],
            ['name'=>'Trust Fund','code'=>'TF']
            ];

        foreach($fundsources as $fundsource){
            DB::table('fundsources')->insert([
                'name' => $fundsource['name'],
                'code' => $fundsource['code']
            ]);
        }

    }
}
