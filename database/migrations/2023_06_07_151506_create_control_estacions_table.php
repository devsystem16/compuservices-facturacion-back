<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlEstacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_estacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estacion_id')->unsigned();
            $table->integer('periodo_id')->unsigned();

            $table->float('valor_fondo_asignado')->nullable();
            $table->float('valor_fondo_retirado')->nullable();

            $table->integer('usuario_fondo_asignado')->unsigned()->nullable();
            $table->integer('usuario_fondo_retiro')->unsigned()->nullable();

            $table->date('FechaFondoAsignado')->nullable();
            $table->date('FechaFondoRetirado')->nullable();

            $table->string('estado', '200')->nullable();
            $table->string('motivo_descuadre')->nullable();

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
        Schema::dropIfExists('control_estacions');
    }
}
