<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', '500');
            $table->string('descripcion', '500')->nullable()->default("");
            $table->string('codigo_barra', '1000')->nullable()->default("");
            $table->float('precio_publico');
            $table->float('precio_tecnico');
            $table->float('precio_compra');
            $table->float('precio_distribuidor');
            $table->integer('stock');
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
        Schema::dropIfExists('productos');
    }
}
