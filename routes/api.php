<?php


use App\Http\Controllers\API\Front\CategoriaController as FrontCategoriaController;
use App\Http\Controllers\API\Front\ProductoController as FrontProductoController;
use App\Http\Controllers\API\Panel\CategoriaController;
use App\Http\Controllers\API\Panel\NegocioController;
use App\Http\Controllers\API\Panel\ProductoController;
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
// FRONT
Route::get('productos/listar', [FrontProductoController::class, 'listarProductosVisibles'])->name('front.productos.listar');
Route::get('producto/mostrar/{producto}', [FrontProductoController::class, 'mostrarProductoIndividual'])->name('front.productos.mostrar');
Route::get('categoria/mostrar/{categoria}', [FrontCategoriaController::class, 'mostrarCategoriaIndividual'])->name('front.categorias.mostrar');
Route::get('categorias/listar', [FrontCategoriaController::class, 'listarCategorias'])->name('front.categorias.listar');
Route::get('categoria/{categoria}/productos', [FrontCategoriaController::class, 'getProductosFromThisCategoria'])->name('front.categorias.productos');
// FIN FRONT

// PANEL
Route::apiResource('productos', ProductoController::class);
Route::apiResource('categorias',CategoriaController::class);
Route::apiResource('negocios', NegocioController::class);
// FIN PANEL
// 