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

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
//Home da Aplicação
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Listagem de Produtos
Route::get('/produtos', 'ProdutoController@lista')->middleware('auth');
//Detalhe de um Produto
Route::get('/produtos/detalhe/{id}', 'ProdutoController@exibe')->where('id', '[0-9]+')->middleware('auth');
//Formulário de Cadatro de um novo Produto
Route::get('/produtos/formulario', 'ProdutoController@formulario')->middleware('auth');
//Adiciona novo Produto
Route::post('/produtos/cadastra', 'ProdutoController@cadastra')->middleware('auth');
//Remover Produto
Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->middleware('auth');
//Formulário de Atuailização de Produto
Route::get('/produtos/edita/{id}', 'ProdutoController@edita')->middleware('auth');
//Atualizar Produto
Route::post('/produtos/atualiza', 'ProdutoController@atualiza')->middleware('auth');
