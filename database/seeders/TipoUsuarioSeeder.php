<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tecnicos::factory(10)->create();
        $tec   = new TipoUsuario();
        $tec->tipo = "ADMINISTRADOR";
        $tec->save();

        $tec1   = new TipoUsuario();
        $tec1->tipo = "TECNICO";
        $tec1->save();

        $tec1   = new TipoUsuario();
        $tec1->tipo = "ATENCION AL PUBLICO";
        $tec1->save();
    }
}
