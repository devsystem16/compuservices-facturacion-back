<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CreditosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\PantallaposController;
use App\Http\Controllers\DetalleCreditosController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RetirosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteAvanzadoController;
use App\Http\Controllers\CategoriaGastoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\BodegasController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\UtilidadProductosController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\CuentaContableController;
use App\Http\Controllers\AsientoContableController;
use App\Http\Controllers\ReporteContableController;
use App\Http\Controllers\ConsultaPublicaController;
use App\Http\Controllers\ProveedorController;
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
Route::get('/clientes/listado/{limite}', [ClienteController::class, 'listado']);


Route::resource('ordenes', OrdenesController::class);
Route::get('/ordenes/listado/{limite}', [OrdenesController::class, 'listado']);

Route::get('/productos/listado/{limite}', [ProductosController::class, 'listado']);
Route::get('/productos/buscarProducto/{texto?}', [ProductosController::class, 'buscarProducto']);
Route::get('/productos/next-id/codigo-barra', [ProductosController::class, 'nextId']);

Route::resource('productos', ProductosController::class);

Route::resource('forma-pagos', FormaPagoController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('facturas', FacturasController::class);
Route::resource('creditos', CreditosController::class);
Route::resource('proformas', ProformaController::class);
Route::post('/proformas/eliminar/{idProforma}', [ProformaController::class, 'eliminarProforma']);

Route::post('/proformas/obtener', [ProformaController::class, 'obtenerProforma']);

// COmentario. PAra despliegue.
Route::get('/reporte/ventas', [FacturasController::class, 'reporteDiario']);
Route::get('/reporte/historicofacturas/{limite}', [FacturasController::class, 'historiofacturas']);

Route::post('/reporte/historicofacturas-filter', [FacturasController::class, 'historiofacturasFilter']);
Route::post('/facturas/anulacion/nota-credito', [FacturasController::class, 'anularFactura']);
Route::put('/facturas/{id}/formas-pago', [FacturasController::class, 'actualizarFormasPago']);


Route::post('/creditos/abonar', [CreditosController::class, 'abonar']);
Route::get('/creditos/lista/listado', [CreditosController::class, 'ListadoCreditos']);
Route::get('/creditos/pendientes/cliente/{clienteId}', [CreditosController::class, 'creditosPendientesPorCliente']);
Route::post('/creditos/anular/factura/{idFactura}', [CreditosController::class, 'anularPorFactura']);
Route::post('/creditos/eliminar/{idCredito}', [CreditosController::class, 'eliminarCredito']);

Route::put('/detalle-creditos/{id}/forma-pago', [DetalleCreditosController::class, 'actualizarFormaPago']);





Route::get('/facturas/impresion/reimpresion/{id}', [FacturasController::class, 'reimpresion']);


Route::post('/ordenes/abonos/nuevoabono', [OrdenesController::class, 'abonar']);

Route::post('/ordenes/total/actualizar', [OrdenesController::class, 'actualizarTotal']);


Route::post('/usuarios/acceso/login', [UsuariosController::class, 'login']);

// USUARIOS - CRUD
Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::get('/usuarios/{id}', [UsuariosController::class, 'show']);
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::put('/usuarios/{id}', [UsuariosController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy']);
Route::put('/usuarios/{id}/cambiar-password', [UsuariosController::class, 'cambiarPassword']);
Route::get('/usuarios/tipos/listado', [UsuariosController::class, 'tiposUsuario']);


Route::get('/pantallapos/acceso/obtener-acceso/{tipoUsuario}', [PantallaposController::class, 'obtenerAccesos']);




Route::post('/reportes/ventas-diarias', [ReporteController::class, 'ventasDiarias']);
Route::post('/reportes/ingresos-empleado', [ReporteController::class, 'ingresosXempleado']);
Route::get('/reportes/ventas-diarias/forma-pago', [ReporteController::class, 'totalPorFormasPago']);



// PERIODO
Route::resource('periodo', PeriodoController::class);
Route::get('/periodo/verificar-periodo/apertura', [PeriodoController::class, 'existePeriodoAbierto']);
Route::post('/periodo/cerrar-periodo/cierre/{id}', [PeriodoController::class, 'cerrarPeriodo']);
Route::get('/periodo/verificar-periodo/retiros/obtenerRetiros', [PeriodoController::class, 'obtenerRetiros']);



Route::get('/retiros/ultimos-30-dias', [RetirosController::class, 'ultimos30Dias']);
Route::resource('retiros', RetirosController::class);
Route::post('/retiros/eliminar/retiro/{idRetiro}', [RetirosController::class, 'eliminarRetiro']);


// DASHBOARD
Route::get('/dashboard/resumen', [DashboardController::class, 'resumen']);
Route::get('/dashboard/ventas-periodo', [DashboardController::class, 'ventasPeriodo']);
Route::get('/dashboard/top-productos', [DashboardController::class, 'topProductos']);
Route::get('/dashboard/top-clientes', [DashboardController::class, 'topClientes']);
Route::get('/dashboard/stock-bajo', [DashboardController::class, 'stockBajo']);
Route::get('/dashboard/creditos-pendientes', [DashboardController::class, 'creditosPendientes']);


// REPORTES AVANZADOS
Route::post('/reportes/utilidades', [ReporteAvanzadoController::class, 'utilidades']);
Route::post('/reportes/abonos-creditos', [ReporteAvanzadoController::class, 'abonosCreditos']);
Route::get('/reportes/inventario-valorizado', [ReporteAvanzadoController::class, 'inventarioValorizado']);
Route::post('/reportes/cuentas-por-cobrar', [ReporteAvanzadoController::class, 'cuentasPorCobrar']);
Route::post('/reportes/ventas-por-producto', [ReporteAvanzadoController::class, 'ventasPorProducto']);
Route::post('/reportes/ventas-por-cliente', [ReporteAvanzadoController::class, 'ventasPorCliente']);
Route::post('/reportes/comparativo-mensual', [ReporteAvanzadoController::class, 'comparativoMensual']);
Route::post('/reportes/exportar-excel', [ReporteAvanzadoController::class, 'exportarExcel']);
Route::post('/reportes/exportar-pdf', [ReporteAvanzadoController::class, 'exportarPdf']);


// CATEGORÍA GASTOS
Route::get('/categoria-gastos', [CategoriaGastoController::class, 'index']);
Route::post('/categoria-gastos', [CategoriaGastoController::class, 'store']);
Route::put('/categoria-gastos/{id}', [CategoriaGastoController::class, 'update']);
Route::delete('/categoria-gastos/{id}', [CategoriaGastoController::class, 'destroy']);


// GASTOS
Route::get('/gastos', [GastoController::class, 'index']);
Route::post('/gastos', [GastoController::class, 'store']);
Route::put('/gastos/{id}', [GastoController::class, 'update']);
Route::delete('/gastos/{id}', [GastoController::class, 'destroy']);
Route::post('/gastos/por-categoria', [GastoController::class, 'porCategoria']);
Route::post('/gastos/balance-caja', [GastoController::class, 'balanceCaja']);


// BODEGAS
Route::get('/bodegas', [BodegasController::class, 'index']);
Route::post('/bodegas', [BodegasController::class, 'store']);
Route::put('/bodegas/{id}', [BodegasController::class, 'update']);
Route::delete('/bodegas/{id}', [BodegasController::class, 'destroy']);


// KARDEX
Route::get('/kardex', [KardexController::class, 'index']);
Route::get('/kardex/export-excel', [KardexController::class, 'exportExcel']);
Route::get('/kardex/{id}', [KardexController::class, 'show']);
Route::post('/kardex/ajuste', [KardexController::class, 'ajusteManual']);
Route::post('/kardex/entrada', [KardexController::class, 'entradaManual']);
Route::post('/kardex/transferencia', [KardexController::class, 'transferencia']);

// myke
// UTILIDAD PRODUCTOS
Route::get('/utilidad-productos', [UtilidadProductosController::class, 'index']);
Route::get('/utilidad-productos/export-excel', [UtilidadProductosController::class, 'exportExcel']);


// PERMISOS
Route::get('/permisos', [PermisoController::class, 'index']);
Route::get('/tipo-usuarios/{id}/permisos', [PermisoController::class, 'permisosPorTipo']);
Route::post('/tipo-usuarios/{id}/permisos', [PermisoController::class, 'asignarPermisos']);
Route::get('/mis-permisos/{tipoUsuarioId}', [PermisoController::class, 'misPermisos']);

// PANTALLAS - Asignacion de pantallas por tipo de usuario
Route::get('/pantallas/catalogo', [PantallaposController::class, 'catalogo']);
Route::get('/pantallas/tipo-usuario/{id}', [PantallaposController::class, 'pantallasPorTipo']);
Route::post('/pantallas/tipo-usuario/{id}/asignar', [PantallaposController::class, 'asignarPantallas']);


// CONTABILIDAD - PLAN DE CUENTAS
Route::get('/cuenta-contables', [CuentaContableController::class, 'index']);
Route::get('/cuenta-contables/lista', [CuentaContableController::class, 'lista']);
Route::post('/cuenta-contables', [CuentaContableController::class, 'store']);
Route::get('/cuenta-contables/{id}', [CuentaContableController::class, 'show']);
Route::put('/cuenta-contables/{id}', [CuentaContableController::class, 'update']);
Route::delete('/cuenta-contables/{id}', [CuentaContableController::class, 'destroy']);

// CONTABILIDAD - ASIENTOS CONTABLES
Route::get('/asientos-contables', [AsientoContableController::class, 'index']);
Route::post('/asientos-contables', [AsientoContableController::class, 'store']);
Route::get('/asientos-contables/{id}', [AsientoContableController::class, 'show']);
Route::put('/asientos-contables/{id}', [AsientoContableController::class, 'update']);
Route::post('/asientos-contables/{id}/contabilizar', [AsientoContableController::class, 'contabilizar']);
Route::post('/asientos-contables/{id}/anular', [AsientoContableController::class, 'anular']);

// CONTABILIDAD - GENERACION AUTOMATICA
Route::post('/asientos-contables/generar/desde-factura/{id}', [AsientoContableController::class, 'generarDesdeFactura']);
Route::post('/asientos-contables/generar/desde-gasto/{id}', [AsientoContableController::class, 'generarDesdeGasto']);
Route::post('/asientos-contables/generar/desde-retiro/{id}', [AsientoContableController::class, 'generarDesdeRetiro']);

// CONTABILIDAD - REPORTES
Route::post('/contabilidad/libro-diario', [ReporteContableController::class, 'libroDiario']);
Route::post('/contabilidad/libro-mayor', [ReporteContableController::class, 'libroMayor']);
Route::post('/contabilidad/balance-comprobacion', [ReporteContableController::class, 'balanceComprobacion']);
Route::post('/contabilidad/balance-general', [ReporteContableController::class, 'balanceGeneral']);
Route::post('/contabilidad/estado-resultados', [ReporteContableController::class, 'estadoResultados']);


// PORTAL PUBLICO - SEGUIMIENTO DE REPARACIONES (sin auth)
Route::post('/public/consulta-orden', [ConsultaPublicaController::class, 'consultarOrden'])
    ->middleware('throttle:10,1');

// ORDENES - CAMBIAR ESTADO REPARACION (interno)
Route::post('/ordenes/cambiar-estado', [ConsultaPublicaController::class, 'cambiarEstado']);


// PROVEEDORES
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);
