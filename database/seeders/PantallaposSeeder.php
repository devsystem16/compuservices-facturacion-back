<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pantallapos;

class PantallaposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Perfil Addministrador
        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/dashboard";
        $pantalla->icon = "BarChartIcon";
        $pantalla->title = "Dashboard";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/puntoventa";
        $pantalla->icon = "Billing";
        $pantalla->title = "Punto de Venta";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/ingreso";
        $pantalla->icon = "Smartphone";
        $pantalla->title = "Ingreso";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/customers";
        $pantalla->icon = "UsersIcon";
        $pantalla->title = "Cientes";
        $pantalla->save();

        // Padre: Productos y Servicios
        $padre = new Pantallapos();
        $padre->tipo_usuario_id = 1;
        $padre->href = null;
        $padre->icon = "ShoppingBagIcon";
        $padre->title = "Productos y Servicios";
        $padre->save();

        // Hijo 1: Productos
        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->parent_id = $padre->id;
        $pantalla->href = "/app/products";
        $pantalla->icon = "ShoppingBagIcon";
        $pantalla->title = "Productos";
        $pantalla->save();

        // Hijo 2: Kardex
        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->parent_id = $padre->id;
        $pantalla->href = "/app/kardex";
        $pantalla->icon = "ClipboardIcon";
        $pantalla->title = "Kardex";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/creditos";
        $pantalla->icon = "EditIconF";
        $pantalla->title = "Creditos";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 1;
        $pantalla->href = "/app/facturas";
        $pantalla->icon = "iconoFacturas";
        $pantalla->title = "Facturas";
        $pantalla->save();


        //Perfil tecnico


        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 2;
        $pantalla->href = "/app/ingreso";
        $pantalla->icon = "Smartphone";
        $pantalla->title = "Ingreso";
        $pantalla->save();



        // Perfil Ventas

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/dashboard";
        $pantalla->icon = "BarChartIcon";
        $pantalla->title = "Dashboard";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/puntoventa";
        $pantalla->icon = "Billing";
        $pantalla->title = "Punto de Venta";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/ingreso";
        $pantalla->icon = "Smartphone";
        $pantalla->title = "Ingreso";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/customers";
        $pantalla->icon = "UsersIcon";
        $pantalla->title = "Cientes";
        $pantalla->save();

        // $pantalla   = new Pantallapos();
        // $pantalla->tipo_usuario_id = 3;
        // $pantalla->href = "/app/products";
        // $pantalla->icon = "ShoppingBagIcon";
        // $pantalla->title = "Productos";
        // $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/creditos";
        $pantalla->icon = "EditIconF";
        $pantalla->title = "Creditos";
        $pantalla->save();

        $pantalla   = new Pantallapos();
        $pantalla->tipo_usuario_id = 3;
        $pantalla->href = "/app/facturas";
        $pantalla->icon = "iconoFacturas";
        $pantalla->title = "Facturas";
        $pantalla->save();
    }
}
