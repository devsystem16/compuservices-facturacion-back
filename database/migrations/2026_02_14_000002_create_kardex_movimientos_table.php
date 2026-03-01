<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardexMovimientosTable extends Migration
{
    public function up()
    {
        Schema::create('kardex_movimientos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('codigo');
            $table->string('producto');
            $table->foreignId('bodega_id')->constrained('bodegas');
            $table->string('detalle')->nullable();
            $table->string('tipo');
            $table->decimal('entrada', 10, 2)->default(0);
            $table->decimal('salida', 10, 2)->default(0);
            $table->decimal('saldo', 10, 2)->default(0);
            $table->decimal('costo_unitario', 10, 4)->default(0);
            $table->decimal('costo_total', 10, 4)->default(0);
            $table->string('usuario')->nullable();
            $table->string('referencia')->nullable();
            $table->unsignedInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['producto_id', 'bodega_id', 'created_at']);
            $table->index('tipo');
            $table->index('fecha');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kardex_movimientos');
    }
}
