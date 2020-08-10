<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appemployees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id');
            $table->foreignId('employee_id');
            $table->foreignId('office_id');
            $table->decimal('monthlyrate',10,2);
            $table->integer('salarygrade');
            $table->text('designation');
            $table->date('datefrom');
            $table->date('dateto');
            $table->text('status');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appemployees');
    }
}
