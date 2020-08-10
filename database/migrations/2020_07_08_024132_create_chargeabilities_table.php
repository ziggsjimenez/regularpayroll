<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargeabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargeabilities', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->decimal('amount',10,2);
            $table->integer('fundsource_id');
            $table->text('headofoffice');
            $table->text('position');
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
        Schema::dropIfExists('chargeabilities');
    }
}
