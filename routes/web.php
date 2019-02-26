<?php

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

Route::get('/', 'ProductController@index');
Route::get('/productos', 'ProductController@show');
Route::post('/producto/store', 'ProductController@store');
Route::post('/producto/update_estado', 'ProductController@updateEstado');

Route::get('/bodegas', 'ProductController@bodegas');
