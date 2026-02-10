<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proformas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('cliente_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('forma_pago_id')->unsigned();

            // DATOS
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->float('subtotal');
            $table->float('iva');
            $table->float('total');
            $table->string('observacion')->nullable()->default("");
            $table->string('estado', '200');

            $table->foreign('forma_pago_id')->references('id')->on("forma_pagos");
            $table->foreign('cliente_id')->references('id')->on("clientes");
            $table->foreign('usuario_id')->references('id')->on("usuarios");

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
        Schema::dropIfExists('proformas');
    }
}
