<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {

            $table->increments('id');
            $table->date('fecha_apertura');
            $table->date('fecha_cierre');
            $table->integer('usuario_id_apertura')->unsigned(); // Usuario que apertura el periodo.
            $table->integer('usuario_id_cierre')->unsigned(); // Usuario que cierra el periodo.
            $table->string('estado');
            $table->string('observaciones');

            $table->foreign('usuario_id_apertura')->references('id')->on("usuarios");
            $table->foreign('usuario_id_cierre')->references('id')->on("usuarios");


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
        Schema::dropIfExists('periodos');
    }
}
