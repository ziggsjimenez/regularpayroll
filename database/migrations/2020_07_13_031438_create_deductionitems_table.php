<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductionitems', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('deductionmode_id');
            $table->foreignId('deductionmodecategory_id');
            $table->boolean('deductible')->default(true);
            $table->text('status');
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
        Schema::dropIfExists('deductionitems');
    }
}
