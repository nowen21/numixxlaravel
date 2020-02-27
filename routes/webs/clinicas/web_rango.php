<?php
Route::group(['prefix' => '/{clinica}'], function () {
    Route::get('rango', [
	    'uses' => 'Clinicas\CrangoController@index',
	    'middleware' => ['permission:crango-leer|crango-crear|crango-editar|crango-borrar']
	])->name('crango');
	Route::get('nuevo', [
	    'uses' => 'Clinicas\CrangoController@create',
	    'middleware' => ['permission:crango-crear']
	])->name('crango.nuevo');
	Route::post('crear', [
	    'uses' => 'Clinicas\CrangoController@store',
	    'middleware' => ['permission:crango-crear']
	])->name('crango.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Clinicas\CrangoController@edit',
	    'middleware' => ['permission:crango-editar']
	])->name('crango.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Clinicas\CrangoController@update',
	    'middleware' => ['permission:crango-editar']
	])->name('crango.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Clinicas\CrangoController@show',
	    'middleware' => ['permission:crango-leer']
	])->name('crango.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Clinicas\CrangoController@destroy',
	    'middleware' => ['permission:crango-borrar']
	])->name('crango.borrar');
});