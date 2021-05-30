<?php

namespace Database\Seeders;
use App\Models\Clientes;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clientes::factory(50)->create();
    }
}
