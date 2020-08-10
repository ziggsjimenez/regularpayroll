<?php

use Illuminate\Database\Seeder;

class Refundtypeseeder extends Seeder
{

    public function run()
    {
        $refundtypes = [
            ['name'=>'SSS'],
            ['name'=>'Pag-ibig']
        ];

        foreach($refundtypes as $refundtype){
            DB::table('refundtypes')->insert([
                'name' => $refundtype['name']
            ]);
        }
    }
}
