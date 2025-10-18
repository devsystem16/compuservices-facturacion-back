<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CreditosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\PantallaposController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RetirosController;
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

Route::resource('forma-pagos', FormaPagoController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('facturas', FacturasController::class);
Route::resource('creditos', CreditosController::class);
Route::resource('proformas', ProformaController::class);
Route::post('/proformas/eliminar/{idProforma}',  [ProformaController::class, 'eliminarProforma']);

Route::post('/proformas/obtener', [ProformaController::class, 'obtenerProforma']);


Route::get('/reporte/ventas',  [FacturasController::class, 'reporteDiario']);
Route::get('/reporte/historicofacturas/{limite}',  [FacturasController::class, 'historiofacturas']);

Route::post('/reporte/historicofacturas-filter',  [FacturasController::class, 'historiofacturasFilter']);
Route::post('/facturas/anulacion/nota-credito',  [FacturasController::class, 'anularFactura']);


Route::post('/creditos/abonar',  [CreditosController::class, 'abonar']);
Route::get('/creditos/lista/listado',  [CreditosController::class, 'ListadoCreditos']);
Route::post('/creditos/eliminar/{idCredito}',  [CreditosController::class, 'eliminarCredito']);

Route::get('/facturas/impresion/reimpresion/{id}',  [FacturasController::class, 'reimpresion']);


Route::post('/ordenes/abonos/nuevoabono',  [OrdenesController::class, 'abonar']);

Route::post('/ordenes/total/actualizar',  [OrdenesController::class, 'actualizarTotal']);


Route::post('/usuarios/acceso/login',  [UsuariosController::class, 'login']);


Route::get('/pantallapos/acceso/obtener-acceso/{tipoUsuario}',  [PantallaposController::class, 'obtenerAccesos']);




Route::post('/reportes/ventas-diarias',  [ReporteController::class, 'ventasDiarias']);
Route::post('/reportes/ingresos-empleado',  [ReporteController::class, 'ingresosXempleado']);
Route::get('/reportes/ventas-diarias/forma-pago',  [ReporteController::class, 'totalPorFormasPago']);



// PERIODO
Route::resource('periodo', PeriodoController::class);
Route::get('/periodo/verificar-periodo/apertura',  [PeriodoController::class, 'existePeriodoAbierto']);
Route::post('/periodo/cerrar-periodo/cierre/{id}',  [PeriodoController::class, 'cerrarPeriodo']);
Route::get('/periodo/verificar-periodo/retiros/obtenerRetiros',  [PeriodoController::class, 'obtenerRetiros']);


Route::resource('retiros', RetirosController::class);
Route::post('/retiros/eliminar/retiro/{idRetiro}',  [RetirosController::class, 'eliminarRetiro']);
