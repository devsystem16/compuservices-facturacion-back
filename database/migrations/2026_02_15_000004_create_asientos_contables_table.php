<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsientosContablesTable extends Migration
{
    public function up()
    {
        Schema::create('asientos_contables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numero');
            $table->date('fecha');
            $table->string('descripcion', 500);
            $table->enum('tipo', ['manual', 'venta', 'gasto', 'retiro', 'credito', 'abono_credito', 'anulacion', 'ajuste', 'cierre']);
            $table->string('referencia_tipo', 50)->nullable();
            $table->unsignedBigInteger('referencia_id')->nullable();
            $table->enum('estado', ['borrador', 'contabilizado', 'anulado'])->default('borrador');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->decimal('total_debe', 12, 2)->default(0);
            $table->decimal('total_haber', 12, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('fecha');
            $table->index('tipo');
            $table->index('estado');
            $table->index('numero');
            $table->index(['referencia_tipo', 'referencia_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('asientos_contables');
    }
}
