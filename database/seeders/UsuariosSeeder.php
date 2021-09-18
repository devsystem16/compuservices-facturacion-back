<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tecnicos::factory(10)->create();
        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 1;
        $tec->usuario = "naty";
        $tec->nombres = "Nathy Rosero";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 1;
        $tec->usuario = "freddy";
        $tec->nombres = "Freddy Cantos";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 3;
        $tec->usuario = "angel";
        $tec->nombres = "Angel";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "ricardo";
        $tec->nombres = "RICARDO";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "jorge";
        $tec->nombres = "JORGE";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "alejandro";
        $tec->nombres = "ALEJANDRO";
        $tec->pass = "123";
        $tec->save();
    }
}
