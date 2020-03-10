<?php
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', [
	    'uses' => 'Usuario\UsuarioController@index',
	    'middleware' => ['permission:usuarios-leer|usuarios-crear|usuarios-editar|usuarios-borrar']
	])->name('usuario');
	Route::get('nuevo', [
                        'uses' => 'Usuario\UsuarioController@create',
                        'middleware' => ['permission:usuarios-crear']
                        ]
                )->name('usuario.nuevo');
	Route::post('crear', [
	    'uses' => 'Usuario\UsuarioController@store',
	    'middleware' => ['permission:usuarios-crear']
	])->name('usuario.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@edit',
	    'middleware' => ['permission:usuarios-editar']
	])->name('usuario.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@update',
	    'middleware' => ['permission:usuarios-editar']
	])->name('usuario.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@show',
	    'middleware' => ['permission:usuarios-leer']
	])->name('usuario.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Usuario\UsuarioController@destroy',
	    'middleware' => ['permission:usuarios-borrar']
	])->name('usuario.borrar');
});
