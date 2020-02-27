<?php
Route::group(['prefix' => '/{clinica}'], function () {
    Route::get('paciente', [
	    'uses' => 'Clinicas\CpacienteController@index',
	    'middleware' => ['permission:cpaciente-leer|cpaciente-crear|cpaciente-editar|cpaciente-borrar']
	])->name('cpaciente');
	Route::get('nuevo', [
	    'uses' => 'Clinicas\CpacienteController@create',
	    'middleware' => ['permission:cpaciente-crear']
	])->name('cpaciente.nuevo');
	Route::post('crear', [
	    'uses' => 'Clinicas\CpacienteController@store',
	    'middleware' => ['permission:cpaciente-crear']
	])->name('cpaciente.crear');
	Route::get('editar/{objetoxx}', [
	    'uses' => 'Clinicas\CpacienteController@edit',
	    'middleware' => ['permission:cpaciente-editar']
	])->name('cpaciente.editar');
	Route::put('editar/{objetoxx}', [
	    'uses' => 'Clinicas\CpacienteController@update',
	    'middleware' => ['permission:cpaciente-editar']
	])->name('cpaciente.editar');
	Route::get('ver/{objetoxx}', [
	    'uses' => 'Clinicas\CpacienteController@show',
	    'middleware' => ['permission:cpaciente-leer']
	])->name('cpaciente.ver');
	Route::delete('borrar/{objetoxx}', [
	    'uses' => 'Clinicas\CpacienteController@destroy',
	    'middleware' => ['permission:cpaciente-borrar']
	])->name('cpaciente.borrar');
});