<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SyncDatabaseSchemaChanges extends Migration
{
    /**
     * Sincronizar migraciones con los cambios que se hicieron directamente en MySQL.
     * Usa helpers de idempotencia para que sea seguro ejecutar incluso si la BD ya tiene los cambios.
     */
    public function up()
    {
        // ─── Columnas nuevas ───────────────────────────────────────────

        // facturas.periodo_id
        if (!$this->columnExists('facturas', 'periodo_id')) {
            DB::statement('ALTER TABLE facturas ADD COLUMN periodo_id INT NULL');
        }

        // facturas.impuesto
        if (!$this->columnExists('facturas', 'impuesto')) {
            DB::statement('ALTER TABLE facturas ADD COLUMN impuesto INT NULL DEFAULT 15');
        }

        // creditos.periodo_id
        if (!$this->columnExists('creditos', 'periodo_id')) {
            DB::statement('ALTER TABLE creditos ADD COLUMN periodo_id INT NULL');
        }

        // detalle_creditos.forma_pago_id
        if (!$this->columnExists('detalle_creditos', 'forma_pago_id')) {
            DB::statement('ALTER TABLE detalle_creditos ADD COLUMN forma_pago_id INT NULL');
        }

        // detalle_creditos.periodo_id
        if (!$this->columnExists('detalle_creditos', 'periodo_id')) {
            DB::statement('ALTER TABLE detalle_creditos ADD COLUMN periodo_id INT NULL');
        }

        // ordenes.factura_relacionada
        if (!$this->columnExists('ordenes', 'factura_relacionada')) {
            DB::statement('ALTER TABLE ordenes ADD COLUMN factura_relacionada INT NULL');
        }

        // ordenes.periodo_id
        if (!$this->columnExists('ordenes', 'periodo_id')) {
            DB::statement('ALTER TABLE ordenes ADD COLUMN periodo_id INT NULL');
        }

        // periodos.fondo_asignado
        if (!$this->columnExists('periodos', 'fondo_asignado')) {
            DB::statement('ALTER TABLE periodos ADD COLUMN fondo_asignado DOUBLE(8,2) NULL');
        }

        // impuestos.estado
        if (!$this->columnExists('impuestos', 'estado')) {
            DB::statement('ALTER TABLE impuestos ADD COLUMN estado VARCHAR(45) NULL');
        }

        // productos.gravaIva
        if (!$this->columnExists('productos', 'gravaIva')) {
            DB::statement('ALTER TABLE productos ADD COLUMN gravaIva TINYINT NULL');
        }

        // productos.pocentaje
        if (!$this->columnExists('productos', 'pocentaje')) {
            DB::statement('ALTER TABLE productos ADD COLUMN pocentaje DOUBLE NULL');
        }

        // tipo_usuarios.hora_inicio
        if (!$this->columnExists('tipo_usuarios', 'hora_inicio')) {
            DB::statement('ALTER TABLE tipo_usuarios ADD COLUMN hora_inicio TIME NULL');
        }

        // tipo_usuarios.hora_fin
        if (!$this->columnExists('tipo_usuarios', 'hora_fin')) {
            DB::statement('ALTER TABLE tipo_usuarios ADD COLUMN hora_fin TIME NULL');
        }

        // ─── Cambios de tipo de columna ────────────────────────────────

        DB::statement('ALTER TABLE facturas MODIFY fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE creditos MODIFY fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE ordenes MODIFY fecha DATETIME NOT NULL');
        DB::statement('ALTER TABLE periodos MODIFY fecha_apertura TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        DB::statement('ALTER TABLE periodos MODIFY fecha_cierre TIMESTAMP NULL');
        DB::statement('ALTER TABLE periodos MODIFY usuario_id_cierre INT UNSIGNED NULL');
        DB::statement('ALTER TABLE periodos MODIFY observaciones VARCHAR(255) NULL');

        // ─── Índice faltante ───────────────────────────────────────────

        if (!$this->indexExists('clientes', 'nombres_idx')) {
            DB::statement('CREATE INDEX nombres_idx ON clientes (nombres)');
        }
    }

    public function down()
    {
        // ─── Revertir índice ───────────────────────────────────────────

        if ($this->indexExists('clientes', 'nombres_idx')) {
            DB::statement('DROP INDEX nombres_idx ON clientes');
        }

        // ─── Revertir tipos de columna ─────────────────────────────────

        DB::statement('ALTER TABLE periodos MODIFY observaciones VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE periodos MODIFY usuario_id_cierre INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE periodos MODIFY fecha_cierre DATE NOT NULL');
        DB::statement('ALTER TABLE periodos MODIFY fecha_apertura DATE NOT NULL');
        DB::statement('ALTER TABLE ordenes MODIFY fecha DATE NOT NULL');
        DB::statement('ALTER TABLE creditos MODIFY fecha DATE NOT NULL');
        DB::statement('ALTER TABLE facturas MODIFY fecha DATE NOT NULL');

        // ─── Eliminar columnas agregadas ───────────────────────────────

        if ($this->columnExists('tipo_usuarios', 'hora_fin')) {
            DB::statement('ALTER TABLE tipo_usuarios DROP COLUMN hora_fin');
        }
        if ($this->columnExists('tipo_usuarios', 'hora_inicio')) {
            DB::statement('ALTER TABLE tipo_usuarios DROP COLUMN hora_inicio');
        }
        if ($this->columnExists('productos', 'pocentaje')) {
            DB::statement('ALTER TABLE productos DROP COLUMN pocentaje');
        }
        if ($this->columnExists('productos', 'gravaIva')) {
            DB::statement('ALTER TABLE productos DROP COLUMN gravaIva');
        }
        if ($this->columnExists('impuestos', 'estado')) {
            DB::statement('ALTER TABLE impuestos DROP COLUMN estado');
        }
        if ($this->columnExists('periodos', 'fondo_asignado')) {
            DB::statement('ALTER TABLE periodos DROP COLUMN fondo_asignado');
        }
        if ($this->columnExists('ordenes', 'periodo_id')) {
            DB::statement('ALTER TABLE ordenes DROP COLUMN periodo_id');
        }
        if ($this->columnExists('ordenes', 'factura_relacionada')) {
            DB::statement('ALTER TABLE ordenes DROP COLUMN factura_relacionada');
        }
        if ($this->columnExists('detalle_creditos', 'periodo_id')) {
            DB::statement('ALTER TABLE detalle_creditos DROP COLUMN periodo_id');
        }
        if ($this->columnExists('detalle_creditos', 'forma_pago_id')) {
            DB::statement('ALTER TABLE detalle_creditos DROP COLUMN forma_pago_id');
        }
        if ($this->columnExists('creditos', 'periodo_id')) {
            DB::statement('ALTER TABLE creditos DROP COLUMN periodo_id');
        }
        if ($this->columnExists('facturas', 'impuesto')) {
            DB::statement('ALTER TABLE facturas DROP COLUMN impuesto');
        }
        if ($this->columnExists('facturas', 'periodo_id')) {
            DB::statement('ALTER TABLE facturas DROP COLUMN periodo_id');
        }
    }

    // ─── Helpers de idempotencia ───────────────────────────────────────

    private function columnExists(string $table, string $column): bool
    {
        return Schema::hasColumn($table, $column);
    }

    private function indexExists(string $table, string $index): bool
    {
        $db = config('database.connections.mysql.database');
        $result = DB::select(
            "SELECT COUNT(*) AS cnt FROM information_schema.STATISTICS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND INDEX_NAME = ?",
            [$db, $table, $index]
        );
        return $result[0]->cnt > 0;
    }
}
