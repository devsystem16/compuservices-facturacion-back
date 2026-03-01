<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsuarioPermisosTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_usuario_permisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tipo_usuario_id');
            $table->unsignedBigInteger('permiso_id');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuarios')->onDelete('cascade');
            $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');
            $table->unique(['tipo_usuario_id', 'permiso_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_usuario_permisos');
    }
}
