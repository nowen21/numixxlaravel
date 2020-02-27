<?php
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', [
	    'uses' => 'Usuarios\UsuarioController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('usuario');
	Route::get('nuevo', [
	    'uses' => 'Usuarios\UsuarioController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('usuario.nuevo');
	Route::post('crear', [
	    'uses' => 'Usuarios\UsuarioController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('usuario.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Usuarios\UsuarioController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('usuario.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Usuarios\UsuarioController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('usuario.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Usuarios\UsuarioController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('usuario.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Usuarios\UsuarioController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('usuario.borrar');
});