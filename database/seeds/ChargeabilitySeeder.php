<?php

use Illuminate\Database\Seeder;

class ChargeabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chargeabilities = [
            ['name'=>'Administrative Services','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Aide to Sports','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Food Sec. & Agri','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'General Services','fundsource_id'=>1,'headofoffice'=>'RONALD JOHN R. CAJILLA','position'=>'GSD - OIC'],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2015','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2016','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2017','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2018','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2019','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads & Bridges CY 2020','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Maintenance of Provincial Roads and Bridges  ','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Mangima','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Market','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'MFRTA','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'MHOP','fundsource_id'=>1,'headofoffice'=>'JOANNE MARIE V. DUEÑAS','position'=>'MHO'],
            ['name'=>'Municipal Grounds','fundsource_id'=>1,'headofoffice'=>'RONALD JOHN R. CAJILLA','position'=>'GSD - OIC'],
            ['name'=>'Municipal Streets Maintenance','fundsource_id'=>1,'headofoffice'=>'RONALD JOHN R. CAJILLA','position'=>'GSD - OIC'],
            ['name'=>'NBCC','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Other Maint. & Other Operating Expenses- SB','fundsource_id'=>1,'headofoffice'=>'MIGUEL D. DEMATA','position'=>'Municipal Vice-Mayor '],
            ['name'=>'Other Maint.& Other  Operating Expenses-masso','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Other Maint.& Other  Operating Expenses-Menro','fundsource_id'=>1,'headofoffice'=>'SHARON G. TACBOBO','position'=>'MENRO - OIC'],
            ['name'=>'Rehabilitation of Barangay Roads for 22 Barangays','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Repair & Maintenance of Buildings Facilities','fundsource_id'=>1,'headofoffice'=>'RONALD JOHN R. CAJILLA','position'=>'GSD - OIC'],
            ['name'=>'SEF','fundsource_id'=>3,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Slaughterhouse','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to BIR ','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to Birthing Home Annex Maluko','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to Comelec','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to Manolo Fortich Training Center/Other Operating Expenses','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to Municipal Ordinance & law Enforcement team','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Support to RQRT-5% LDRRMF','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor '],
            ['name'=>'Survey Works','fundsource_id'=>1,'headofoffice'=>'RICARDO M. MADRID','position'=>'Municipal Engineer'],
            ['name'=>'Tourism','fundsource_id'=>1,'headofoffice'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor ']
        ];

        foreach($chargeabilities as $chargeability){

            $charge = new \App\Chargeability;

            $charge->name = $chargeability['name'];
            $charge->fundsource_id = $chargeability['fundsource_id'];
            $charge->headofoffice= $chargeability['headofoffice'];
            $charge->position= $chargeability['position'];
            $charge->amount= 0;
            $charge->save();


        }

    }
}
