<?php
Route::group(['prefix' => 'conciliaciones'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ConciliacionController@index',
	    'middleware' => ['permission:concilia-leer|concilia-crear|concilia-editar|concilia-borrar']
	])->name('concilia');
	
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@edit',
	    'middleware' => ['permission:concilia-editar']
	])->name('concilia.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@update',
	    'middleware' => ['permission:concilia-editar']
	])->name('concilia.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@show',
	    'middleware' => ['permission:concilia-leer']
	])->name('concilia.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ConciliacionController@destroy',
	    'middleware' => ['permission:concilia-borrar']
	])->name('concilia.borrar');

	Route::post('esnumerico', [
	    'uses' => 'Produccion\ConciliacionController@esnumerico',
		'middleware' => ['concilia-editar']
	])->name('concilia.esnumerico');
});
