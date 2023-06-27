<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estacion_id')->unsigned();
            $table->integer('periodo_id')->unsigned();

            $table->string('concepto', '500')->nullable();
            $table->float('valorRetiro');
            $table->string('observacion', '900')->nullable();


            $table->foreign('estacion_id')->references('id')->on("estacions");
            $table->foreign('periodo_id')->references('id')->on("periodos");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retiros');
    }
}
