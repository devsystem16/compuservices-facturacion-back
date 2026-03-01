<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddPortalFieldsToOrdenesTable extends Migration
{
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->string('estado_reparacion', 20)->default('pendiente')->after('estado');
            $table->boolean('visible_cliente')->default(true)->after('estado_reparacion');
            $table->dateTime('fecha_completado')->nullable()->after('visible_cliente');
            $table->dateTime('fecha_entregado')->nullable()->after('fecha_completado');
        });

        // Poblar estado_reparacion basado en datos existentes
        // Si tiene trabajo y factura_relacionada → completado
        // Si tiene trabajo pero no factura → en_proceso
        // Si no tiene trabajo → pendiente
        DB::statement("
            UPDATE ordenes SET estado_reparacion = CASE
                WHEN factura_relacionada IS NOT NULL AND factura_relacionada != '' THEN 'completado'
                WHEN trabajo IS NOT NULL AND trabajo != '' THEN 'en_proceso'
                ELSE 'pendiente'
            END
        ");
    }

    public function down()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->dropColumn(['estado_reparacion', 'visible_cliente', 'fecha_completado', 'fecha_entregado']);
        });
    }
}
