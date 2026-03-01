<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 100)->unique();
            $table->string('modulo', 50);
            $table->enum('tipo', ['pantalla', 'accion']);
            $table->string('descripcion', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
