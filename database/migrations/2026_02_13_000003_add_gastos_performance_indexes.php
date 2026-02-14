<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGastosPerformanceIndexes extends Migration
{
    public function up()
    {
        Schema::table('gastos', function (Blueprint $table) {
            $table->index('categoria_gasto_id');
            $table->index('periodo_id');
            $table->index('fecha');
            $table->index('usuario_id');
            $table->index('deleted_at');
        });

        Schema::table('categoria_gastos', function (Blueprint $table) {
            $table->index('activo');
            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::table('gastos', function (Blueprint $table) {
            $table->dropIndex(['categoria_gasto_id']);
            $table->dropIndex(['periodo_id']);
            $table->dropIndex(['fecha']);
            $table->dropIndex(['usuario_id']);
            $table->dropIndex(['deleted_at']);
        });

        Schema::table('categoria_gastos', function (Blueprint $table) {
            $table->dropIndex(['activo']);
            $table->dropIndex(['deleted_at']);
        });
    }
}
