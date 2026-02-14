<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_gasto_id');
            $table->unsignedInteger('periodo_id');
            $table->string('concepto', 500);
            $table->float('monto');
            $table->date('fecha');
            $table->string('observacion', 900)->nullable();
            $table->unsignedInteger('usuario_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_gasto_id')->references('id')->on('categoria_gastos');
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
