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

            ['name'=>'GSIS PREMIUMS - PS','deductionmodecategory_id'=>2,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'GSIS PREMIUMS - GS','deductionmodecategory_id'=>2,'deductionmode_id'=>2,'status'=>'Active','deductible'=>FALSE],


            ['name'=>'GSIS LOANS - CONSOL','deductionmodecategory_id'=>1,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'GSIS LOANS - EMERGENCY','deductionmodecategory_id'=>1,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'GSIS LOANS - POLICY','deductionmodecategory_id'=>1,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'GSIS LOANS - EDUCATIONAL','deductionmodecategory_id'=>1,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],

            ['name'=>'ECIP','deductionmodecategory_id'=>6,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],

            ['name'=>'PAG-IBIG PREMIUMS- PS','deductionmodecategory_id'=>3,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'PAG-IBIG PREMIUMS- GS','deductionmodecategory_id'=>3,'deductionmode_id'=>2,'status'=>'Active','deductible'=>FALSE],
            ['name'=>'PAG-IBIG PREMIUMS- PI II','deductionmodecategory_id'=>3,'deductionmode_id'=>2,'status'=>'Active','deductible'=>FALSE],

            ['name'=>'Pag-ibig MPL','deductionmodecategory_id'=>4,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'Pag-ibig EL','deductionmodecategory_id'=>4,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'Pag-ibig Calamity','deductionmodecategory_id'=>4,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],

            ['name'=>'PHIC PS','deductionmodecategory_id'=>7,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'PHIC GS','deductionmodecategory_id'=>7,'deductionmode_id'=>2,'status'=>'Active','deductible'=>FALSE],

            ['name'=>'With holding Tax Payables','deductionmodecategory_id'=>6,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],

            ['name'=>'BANK LOANS ONB','deductionmodecategory_id'=>5,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'BANK LOANS LBP','deductionmodecategory_id'=>5,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'CA','deductionmodecategory_id'=>6,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],
            ['name'=>'LIVELIHOOD','deductionmodecategory_id'=>6,'deductionmode_id'=>2,'status'=>'Active','deductible'=>TRUE],

        ];

        foreach($deductionitems as $deductionitem){
            DB::table('deductionitems')->insert([
                'name' => $deductionitem['name'],
                'deductionmode_id' => $deductionitem['deductionmode_id'],
                'deductionmodecategory_id' => $deductionitem['deductionmodecategory_id'],
                'status' => $deductionitem['status']
            ]);
        }
    }
}
