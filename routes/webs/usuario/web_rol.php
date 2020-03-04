<?php
Route::group(['prefix' => 'roles'], function () {
    Route::get('', [
	    'uses' => 'Usuario\RolController@index',
	    'middleware' => ['permission:roles-leer|roles-crear|roles-editar|roles-borrar']
	])->name('rol');
	Route::get('nuevo', [
	    'uses' => 'Usuario\RolController@create',
	    'middleware' => ['permission:roles-crear']
	])->name('rol.nuevo');
	Route::post('crear', [
	    'uses' => 'Usuario\RolController@store',
	    'middleware' => ['permission:roles-crear']
	])->name('rol.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@edit',
	    'middleware' => ['permission:roles-editar']
	])->name('rol.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@update',
	    'middleware' => ['permission:roles-editar']
	])->name('rol.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Usuario\RolController@show',
	    'middleware' => ['permission:roles-leer']
	])->name('rol.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Usuario\RolController@destroy',
	    'middleware' => ['permission:roles-borrar']
	])->name('rol.borrar');
});
