<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddParentIdToPantallaposTable extends Migration
{
    public function up()
    {
        // Hacer href nullable sin doctrine/dbal
        DB::statement('ALTER TABLE pantallapos MODIFY href VARCHAR(900) NULL');

        Schema::table('pantallapos', function (Blueprint $table) {
            $table->unsignedInteger('parent_id')->nullable()->after('id');
            $table->foreign('parent_id')->references('id')->on('pantallapos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pantallapos', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });

        DB::statement("ALTER TABLE pantallapos MODIFY href VARCHAR(900) NOT NULL DEFAULT ''");
    }
}
