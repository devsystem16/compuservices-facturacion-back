<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_creditos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credito_id')->unsigned();
            $table->float('abono');
            $table->date('fecha');
            $table->string('comentario')->nullable();
            $table->timestamps();

            $table->foreign('credito_id')->references('id')->on("creditos");
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
        Schema::dropIfExists('detalle_creditos');
    }
}
