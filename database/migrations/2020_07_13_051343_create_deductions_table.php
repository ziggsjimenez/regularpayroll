<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration
{

    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payrollitem_id');
            $table->foreignId('deductionitem_id');
            $table->decimal('amount',10,2);
            $table->timestamps();
        });
    }

    public function down()

    {
        Schema::dropIfExists('deductions');
    }

}
