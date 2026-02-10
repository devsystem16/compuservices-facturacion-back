<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagoFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pago_facturas', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('factura_id')->unsigned();
            $table->integer('forma_pago_id')->unsigned();
            $table->float('valor');
            $table->string('observacion', '700')->nullable();
            $table->foreign('factura_id')->references('id')->on("facturas");
            $table->foreign('forma_pago_id')->references('id')->on("forma_pagos");
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
        Schema::dropIfExists('forma_pago_facturas');
    }
}
