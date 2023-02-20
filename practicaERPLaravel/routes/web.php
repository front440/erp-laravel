<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use App\Http\Controllers\LocalizationController;

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

Route::get('/', function () {
    return view('layouts.index');
});

// Route::get('/en', function () {

//     \App::setLocale('en');
// });

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);




// Categorías
Route::get('/categorias', [CategoriaController::class, 'show']);     // Muestra las categorías
Route::get('/crear-categoria', [CategoriaController::class, 'create']);     // Muestra el formulario para crear categorías
Route::post('/agregar-categoria', [CategoriaController::class, 'store']);    // Guarda la categoría
Route::get('/editar-categoria/{id}', [CategoriaController::class, 'edit']);     // Muestra el formulario para editar la categoría
Route::post('/update-categoria/{id}', [CategoriaController::class, 'update']);    // Actualiza la categoria
Route::post('/borrar-categoria/{id}', [CategoriaController::class, 'destroy']);   // Borra la categoría
Route::get('/categorias-pdf', [CategoriaController::class, 'pdf']);     // las categorias en un pdf


// Productos
Route::get('/productos', [ProductoController::class, 'show']);     // Muestra los productos
Route::get('/crear-producto', [ProductoController::class, 'create']);     // Muestra el formulario para crear productos
Route::post('/agregar-producto', [ProductoController::class, 'store']);    // Guarda la producto
Route::get('/editar-producto/{id}', [ProductoController::class, 'edit']);     // Muestra el formulario para editar la producto
Route::post('/update-producto/{id}', [ProductoController::class, 'update']);    // Actualiza la producto
Route::post('/borrar-producto/{id}', [ProductoController::class, 'destroy']);   // Borra la producto
Route::get('/productos-pdf', [ProductoController::class, 'pdf']);     // los productos en un pdf


// Negocios
Route::get('/negocios', [NegocioController::class, 'show']);     // Muestra los negocios
Route::get('/crear-negocio', [NegocioController::class, 'create']);     // Muestra el formulario para crear negocio
Route::post('/agregar-negocio', [NegocioController::class, 'store']);    // Guarda el negocio
Route::get('/editar-negocio/{id}', [NegocioController::class, 'edit']);     // Muestra el formulario para editar el negocio
Route::post('/update-negocio/{id}', [NegocioController::class, 'update']);    // Actualiza el negocio
Route::post('/borrar-negocio/{id}', [NegocioController::class, 'destroy']);   // Borra el negocio
Route::get('/negocios-pdf', [NegocioController::class, 'pdf']);     // los productos en un pdf


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
