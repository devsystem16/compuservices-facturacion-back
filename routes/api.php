<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\ProductosController;
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
