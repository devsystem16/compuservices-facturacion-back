<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 20);
            $table->string('nombre', 255);
            $table->string('telefono', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('direccion', 500)->nullable();
            $table->string('ruc_cedula', 20)->nullable();
            $table->string('contacto', 255)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedInteger('proveedor_id')->nullable()->after('stock');
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('proveedor_id');
        });

        Schema::dropIfExists('proveedores');
    }
}
