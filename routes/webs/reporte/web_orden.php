<?php
Route::group(['prefix' => 'ordenes'], function () {
    Route::get('', [
	    'uses' => 'Reporte\OrdenController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('orden');
	Route::get('nuevo', [
	    'uses' => 'Reporte\OrdenController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('orden.nuevo');
	Route::post('crear', [
	    'uses' => 'Reporte\OrdenController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('orden.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('orden.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('orden.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('orden.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('orden.borrar');
});
