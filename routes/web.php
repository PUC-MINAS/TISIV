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
Route::get('/programas/detalhe/{id}', 'ProgramaController@show');
Route::get('/programas/editar/{id}', 'ProgramaController@edit');
Route::post('/programas/store', 'ProgramaController@store')->name('salvarPrograma');
Route::put('/programas/update/{id}', 'ProgramaController@update')->name('editarPrograma');
Route::delete('/programas/delete/{id}', 'ProgramaController@destroy')->name('deletarPrograma');

/* Rotas de Usuários */
Route::resource('cadastro', 'UsuarioController');

/* Rotas de Projetos */
Route::resource('projetos', 'ProjetoController');

/* Rotas de OficinasProjetos */
Route::resource('oficinas-projetos', 'OficinaProjetoController');

/* Rotas PresencaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/criar-lista-presenca', 'TurmaOficinaProjetoController@criarListaPresenca');
