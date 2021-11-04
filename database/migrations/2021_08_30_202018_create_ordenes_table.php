<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha');
            $table->string('equipo', '700')->nullable()->default("");
            $table->string('marca', '700')->nullable()->default("");
            $table->string('modelo', '700')->nullable()->default("");
            $table->string('serie', '700')->nullable()->default("");
            $table->string('falla', '3000')->nullable()->default("");
            $table->string('trabajo', '3000')->nullable()->default("");
            $table->float('total');
            $table->float('saldo');
            $table->float('abono')->nullable()->default(0);
            $table->string('observacion')->nullable();

            $table->boolean('camara');
            $table->boolean('teclado');
            $table->boolean('microfono');
            $table->boolean('parlantes');
            $table->boolean('estado')->default(true);
            $table->string('estadoOrden', '3000')->nullable()->default("");

            $table->string('last_user_update', '700')->nullable()->default("");
            $table->string('user_update_work', '700')->nullable()->default("");


            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on("clientes");
            $table->foreign('usuario_id')->references('id')->on("usuarios");
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
        Schema::dropIfExists('ordenes');
    }
}
