<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name'=>'Pending'],
            ['name'=>'Approved'],
            ['name'=>'Cancelled']
        ];

        foreach($statuses as $status){
            DB::table('statuses')->insert([
                'name' => $status['name']
            ]);
        }
    }
}
