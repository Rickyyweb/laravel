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

// para exibir html
Route::resource('agencias', 'AgenciaController');
Route::resource('bancos', 'BancoController');
Route::resource('conta_bancarias', 'ContaBancariaController');


//para API apenas
Route::apiResource('bancossapi', 'BancoApiController');
