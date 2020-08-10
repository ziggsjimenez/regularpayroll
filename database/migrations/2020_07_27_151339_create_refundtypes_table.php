<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundtypesTable extends Migration
{

    public function up()
    {
        Schema::create('refundtypes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('refundtypes');
    }

}
