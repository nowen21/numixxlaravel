<?php
Route::group(['prefix' => 'clinicas'], function () {
    Route::get('', [
	    'uses' => 'Clinicas\SisClinicaController@index',
	    'middleware' => ['permission:clinica-leer|clinica-crear|clinica-editar|clinica-borrar']
	])->name('clinica');
	Route::get('nuevo', [
	    'uses' => 'Clinicas\SisClinicaController@create',
	    'middleware' => ['permission:clinica-crear']
	])->name('clinica.nuevo');
	Route::post('crear', [
	    'uses' => 'Clinicas\SisClinicaController@store',
	    'middleware' => ['permission:clinica-crear']
	])->name('clinica.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Clinicas\SisClinicaController@edit',
	    'middleware' => ['permission:clinica-editar']
	])->name('clinica.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Clinicas\SisClinicaController@update',
	    'middleware' => ['permission:clinica-editar']
	])->name('clinica.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Clinicas\SisClinicaController@show',
	    'middleware' => ['permission:clinica-leer']
	])->name('clinica.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Clinicas\SisClinicaController@destroy',
	    'middleware' => ['permission:clinica-borrar']
	])->name('clinica.borrar');

	Route::get('dv', [
	    'uses' => 'Clinicas\SisClinicaController@dv',
	])->name('clinica.dv');
	require_once('web_cmedicame.php');
	require_once('web_paciente.php');
	require_once('web_crango.php');

	require_once('web_remision.php');
});