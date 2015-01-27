<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('home', "HomeController@getHome");

Route::get('listar-todas-noticias', "NoticiaController@getListar");
Route::get('listar-noticias/{genero}', "NoticiaController@getListarGenero");
Route::get('visualizar-noticias/{id}', "NoticiaController@getVisualizar");

//antes do login
Route::group(array(
	"before" => "guest"
), function() {
	Route::get('login', "UsuarioController@getLogin");
	Route::post('login', "UsuarioController@postLogin");

	Route::get('cadastro', "UsuarioController@getCadastrar");
	Route::post('cadastro', "UsuarioController@postCadastrar");

	Route::get('admin-cadastro', "UsuarioController@getAdminCadastro");
	Route::post('admin-cadastro', "UsuarioController@postAdminCadastro");
});

//apos o login
Route::group(array(
	"before" => "auth"
), function() {
	Route::get('logout', "UsuarioController@getLogout");
	Route::get('deletar-usuario', "UsuarioController@getDeletar");

	Route::get('perfil-usuario', "UsuarioController@getAlterar");
	Route::post('perfil-usuario', "UsuarioController@postAlterar");

	Route::get('admin-panel', "UsuarioController@getAdminPanel");

	Route::get('criar-noticia', "NoticiaController@getCriar");
	Route::post('criar-noticia', "NoticiaController@postCriar");

	Route::get('editar-noticia', "NoticiaController@getEditar");
	Route::post('editar-noticia', "NoticiaController@postEditar");

	Route::get('deletar-noticia', "NoticiaController@getDeletar");

	Route::post('criar-comentario', "ComentarioController@postCriar");

	Route::post('editar-comentario', "ComentarioController@postEditar");

	Route::get('deletar-comentario', "ComentarioController@getDeletar");
});
