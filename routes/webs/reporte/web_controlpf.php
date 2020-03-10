<?php
Route::group(['prefix' => 'controlespf'], function () {
    Route::get('', [
	    'uses' => 'Reporte\ControlPFController@index',
	    'middleware' => ['permission:contropf-leer|contropf-crear|contropf-editar|contropf-borrar']
	])->name('controlpf');
	Route::get('nuevo', [
	    'uses' => 'Reporte\ControlPFController@create',
	    'middleware' => ['permission:contropf-crear']
	])->name('controlpf.nuevo');
	Route::post('crear', [
	    'uses' => 'Reporte\ControlPFController@store',
	    'middleware' => ['permission:contropf-crear']
	])->name('controlpf.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@edit',
	    'middleware' => ['permission:contropf-editar']
	])->name('controlpf.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@update',
	    'middleware' => ['permission:contropf-editar']
	])->name('controlpf.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@show',
	    'middleware' => ['permission:contropf-leer']
	])->name('controlpf.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Reporte\ControlPFController@destroy',
	    'middleware' => ['permission:contropf-borrar']
	])->name('controlpf.borrar');
});
