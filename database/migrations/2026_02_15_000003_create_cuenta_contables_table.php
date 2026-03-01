<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaContablesTable extends Migration
{
    public function up()
    {
        Schema::create('cuenta_contables', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->string('nombre', 200);
            $table->enum('tipo', ['activo', 'pasivo', 'patrimonio', 'ingreso', 'gasto']);
            $table->enum('naturaleza', ['deudora', 'acreedora']);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedTinyInteger('nivel')->default(1);
            $table->boolean('es_detalle')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')->references('id')->on('cuenta_contables')->onDelete('set null');
            $table->index('tipo');
            $table->index('parent_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuenta_contables');
    }
}
