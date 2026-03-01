<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAsientosTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_asientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asiento_contable_id');
            $table->unsignedBigInteger('cuenta_contable_id');
            $table->string('descripcion', 300)->nullable();
            $table->decimal('debe', 12, 2)->default(0);
            $table->decimal('haber', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('asiento_contable_id')->references('id')->on('asientos_contables')->onDelete('cascade');
            $table->foreign('cuenta_contable_id')->references('id')->on('cuenta_contables')->onDelete('restrict');
            $table->index('asiento_contable_id');
            $table->index('cuenta_contable_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_asientos');
    }
}
