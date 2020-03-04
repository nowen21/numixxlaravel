<?php
Route::group(['prefix' => 'controlesp'], function () {
    Route::get('', [
	    'uses' => 'Produccion\ControlPController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('controlp');
	Route::get('nuevo', [
	    'uses' => 'Produccion\ControlPController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlp.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\ControlPController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlp.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlp.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlp.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('controlp.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\ControlPController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('controlp.borrar');
});
