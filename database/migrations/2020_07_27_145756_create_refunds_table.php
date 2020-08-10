<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{

    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->text('refundtype_id');
            $table->foreignId('payrollitem_id');
            $table->text('amount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
