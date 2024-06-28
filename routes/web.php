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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('home');
});

/*EJ crud completo

  GET|HEAD        actividades .................................................... actividades.index › ActivController@index  
  POST            actividades .................................................... actividades.store › ActivController@store  
  GET|HEAD        actividades/create .............................................. actividades.create › ActivController@create  
  GET|HEAD        actividades/{actividade} ........................................ actividades.show › ActivController@show  
  PUT|PATCH       actividades/{actividade} ........................................ actividades.update › ActivController@update  
  DELETE          actividades/{actividade} ......................................... actividades.destroy › ActivController@destroy  
  GET|HEAD        actividades/{actividade}/edit .................................... actividades.edit › ActivController@edit
*/


Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index'])->name('grupos');
Route::post('/grupos_store', [App\Http\Controllers\GrupoController::class, 'store'])->name('grupos.store');
Route::post('/grupos_update/{id}', [App\Http\Controllers\GrupoController::class, 'update'])->name('grupos.update');
Route::get('/grupos_delete/{id}', [App\Http\Controllers\GrupoController::class, 'destroy'])->name('grupos.delete');

Route::post('/flia_store', [App\Http\Controllers\FliaController::class, 'store'])->name('flia.store');
Route::post('/flia_update/{id}', [App\Http\Controllers\FliaController::class, 'update'])->name('flia.update');
Route::get('/flia_delete/{id}', [App\Http\Controllers\FliaController::class, 'destroy'])->name('flia.delete');

Route::get('/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores');
Route::get('/proveedores_buscador', [App\Http\Controllers\ProveedorController::class, 'buscador'])->name('proveedores.buscador');
Route::get('/proveedores_show/{id}', [App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedores.show');
Route::post('/proveedores_store', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedores.store');
//Route::get('/proveedores_create', [App\Http\Controllers\ProveedorController::class, 'create'])->name('proveedores.create');
//Route::get('/proveedores_edit/{id}', [App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::post('/proveedores_update/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedores.update');
Route::get('/proveedores_delete/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedores.delete');

Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos');
Route::get('/productos_buscador', [App\Http\Controllers\ProductoController::class, 'buscador'])->name('productos.buscador');
Route::get('/productos_show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');
Route::post('/productos_store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos_create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos_edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::post('/productos_update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
Route::get('/productos_delete/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.delete');
