<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use App\Models\Usuarios;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // $this->Call(ClienteSeeder::class);
    // $this->call(ProductosSeeder::class);
    // $this->call(TecnicoSeeder::class);
    $this->call(TipoUsuarioSeeder::class);
    $this->call(UsuariosSeeder::class);
  }
}
