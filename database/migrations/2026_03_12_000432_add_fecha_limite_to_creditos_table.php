<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechaLimiteToCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creditos', function (Blueprint $table) {
            $table->date('fecha_limite')->nullable()->after('fecha');
        });
    }

    public function down()
    {
        Schema::table('creditos', function (Blueprint $table) {
            $table->dropColumn('fecha_limite');
        });
    }
}
