<?php

use App\Http\Controllers\FrontController;
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

Route::get('/{any?}', function () {
    return view('inicio');
});

Route::get('/instalacion', function () {
    return view('instalacion');
})->name('instalacion');

Route::get('/routes', [FrontController::class, 'getRouteCollection'])->name('routes');
