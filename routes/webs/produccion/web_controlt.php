<?php
Route::group(['prefix' => 'controlest'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ControlTController@index',
	    'middleware' => ['permission:controlt-leer|controlt-crear|controlt-editar|controlt-borrar']
	])->name('controlt');
	Route::get('nuevo', [
	    'uses' => 'Produccion\ControlTController@create',
	    'middleware' => ['permission:controlt-crear']
	])->name('controlt.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ControlTController@store',
	    'middleware' => ['permission:controlt-crear']
	])->name('controlt.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@edit',
	    'middleware' => ['permission:controlt-editar']
	])->name('controlt.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@update',
	    'middleware' => ['permission:controlt-editar']
	])->name('controlt.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@show',
	    'middleware' => ['permission:controlt-leer']
	])->name('controlt.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@destroy',
	    'middleware' => ['permission:controlt-borrar']
	])->name('controlt.borrar');
});
