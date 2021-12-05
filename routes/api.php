<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CreditosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\PantallaposController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('clientes', ClienteController::class);
Route::get('/clientes/listado/{limite}',  [ClienteController::class, 'listado']);


Route::resource('ordenes', OrdenesController::class);
Route::get('/ordenes/listado/{limite}',  [OrdenesController::class, 'listado']);

Route::get('/productos/listado/{limite}',  [ProductosController::class, 'listado']);
Route::get('/productos/buscarProducto/{texto?}',  [ProductosController::class, 'buscarProducto']);

Route::resource('productos', ProductosController::class);


Route::resource('tecnicos', TecnicoController::class);
Route::resource('facturas', FacturasController::class);
Route::resource('creditos', CreditosController::class);

Route::get('/reporte/ventas',  [FacturasController::class, 'reporteDiario']);
Route::get('/reporte/historicofacturas',  [FacturasController::class, 'historiofacturas']);

Route::post('/reporte/historicofacturas-filter',  [FacturasController::class, 'historiofacturasFilter']);
Route::post('/facturas/anulacion/nota-credito',  [FacturasController::class, 'anularFactura']);


Route::post('/creditos/abonar',  [CreditosController::class, 'abonar']);
Route::get('/creditos/lista/listado',  [CreditosController::class, 'ListadoCreditos']);


Route::post('/ordenes/abonos/nuevoabono',  [OrdenesController::class, 'abonar']);

Route::post('/ordenes/total/actualizar',  [OrdenesController::class, 'actualizarTotal']);


Route::post('/usuarios/acceso/login',  [UsuariosController::class, 'login']);


Route::get('/pantallapos/acceso/obtener-acceso/{tipoUsuario}',  [PantallaposController::class, 'obtenerAccesos']);
