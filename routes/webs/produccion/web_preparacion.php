<?php
Route::group(['prefix' => 'preparaciones'], function () {
    Route::get('', [
	    'uses' => 'Produccion\PreparacionController@index',
	    'middleware' => ['permission:usuario-leer|usuario-crear|usuario-editar|usuario-borrar']
	])->name('preparac');
	Route::get('nuevo', [
	    'uses' => 'Produccion\PreparacionController@create',
	    'middleware' => ['permission:usuario-crear']
	])->name('preparac.nuevo');
	Route::post('crear', [
	    'uses' => 'Produccion\PreparacionController@store',
	    'middleware' => ['permission:usuario-crear']
	])->name('preparac.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@edit',
	    'middleware' => ['permission:usuario-editar']
	])->name('preparac.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@update',
	    'middleware' => ['permission:usuario-editar']
	])->name('preparac.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@show',
	    'middleware' => ['permission:usuario-leer']
	])->name('preparac.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Produccion\PreparacionController@destroy',
	    'middleware' => ['permission:usuario-borrar']
	])->name('preparac.borrar');
});
