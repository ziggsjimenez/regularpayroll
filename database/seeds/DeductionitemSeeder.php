<?php

use Illuminate\Database\Seeder;

class DeductionitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deductionitems = [
            ['name'=>'Philhealth','deductionmode_id'=>2,'defaultamount'=>225,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'SSS','deductionmode_id'=>2,'defaultamount'=>225,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'Pag-big Premium','deductionmode_id'=>2,'defaultamount'=>225,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'Pag-ibig MPL','deductionmode_id'=>2,'defaultamount'=>225,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'Pag-ibig 2','deductionmode_id'=>2,'defaultamount'=>225,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'EMAF','deductionmode_id'=>1,'defaultamount'=>150,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0],
            ['name'=>'Livelihood','deductionmode_id'=>2,'defaultamount'=>200,'f1'=>0,'f2'=>0,'f3'=>0,'f4'=>0,'f5'=>0,'f6'=>0,'f7'=>0,'f8'=>0,'f9'=>0,'f10'=>0,'f11'=>0,'f12'=>0,'f13'=>0,'f14'=>0,'f15'=>0,'f16'=>0,'f17'=>0,'f18'=>0,'f19'=>0,'f20'=>0,'f21'=>0,'f22'=>0,'f23'=>0,'f24'=>0]
        ];

        foreach($deductionitems as $deductionitem){
            DB::table('deductionitems')->insert([
                'name' => $deductionitem['name'],
                'deductionmode_id' => $deductionitem['deductionmode_id'],
                'defaultamount' => $deductionitem['defaultamount'],
                'status' => 'Active',
                'f1'=>$deductionitem['f1'],
                'f2'=>$deductionitem['f2'],
                'f3'=>$deductionitem['f3'],
                'f4'=>$deductionitem['f4'],
                'f5'=>$deductionitem['f5'],
                'f6'=>$deductionitem['f6'],
                'f7'=>$deductionitem['f7'],
                'f8'=>$deductionitem['f8'],
                'f9'=>$deductionitem['f9'],
                'f10'=>$deductionitem['f10'],
                'f11'=>$deductionitem['f11'],
                'f12'=>$deductionitem['f12'],
                'f13'=>$deductionitem['f13'],
                'f14'=>$deductionitem['f14'],
                'f15'=>$deductionitem['f15'],
                'f16'=>$deductionitem['f16'],
                'f17'=>$deductionitem['f17'],
                'f18'=>$deductionitem['f18'],
                'f19'=>$deductionitem['f19'],
                'f20'=>$deductionitem['f20'],
                'f21'=>$deductionitem['f21'],
                'f22'=>$deductionitem['f22'],
                'f23'=>$deductionitem['f23'],
                'f24'=>$deductionitem['f24'],
            ]);
        }
    }
}
