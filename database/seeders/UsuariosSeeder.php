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
        $tec->nombres = "Naty Rosero";
        $tec->pass = "4020";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 1;
        $tec->usuario = "freddy";
        $tec->nombres = "Freddy Cantos";
        $tec->pass = "2017";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 3;
        $tec->usuario = "1250";
        $tec->nombres = "Angel Mendoza";
        $tec->pass = "123";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "ricardo";
        $tec->nombres = "Ricardo Cantos";
        $tec->pass = "2021";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "jorge";
        $tec->nombres = "Jorge Figuera";
        $tec->pass = "1106";
        $tec->save();

        $tec   = new Usuarios();
        $tec->tipo_usuarios_id = 2;
        $tec->usuario = "alejandro";
        $tec->nombres = "Alejandro Ruiz";
        $tec->pass = "1002";
        $tec->save();
    }
}
