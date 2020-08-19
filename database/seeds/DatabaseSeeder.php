<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FundsourceSeeder::class);
         $this->call(StatusesSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(DeductionitemSeeder::class);
         $this->call(DeductionmodeSeeder::class);
         $this->call(DeductionmodecategorySeeder::class);
         $this->call(EmployeesSeeder::class);
         $this->call(OfficeSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
