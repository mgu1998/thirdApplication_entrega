<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BackendMonedaController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('backend', [BackendController::class, 'main'])->name('backend.main');
Route::resource('backend/moneda', BackendMonedaController::class, ['names' => 'backend.moneda']);
Route::get('sesion', [IndexController::class, 'sesion'])->name('sesion');

