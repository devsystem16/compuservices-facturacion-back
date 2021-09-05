<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('tipo_usuarios_id')->unsigned();
            $table->string('nombres', '700');
            $table->string('usuario', '700');
            $table->string('pass', '700');
            $table->foreign('tipo_usuarios_id')->references('id')->on("tipo_usuarios");
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
        Schema::dropIfExists('usuarios');
    }
}
