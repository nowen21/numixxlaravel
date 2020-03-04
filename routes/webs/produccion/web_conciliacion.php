<?php
Route::group(['prefix' => 'conciliaciones'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ConciliacionController@index',
	    'middleware' => ['permission:concilia-leer|concilia-crear|concilia-editar|concilia-borrar']
	])->name('concilia');
	Route::get('nuevo', [
	    'uses' => 'Produccion\ConciliacionController@create',
	    'middleware' => ['permission:concilia-crear']
	])->name('concilia.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ConciliacionController@store',
	    'middleware' => ['permission:concilia-crear']
	])->name('concilia.crear');
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
});
