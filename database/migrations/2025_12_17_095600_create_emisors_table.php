<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emisors', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 13);
            $table->string('razon_social');
            $table->string('nombre_comercial')->nullable();
            $table->string('direccion_matriz');
            $table->string('direccion_establecimiento');
            $table->string('cod_establecimiento', 3)->default('001');
            $table->string('cod_punto_emision', 3)->default('001');
            $table->boolean('obligado_contabilidad')->default(false);
            $table->string('path_firma')->nullable(); // Ruta al archivo .p12
            $table->string('pass_firma')->nullable(); // Contraseña del .p12 (Debería estar encriptada en prod, pero para este MVP...)
            $table->integer('ambiente')->default(1); // 1: Pruebas, 2: Producción
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emisors');
    }
}
