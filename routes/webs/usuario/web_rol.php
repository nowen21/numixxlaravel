<?php

$controll = 'Usuario\Rol';
$routexxx = 'roles';
Route::group(['prefix' => 'roles'], function () use ($controll, $routexxx) {

	Route::get('', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);
	Route::get('nuevo', [
		'uses' => $controll . 'Controller@create',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.nuevo');
	Route::post('crear', [
		'uses' => $controll . 'Controller@store',
		'middleware' => ['permission:' . $routexxx . '-crear']
	])->name($routexxx . '.crear');
	Route::get('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@edit',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editar');
	Route::put('editar/{objetoxx}', [
		'uses' => $controll . 'Controller@update',
		'middleware' => ['permission:' . $routexxx . '-editar']
	])->name($routexxx . '.editar');
	Route::get('ver/{objetoxx}', [
		'uses' => $controll . 'Controller@show',
		'middleware' => ['permission:' . $routexxx . '-leer']
	])->name($routexxx . '.ver');
	Route::delete('borrar/{objetoxx}', [
		'uses' => $controll . 'Controller@destroy',
		'middleware' => ['permission:' . $routexxx . '-borrar']
	])->name($routexxx . '.borrar');
});







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
