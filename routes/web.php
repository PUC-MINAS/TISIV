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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

/* Rotas de Programas */
Route::get('/programas', 'ProgramaController@index')->name('programas');
Route::get('/programas/create', 'ProgramaController@create');
Route::post('/programas/store', 'ProgramaController@store');