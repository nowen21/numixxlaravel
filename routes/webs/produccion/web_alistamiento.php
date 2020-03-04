<?php
Route::group(['prefix' => 'alistamientos'], function () {
    Route::get('', [
	    'uses' => 'Produccion\AlistamientoController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('alistami');
	Route::get('nuevo', [
	    'uses' => 'Produccion\AlistamientoController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('alistami.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\AlistamientoController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('alistami.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('alistami.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('alistami.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('alistami.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\AlistamientoController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('alistami.borrar');
});
