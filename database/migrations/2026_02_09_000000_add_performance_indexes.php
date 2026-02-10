<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerformanceIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->index('cliente_id');
            $table->index('fecha');
            $table->index('credito_id');
            $table->index('periodo_id');
            $table->index('estado');
            $table->index('deleted_at');
        });

        Schema::table('detalles', function (Blueprint $table) {
            $table->index('factura_id');
            $table->index('producto_id');
            $table->index('deleted_at');
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->index('cliente_id');
            $table->index('saldo');
            $table->index('deleted_at');
        });

        Schema::table('detalle_creditos', function (Blueprint $table) {
            $table->index('credito_id');
            $table->index('deleted_at');
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->index('stock');
            $table->index('deleted_at');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->index('cedula');
            $table->index('deleted_at');
        });

        Schema::table('ordenes', function (Blueprint $table) {
            $table->index('cliente_id');
            $table->index('usuario_id');
            $table->index('fecha');
            $table->index('estado');
            $table->index('deleted_at');
        });

        Schema::table('forma_pago_facturas', function (Blueprint $table) {
            $table->index('factura_id');
            $table->index('forma_pago_id');
            $table->index('deleted_at');
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
            $table->dropIndex(['cliente_id']);
            $table->dropIndex(['fecha']);
            $table->dropIndex(['credito_id']);
            $table->dropIndex(['periodo_id']);
            $table->dropIndex(['estado']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('detalles', function (Blueprint $table) {
            $table->dropIndex(['factura_id']);
            $table->dropIndex(['producto_id']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->dropIndex(['cliente_id']);
            $table->dropIndex(['saldo']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('detalle_creditos', function (Blueprint $table) {
            $table->dropIndex(['credito_id']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->dropIndex(['stock']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropIndex(['cedula']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('ordenes', function (Blueprint $table) {
            $table->dropIndex(['cliente_id']);
            $table->dropIndex(['usuario_id']);
            $table->dropIndex(['fecha']);
            $table->dropIndex(['estado']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('forma_pago_facturas', function (Blueprint $table) {
            $table->dropIndex(['factura_id']);
            $table->dropIndex(['forma_pago_id']);
            $table->dropIndex(['deleted_at']);
        });
    }
}
