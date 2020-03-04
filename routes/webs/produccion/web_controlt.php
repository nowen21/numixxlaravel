<?php
Route::group(['prefix' => 'controlest'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ControlTController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('controlt');
	Route::get('nuevo', [
	    'uses' => 'Produccion\ControlTController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlt.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ControlTController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlt.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlt.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlt.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('controlt.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ControlTController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('controlt.borrar');
});
