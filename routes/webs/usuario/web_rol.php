<?php
Route::group(['prefix' => 'roles'], function () {
    Route::get('', [
	    'uses' => 'Usuario\RolController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('rol');
	Route::get('nuevo', [
	    'uses' => 'Usuario\RolController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('rol.nuevo');
	Route::post('crear', [
	    'uses' => 'Usuario\RolController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('rol.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('rol.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('rol.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Usuario\RolController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('rol.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('rol.borrar');
});
