<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePantallaposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pantallapos', function (Blueprint $table) {

            $table->increments("id");
            $table->integer('tipo_usuario_id')->unsigned();
            $table->string('href', '900');
            $table->string('icon', '900');
            $table->string('title', '900');
            $table->foreign('tipo_usuario_id')->references('id')->on("tipo_usuarios");
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
        Schema::dropIfExists('pantallapos');
    }
}
