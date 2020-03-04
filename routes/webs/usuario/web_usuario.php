<?php
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', [
	    'uses' => 'Usuario\UsuarioController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('usuario');
	Route::get('nuevo', [
	    'uses' => 'Usuario\UsuarioController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('usuario.nuevo');
	Route::post('crear', [
	    'uses' => 'Usuario\UsuarioController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('usuario.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('usuario.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('usuario.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('usuario.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('usuario.borrar');
});
