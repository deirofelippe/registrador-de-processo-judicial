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

Route::get('/processo/form', 'ProcessoController@create');
Route::post('/processo', 'ProcessoController@store');
Route::put('/processo', 'ProcessoController@update');
Route::delete('/processo/{idProcesso}', 'ProcessoController@destroy');
Route::get('/processo/{idProcesso}', 'ProcessoController@show');
Route::get('/processo/{idProcesso}/edit', 'ProcessoController@edit');
Route::get('/processos', 'ProcessoController@index');
Route::get('/', 'ProcessoController@index');
