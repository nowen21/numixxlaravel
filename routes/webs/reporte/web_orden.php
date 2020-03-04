<?php
Route::group(['prefix' => 'ordenes'], function () {
    Route::get('', [
	    'uses' => 'Reporte\OrdenController@index',
	    'middleware' => ['permission:ordprodu-leer|ordprodu-crear|ordprodu-editar|ordprodu-borrar']
	])->name('orden');
	Route::get('nuevo', [
	    'uses' => 'Reporte\OrdenController@create',
	    'middleware' => ['permission:ordprodu-crear']
	])->name('orden.nuevo');
	Route::post('crear', [
	    'uses' => 'Reporte\OrdenController@store',
	    'middleware' => ['permission:ordprodu-crear']
	])->name('orden.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@edit',
	    'middleware' => ['permission:ordprodu-editar']
	])->name('orden.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@update',
	    'middleware' => ['permission:ordprodu-editar']
	])->name('orden.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@show',
	    'middleware' => ['permission:ordprodu-leer']
	])->name('orden.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Reporte\OrdenController@destroy',
	    'middleware' => ['permission:ordprodu-borrar']
	])->name('orden.borrar');
});
