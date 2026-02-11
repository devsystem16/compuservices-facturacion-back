<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPerformanceIndexes extends Migration
{
    private function indexExists($table, $column)
    {
        $indexName = "{$table}_{$column}_index";
        $result = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$indexName]);
        return count($result) > 0;
    }

    private function addIndexIfNotExists($table, $column)
    {
        if (!$this->indexExists($table, $column)) {
            Schema::table($table, function (Blueprint $t) use ($column) {
                $t->index($column);
            });
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // facturas
        $this->addIndexIfNotExists('facturas', 'cliente_id');
        $this->addIndexIfNotExists('facturas', 'fecha');
        $this->addIndexIfNotExists('facturas', 'credito_id');
        $this->addIndexIfNotExists('facturas', 'periodo_id');
        $this->addIndexIfNotExists('facturas', 'estado');
        $this->addIndexIfNotExists('facturas', 'deleted_at');

        // detalles
        $this->addIndexIfNotExists('detalles', 'factura_id');
        $this->addIndexIfNotExists('detalles', 'producto_id');
        $this->addIndexIfNotExists('detalles', 'deleted_at');

        // creditos
        $this->addIndexIfNotExists('creditos', 'cliente_id');
        $this->addIndexIfNotExists('creditos', 'saldo');
        $this->addIndexIfNotExists('creditos', 'deleted_at');

        // detalle_creditos
        $this->addIndexIfNotExists('detalle_creditos', 'credito_id');
        $this->addIndexIfNotExists('detalle_creditos', 'deleted_at');

        // productos
        $this->addIndexIfNotExists('productos', 'stock');
        $this->addIndexIfNotExists('productos', 'deleted_at');

        // clientes
        $this->addIndexIfNotExists('clientes', 'cedula');
        $this->addIndexIfNotExists('clientes', 'deleted_at');

        // ordenes
        $this->addIndexIfNotExists('ordenes', 'cliente_id');
        $this->addIndexIfNotExists('ordenes', 'usuario_id');
        $this->addIndexIfNotExists('ordenes', 'fecha');
        $this->addIndexIfNotExists('ordenes', 'estado');
        $this->addIndexIfNotExists('ordenes', 'deleted_at');

        // forma_pago_facturas
        $this->addIndexIfNotExists('forma_pago_facturas', 'factura_id');
        $this->addIndexIfNotExists('forma_pago_facturas', 'forma_pago_id');
        $this->addIndexIfNotExists('forma_pago_facturas', 'deleted_at');
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
