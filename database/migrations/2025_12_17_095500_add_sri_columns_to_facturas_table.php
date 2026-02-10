<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSriColumnsToFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->string('clave_acceso', 49)->nullable()->unique()->after('id');
            $table->enum('estado_sri', ['PENDIENTE', 'ENVIADO', 'AUTORIZADO', 'RECHAZADO', 'ANULADO'])->default('PENDIENTE')->after('clave_acceso');
            $table->text('mensaje_sri')->nullable()->after('estado_sri');
            $table->string('xml_path')->nullable()->after('mensaje_sri');
            $table->integer('ambiente')->default(1)->comment('1: Pruebas, 2: Produccion')->after('xml_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropColumn(['clave_acceso', 'estado_sri', 'mensaje_sri', 'xml_path', 'ambiente']);
        });
    }
}
