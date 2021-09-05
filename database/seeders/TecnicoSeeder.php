<?php

namespace Database\Seeders;

use App\Models\Tecnicos;
use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tecnicos::factory(10)->create();
        $tec   = new Tecnicos();
        $tec->nombres = "Ricardo Granja";
        $tec->save();

        $tec1   = new Tecnicos();
        $tec1->nombres = "Nathy Rosero";
        $tec1->save();
    }
}
