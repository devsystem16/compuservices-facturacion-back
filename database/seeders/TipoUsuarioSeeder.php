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
        $tec->tipo = "Administrador";
        $tec->save();

        $tec1   = new TipoUsuario();
        $tec1->tipo = "Tecnico";
        $tec1->save();
    }
}
