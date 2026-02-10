<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Catch-all: any route that is NOT /api/* will serve the React SPA.
// React Router handles client-side routing from here.
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');
