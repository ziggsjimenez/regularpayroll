<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            ['name'=>'Municipal Mayor\'s Office','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Municipal Planning and Development Office','head'=>'CHERRY FE AMOR Q. MAGALLONES','position'=>'OIC-MPDC','code'=>'MPDO'],
['name'=>'Human Resource Management Office','head'=>'Catherine C. Gatchalian','position'=>'Supervising Administrative Officer ( HRMO -IV)','code'=>''],
['name'=>'Mayor\'s Office - General Services Division','head'=>'Allan E. Manalo','position'=>'Administrative Officer IV','code'=>''],
['name'=>'Mayor\'s Office - Administration','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Mayor\'s Office - Civil Security Unit','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Mayor\'s Office - Permits and License','head'=>'Eden B. Olemberio','position'=>'License Officer II','code'=>''],
['name'=>'Mayor\'s Office - Internal Control','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Mayor\'s Office - Social Services','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Mayor\'s Office - Public Employment Service Division','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Mayor\'s Office - Local Disaster Risk Reduction and Management Office','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Office of the Municipal Engineer','head'=>'Ricardo M. Madrid','position'=>'Municipal Engineer','code'=>''],
['name'=>'Office of the Sangguniang Bayan','head'=>'Miguel D. Demata','position'=>'Municipal Vice Mayor','code'=>''],
['name'=>'Office of the Municipal Agriculturist','head'=>'Gemma G. Cania','position'=>'Municipal Agricultural Officer','code'=>''],
['name'=>'Office of the Municipal Welfare and Development Officer','head'=>'Rosario A. Escalera','position'=>'Municipal Social Welfare and Development Officer','code'=>''],
['name'=>'Office of the Municipal Planning and Development Coordinator','head'=>'CHERRY FE AMOR Q. MAGALLONES','position'=>'OIC - MPDC','code'=>'OMPDC'],
['name'=>'Office of the Municipal Civil Registrar','head'=>'Eljun R. Cubero','position'=>'Municipal Civil Registrar - OIC','code'=>''],
['name'=>'Northern Bukidnon Community College','head'=>'Shiela K. Maglente','position'=>'College Department Head','code'=>''],
['name'=>'Office of the Municipal Accountant','head'=>'Nestor M. Tabaco','position'=>'Municipal Accountant','code'=>''],
['name'=>'Office of the Municipal Assessor','head'=>'Danny Salvador R. Bocon','position'=>'Municipal Assessor','code'=>''],
['name'=>'Office of the Municipal Budget','head'=>'Graham F. Delco','position'=>'Supervising Admin Officer (Budget Officer IV)','code'=>''],
['name'=>'Office of the Municipal Health','head'=>'JOANNE MARIE V. DUEÑAS','position'=>'Rural Health Officer','code'=>''],
['name'=>'Office of the Municipal Treasurer','head'=>'Zoraida C. Lozada','position'=>'Municipal Treasurer','code'=>''],
['name'=>'Office of the Municipal Environment and Natural Resources Officer','head'=>'Sharon G. Tacbobo','position'=>'MENRO - OIC','code'=>''],
['name'=>'Municipal Slaughterhouse Division','head'=>'Dr. Richard E. Duites','position'=>'Slaughterhouse - OIC','code'=>''],
['name'=>'Municipal Motorpool Division','head'=>'Engr. Raul O. Verdejo','position'=>'SO IV / OIC - Motorpool Division','code'=>''],
['name'=>'Municipal Tourism/Mangima Spring Resort','head'=>'Farrah B. Gardones','position'=>'Economist III','code'=>''],
['name'=>'Municipal Information Office','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Municipal Market Division','head'=>'Farrah B. Gardones','position'=>'Economist III','code'=>''],
['name'=>'Office of the Municipal Administrator','head'=>'Miguel N. QuiÃ±o','position'=>'Municipal Administrator (Municipal Department Head I)','code'=>''],
['name'=>'Agusan Market','head'=>'Mayor\'s Office','position'=>'Laborer','code'=>''],
['name'=>'Municipal Nutrition Office','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Municipal Heavy Equipment Division','head'=>'Farrah B. Gardones','position'=>'Economist III','code'=>''],
['name'=>'Pharmacy','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>''],
['name'=>'Non Office','head'=>'N/A','position'=>'N/A','code'=>''],
['name'=>'Non-Office - DILG MLGOO','head'=>'JAN ERIC L. MANASAN','position'=>'MLGOO','code'=>'DILG'],
['name'=>'Manolo Fortich District I','head'=>'JOCELYN L. FLORES','position'=>'Public Schools District Supervisor','code'=>'SEF - MF 1'],
['name'=>'Manolo Fortich District II','head'=>'ROBERTO D. PAHUYO','position'=>'Public Schools District Supervisor','code'=>'SEF - MF 2'],
['name'=>'DSWD - Convergence','head'=>'CECIL R. CAVANES','position'=>'ML/MAT Leader','code'=>'DSWD'],
['name'=>'Non-Office - COA','head'=>'LOIDA R. ALAMBAN','position'=>'State Auditor III','code'=>'COA'],
['name'=>'Non - Office (COMELEC)','head'=>'GEMMA C. RAVELO','position'=>'Election Officer IV','code'=>'COMELEC'],
['name'=>'Mayor\'s Office - IT Division','head'=>'CLIVE D. QUIÑO','position'=>'Municipal Mayor','code'=>'ITO'],
['name'=>'MO - Procurement Division','head'=>'ELJUN C. CUBERO','position'=>'Head, BAC Secretariat','code'=>'MOProc'],
['name'=>'INTERNAL AUDIT SERVICE OFFICE','head'=>'FARAH B. GARDONES','position'=>'INTERNAL AUDITOR III','code'=>'IASO'],
['name'=>'MAYOR\'S OFFICE - MANOLO FORTICH ROADS AND TRAFFIC ADMINISTRATION','head'=>'TERIMAR LINUMBAY','position'=>'TRAFFIC AIDE III','code'=>'MO-MFRTA'],
['name'=>'MAYOR\'S OFFICE - INFORMATION TECHNOLOGY DIVISION','head'=>'JUNEL JIG G. JIMENEZ','position'=>'COMPUTER PROGRAMMER III','code'=>'MO- ITD'],
['name'=>'MAYOR\'S OFFICE - PROCUREMENT','head'=>'ELJUN R. CUBERO','position'=>'BAC SERETARIAT -DESIGNATE','code'=>'MO- PO']];

        foreach($offices as $office){

            $off = new \App\Office();

            $off->name = $office['name'];
            $off->head = $office['head'];
            $off->position = $office['position'];
            $off->code = $office['code'];

            $off->save();


        }

    }
}
