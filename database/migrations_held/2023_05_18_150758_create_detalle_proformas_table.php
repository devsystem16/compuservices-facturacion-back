<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_proformas', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('proforma_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad');
            $table->float('subtotal');
            $table->string('precio_tipo')->nullable()->default("publico");

            $table->foreign('proforma_id')->references('id')->on("proformas");
            $table->foreign('producto_id')->references('id')->on("productos");

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
        Schema::dropIfExists('detalle_proformas');
    }
}
