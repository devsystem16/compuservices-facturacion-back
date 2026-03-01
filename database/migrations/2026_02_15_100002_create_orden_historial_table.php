<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenHistorialTable extends Migration
{
    public function up()
    {
        Schema::create('orden_historial', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('orden_id');
            $table->unsignedInteger('usuario_id')->nullable();
            $table->string('evento', 100);
            $table->text('detalle')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('orden_id')->references('id')->on('ordenes')->onDelete('cascade');
            $table->index('orden_id');
            $table->index('evento');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orden_historial');
    }
}
