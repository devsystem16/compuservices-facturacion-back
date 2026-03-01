<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterProformasFechaEmisionToDatetime extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE proformas MODIFY fecha_emision DATETIME NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE proformas MODIFY fecha_emision DATE NULL');
    }
}
