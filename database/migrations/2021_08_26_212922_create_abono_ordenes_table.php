<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonoOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->float('abono');
            $table->date('fecha');
            $table->string('comentario')->nullable()->default("");
            $table->foreign('orden_id')->references('id')->on("ordenes");
            $table->softDeletes();
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
        Schema::dropIfExists('abono_ordenes');
    }
}
