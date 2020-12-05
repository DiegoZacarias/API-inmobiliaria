<?php


use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\Front\ProductoController as FrontProductoController;
use App\Http\Controllers\API\NegocioController;
use App\Http\Controllers\API\ProductoController;
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
// FIN FRONT

// PANEL
Route::apiResource('productos', ProductoController::class);
Route::apiResource('categorias',CategoriaController::class);
Route::apiResource('negocios', NegocioController::class);
// FIN PANEL
// 