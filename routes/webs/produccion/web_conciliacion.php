<?php
Route::group(['prefix' => 'conciliaciones'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ConciliacionController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('concilia');
	Route::get('nuevo', [
	    'uses' => 'Produccion\ConciliacionController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('concilia.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ConciliacionController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('concilia.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('concilia.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('concilia.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('concilia.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('concilia.borrar');
});
