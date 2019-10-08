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

use App\User;
use App\usuario;
use App\BuscaAtiva;
use App\Enums\StatusBuscaAtiva;
use App\Notifications\NotificacaoBuscaAtiva;

Auth::routes();

Route::get('/', 'HomeController@notify')->name('home-notify');
Route::get('/home', 'HomeController@index')->name('home');

/* Rotas de Programas */
Route::get('/programas', 'ProgramaController@index')->name('programas');
Route::get('/programas/create', 'ProgramaController@create');
Route::get('/programas/detalhe/{id}', 'ProgramaController@show');
Route::get('/programas/editar/{id}', 'ProgramaController@edit');
Route::post('/programas/store', 'ProgramaController@store')->name('salvarPrograma');
Route::put('/programas/update/{id}', 'ProgramaController@update')->name('editarPrograma');
Route::delete('/programas/delete/{id}', 'ProgramaController@destroy')->name('deletarPrograma');
Route::get('/programas/search', 'ProgramaController@search');

/* Rotas de Usuários */
Route::resource('usuarios', 'UsuarioController');
Route::get('usuarios/{id}/relatorio-socioeconomico', 'UsuarioController@relatorioSocioEconomico');
Route::get('usuarios/{id}/relatorio-aquisicoes', 'UsuarioController@relatorioAquisicoes');

/* Rotas de Endereço */
Route::get('/usuarios/endereco/{id}', 'EnderecoController@formulario')->name('endereco.formulario');
Route::post('/usuarios/form/endereco', 'EnderecoController@store')->name('endereco.store');
Route::get('/usuarios/endereco/detalhes/{id}', 'EnderecoController@index')->name('endereco.index');
Route::get('/usuarios/endereco/detalhes/alterar/{id}', 'EnderecoController@edit')->name('endereco.edit');
Route::any('/usuarios/endereco/detalhes/atualizar/{endereco}', 'EnderecoController@update')->name('endereco.update');
Route::any('/usuarios/endereco/detalhes/remover/{id}', 'EnderecoController@destroy')->name('endereco.destroy');

/* Rotas de Familia */
Route::get('/usuarios/{idUsuario}/familiares/create', 'FamiliaController@create');
Route::get('/usuarios/{idUsuario}/familiares', 'FamiliaController@index');
Route::post('/usuarios/{idUsuario}/familiares', 'FamiliaController@store');
Route::get('/usuarios/{idUsuario}/familiares/{id}', 'FamiliaController@show');
Route::get('/usuarios/{idUsuario}/familiares/{id}/edit', 'FamiliaController@edit');
Route::put('/usuarios/{idUsuario}/familiares/{id}', 'FamiliaController@update');
Route::delete('/usuarios/{idUsuario}/familiares/{id}', 'FamiliaController@destroy');

/* Rotas de Projetos */
Route::resource('projetos', 'ProjetoController');

/* Rotas de OficinasProjetos */
Route::resource('oficinas-projetos', 'OficinaProjetoController');

/* Rotas de TurmaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/create', 'TurmaOficinaProjetoController@create');
Route::post('oficinas-projetos/{idOficina}/turmas/', 'TurmaOficinaProjetoController@store');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}', 'TurmaOficinaProjetoController@show');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/edit', 'TurmaOficinaProjetoController@edit');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/', 'TurmaOficinaProjetoController@update');
Route::delete('oficinas-projetos/{idOficina}/turmas/{idTurma}/', 'TurmaOficinaProjetoController@destroy');

/* Rotas PresencaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/', 'PresencaOficinaProjetoController@index');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/create', 'PresencaOficinaProjetoController@create');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/', 'PresencaOficinaProjetoController@store');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/{data}', 'PresencaOficinaProjetoController@show');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencas/{idPresenca}/justificar', 'PresencaOficinaProjetoController@justificar');

/* Rotas MatriculaOficinaProjeto */
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/', 'MatriculaOficinaProjetoController@index');
Route::get('oficinas-projetos/{idOficina}/matriculas/create', 'MatriculaOficinaProjetoController@create');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@show');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/edit', 'MatriculaOficinaProjetoController@edit');
Route::post('oficinas-projetos/{idOficina}/matriculas/', 'MatriculaOficinaProjetoController@store');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/concluir', 'MatriculaOficinaProjetoController@concluir');
Route::post('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}/desistir', 'MatriculaOficinaProjetoController@desistir');
Route::put('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@update');
Route::delete('oficinas-projetos/{idOficina}/turmas/{idTurma}/matriculas/{idMatricula}', 'MatriculaOficinaProjetoController@destroy');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/plotar/', 'PresencaOficinaProjetoController@plotar');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencaGrafico/{id}', 'PresencaOficinaProjetoController@grafico');
Route::get('oficinas-projetos/{idOficina}/turmas/{idTurma}/presencaGrafico/{id}/pdf', 'PresencaOficinaProjetoController@nameMethod');

/* Rotas Fichas Aquisições */
Route::get('usuarios/{idUsuario}/fichas-aquisicoes', 'FichaAquisicaoController@index');
Route::post('usuarios/{idUsuario}/fichas-aquisicoes/store', 'FichaAquisicaoController@store');
Route::get('usuarios/{idUsuario}/fichas-aquisicoes/{idFicha}', 'FichaAquisicaoController@show');
Route::put('usuarios/{idUsuario}/fichas-aquisicoes/{idFicha}', 'FichaAquisicaoController@update');

/* Rotas Users */
Route::get('users', 'UserController@index');
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/edit', 'UserController@edit');
Route::put('users/{id}', 'UserController@update');

/* Rotas redefinir Senha */
Route::get('redefinir-senha/{id}', 'RedefinirSenhaController@edit');
Route::put('redefinir-senha/{id}', 'RedefinirSenhaController@update');

/* Rotas Notificações */
Route::get('/notificacoes', 'NotificacoesController@index')->name('notificacoes');
Route::get('/notificacoes/mark-all-as-read', 'NotificacoesController@markAllAsRead')->name('markAllAsRead');
Route::get('/notificacoes/mark-as-read/{id}','NotificacoesController@markAsRead')->name('markAsRead');
Route::get('/notificacoes/ativas', 'NotificacoesController@recuperaNotificacoesUsuario')->name('notificacoes-ativas');

/* Rotas relatório demográfico */
// Route::resource('relatorio-demografico', 'OficinaProjetoController@relatorioDemografico');
Route::resource('relatorio-demografico', 'RelatorioDemograficoController');
Route::get('relatorio-demografico/{id}/{type}', 'RelatorioDemograficoController@relatorioDemografico');


/* Rotas Buscas Ativas
   TODO: extrair funções para o controller correto
   Isso não foi feito ainda pois as rotas não estavam conseguindo encontrar o controller
*/
Route::get('iniciar-busca/{nome}/{idNot}', function ($nome, $idNot) {

    $beneficiado = usuario::where('nome', $nome)->first();
    $usuarioLogado = Auth::user();

    $buscaAtiva = new BuscaAtiva();
    $buscaAtiva->id_usuario = $beneficiado->id;
    $buscaAtiva->id_users = $usuarioLogado->id;
    $buscaAtiva->data_inicio = date('Y-m-d');
    $buscaAtiva->save();

    return redirect()->route('markAsRead', ['id' => $idNot]);

})->name('iniciar-busca');

Route::get('busca-ativa', 'BuscaAtivaController@index')->name('busca-ativa');
Route::post('busca-ativa/concluir', 'BuscaAtivaController@concluir')->name('concluir-busca');

// Route::get('concluir-busca/{nome}/{idNot}', function ($nome, $idNot) {

//     $beneficiado = usuario::where('nome', $nome)->first();
//     $usuarioLogado = Auth::user();

//     $buscaAtiva = BuscaAtiva::where('id_usuario', $beneficiado->id)->first();
//     $buscaAtiva->status = StatusBuscaAtiva::Concluida;
//     $buscaAtiva->data_conclusao = date('Y-m-d');
//     $buscaAtiva->save();

//     return redirect()->route('markAsRead', ['id' => $idNot]);

// })->name('concluir-busca');


