<?php
Route::group(['prefix' => 'controlespf'], function () {
    Route::get('', [
	    'uses' => 'Reporte\ControlPFController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('controlpf');
	Route::get('nuevo', [
	    'uses' => 'Reporte\ControlPFController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlpf.nuevo');
	Route::post('crear', [
	    'uses' => 'Reporte\ControlPFController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('controlpf.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlpf.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('controlpf.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('controlpf.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('controlpf.borrar');
});
