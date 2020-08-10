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
            $table->decimal('defaultamount',10,2);
            $table->text('status');
            $table->tinyInteger('f1');
            $table->tinyInteger('f2');
            $table->tinyInteger('f3');
            $table->tinyInteger('f4');
            $table->tinyInteger('f5');
            $table->tinyInteger('f6');
            $table->tinyInteger('f7');
            $table->tinyInteger('f8');
            $table->tinyInteger('f9');
            $table->tinyInteger('f10');
            $table->tinyInteger('f11');
            $table->tinyInteger('f12');
            $table->tinyInteger('f13');
            $table->tinyInteger('f14');
            $table->tinyInteger('f15');
            $table->tinyInteger('f16');
            $table->tinyInteger('f17');
            $table->tinyInteger('f18');
            $table->tinyInteger('f19');
            $table->tinyInteger('f20');
            $table->tinyInteger('f21');
            $table->tinyInteger('f22');
            $table->tinyInteger('f23');
            $table->tinyInteger('f24');
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
