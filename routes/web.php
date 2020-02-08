<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {
  // Permisos para el modulo de roles
  Route::post('roles/store', 'RoleController@store') // ruta 
          ->name('roles.store')// nombre de la ruta
          ->middleware('permission:roles.create'); // permiso

  Route::get('roles', 'RoleController@index') // ruta 
          ->name('roles.index')// nombre de la ruta
          ->middleware('permission:roles.index'); // permiso

  Route::get('roles/create', 'RoleController@create') // ruta 
          ->name('roles.create')// nombre de la ruta
          ->middleware('permission:roles.create'); // permiso

  Route::get('roles/getdata', 'RoleController@getdata') // ruta 
          ->name('roles.getdata'); // permiso

  Route::put('roles/{role}', 'RoleController@update') // ruta 
          ->name('roles.update')// nombre de la ruta
          ->middleware('permission:roles.edit'); // permiso

  Route::get('roles/{role}', 'RoleController@show') // ruta 
          ->name('roles.show')// nombre de la ruta
          ->middleware('permission:roles.show'); // permiso

  Route::get('roles/{role}/edit', 'RoleController@edit') // ruta 
          ->name('roles.edit')// nombre de la ruta
          ->middleware('permission:roles.edit'); // permiso
  // Permisos para modulo de pacientes
  Route::post('pacientes/store', 'PacientesController@store') // ruta 
          ->name('pacientes.store')// nombre de la ruta
          ->middleware('permission:pacientes.create'); // permiso

  Route::post('pacientes/calcularedad', 'PacientesController@calcularedad'); // ruta 
  // permiso

  Route::get('pacientes', 'PacientesController@index') // ruta 
          ->name('pacientes.index')// nombre de la ruta
          ->middleware('permission:pacientes.index'); // permiso

  Route::get('pacientes/create', 'PacientesController@create') // ruta 
          ->name('pacientes.create')// nombre de la ruta
          ->middleware('permission:pacientes.create'); // permiso

  Route::get('pacientes/clinicaspaciente', 'PacientesController@clinicaspaciente') // ruta 
          ->name('pacientes.clinicaspaciente');

  Route::get('pacientes/getclinicas', 'PacientesController@getclinicas') // ruta 
          ->name('pacientes.getclinicas');

  Route::post('pacientes/asignaclinica', 'PacientesController@asignaclinica') // ruta 
          ->name('pacientes.asignaclinica');


  Route::get('pacientes/getdata', 'PacientesController@getdata') // ruta 
          ->name('pacientes.getdata'); // permiso

  Route::get('pacientes/{id}/munici', 'PacientesController@munici') // ruta 
          ->name('pacientes.munici'); // permiso

  Route::put('pacientes/{paciente}', 'PacientesController@update') // ruta 
          ->name('pacientes.update')// nombre de la ruta
          ->middleware('permission:pacientes.edit'); // permiso

  Route::get('pacientes/{paciente}', 'PacientesController@show') // ruta 
          ->name('pacientes.show')// nombre de la ruta
          ->middleware('permission:pacientes.show'); // permiso

  Route::get('pacientes/{paciente}/edit', 'PacientesController@edit') // ruta 
          ->name('pacientes.edit')// nombre de la ruta
          ->middleware('permission:pacientes.edit'); // permiso
  // Permisos para modulo asignacion de clinicas a pacientes

  Route::get('pacienteclinicas', 'PacienteClinicaController@index') // ruta 
          ->name('pacienteclinicas.index')// nombre de la ruta
          ->middleware('permission:pacienteclinicas.index'); // permiso

  Route::get('pacienteclinicas/getdata', 'PacienteClinicaController@getdata') // ruta 
          ->name('pacienteclinicas.getdata'); // permiso

  Route::put('pacienteclinicas/{paciente}', 'PacienteClinicaController@update') // ruta 
          ->name('pacienteclinicas.update')// nombre de la ruta
          ->middleware('permission:pacienteclinicas.edit'); // permiso

  Route::get('pacienteclinicas/{paciente}/edit', 'PacienteClinicaController@edit') // ruta 
          ->name('pacienteclinicas.edit')// nombre de la ruta
          ->middleware('permission:pacienteclinicas.edit'); // permiso
        
   Route::get('pacienteclinicas/{paciente}', 'PacienteClinicaController@show') // ruta 
          ->name('pacienteclinicas.show')// nombre de la ruta
          ->middleware('permission:pacienteclinicas.show'); // permiso
      
  // Permisos para modulo de users
  Route::post('users/store', 'UsersController@store') // ruta 
          ->name('users.store')// nombre de la ruta
          ->middleware('permission:users.create'); // permiso

  Route::get('users/getdata', 'UsersController@getdata') // ruta 
          ->name('users.getdata'); // permiso  

  Route::get('users', 'UsersController@index') // ruta 
          ->name('users.index')// nombre de la ruta
          ->middleware('permission:users.index'); // permiso

  Route::get('users/create', 'UsersController@create') // ruta 
          ->name('users.create')// nombre de la ruta
          ->middleware('permission:users.create'); // permiso

  Route::put('users/{user}', 'UsersController@update') // ruta 
          ->name('users.update')// nombre de la ruta
          ->middleware('permission:users.edit'); // permiso

  Route::get('users/{user}', 'UsersController@show') // ruta 
          ->name('users.show')// nombre de la ruta
          ->middleware('permission:users.show'); // permiso

  Route::get('users/{user}/edit', 'UsersController@edit') // ruta 
          ->name('users.edit')// nombre de la ruta
          ->middleware('permission:users.edit'); // permiso
  // Permisos para modulo de users

  Route::get('permisos', 'PermisoController@index') // ruta 
          ->name('permisos.index')// nombre de la ruta
          ->middleware('permission:permisos.index'); // permiso

  Route::get('permisos/create', 'PermisoController@create') // ruta 
          ->name('permisos.create')// nombre de la ruta
          ->middleware('permission:permisos.create'); // permiso

  Route::get('permisos/getdata', 'PermisoController@getdata') // ruta 
          ->name('permisos.getdata'); // permiso  

  Route::post('permisos/store', 'PermisoController@store') // ruta 
          ->name('permisos.store')// nombre de la ruta
          ->middleware('permission:permisos.create'); // permiso

  Route::get('permisos/{permission}/edit', 'PermisoController@edit') // ruta 
          ->name('permisos.edit')// nombre de la ruta
          ->middleware('permission:permisos.edit'); // permiso

  Route::get('permisos/{permission}', 'PermisoController@show') // ruta 
          ->name('permisos.show')// nombre de la ruta
          ->middleware('permission:permisos.show'); // permiso

  Route::put('permisos/{permission}', 'PermisoController@update') // ruta 
          ->name('permisos.update')// nombre de la ruta
          ->middleware('permission:permisos.edit'); // permiso
  // Permisos para modulo de eps
  Route::post('eps/store', 'EpsController@store') // ruta 
          ->name('eps.store')// nombre de la ruta
          ->middleware('permission:eps.create'); // permiso

  Route::get('eps/getdata', 'EpsController@getdata') // ruta 
          ->name('eps.getdata'); // permiso  

  Route::get('eps', 'EpsController@index') // ruta 
          ->name('eps.index')// nombre de la ruta
          ->middleware('permission:eps.index'); // permiso

  Route::get('eps/create', 'EpsController@create') // ruta 
          ->name('eps.create')// nombre de la ruta
          ->middleware('permission:eps.create'); // permiso

  Route::put('eps/{eps}', 'EpsController@update') // ruta 
          ->name('eps.update')// nombre de la ruta
          ->middleware('permission:eps.edit'); // permiso

  Route::get('eps/{eps}', 'EpsController@show') // ruta 
          ->name('eps.show')// nombre de la ruta
          ->middleware('permission:eps.show'); // permiso

  Route::get('eps/{eps}/edit', 'EpsController@edit') // ruta 
          ->name('eps.edit')// nombre de la ruta
          ->middleware('permission:eps.edit'); // permiso
  // Permisos para modulo de servicios
  Route::post('servicios/store', 'ServicioController@store') // ruta 
          ->name('servicios.store')// nombre de la ruta
          ->middleware('permission:servicios.create'); // permiso

  Route::get('servicios/getdata', 'ServicioController@getdata') // ruta 
          ->name('servicios.getdata'); // permiso  

  Route::get('servicios', 'ServicioController@index') // ruta 
          ->name('servicios.index')// nombre de la ruta
          ->middleware('permission:servicios.index'); // permiso

  Route::get('servicios/create', 'ServicioController@create') // ruta 
          ->name('servicios.create')// nombre de la ruta
          ->middleware('permission:servicios.create'); // permiso

  Route::put('servicios/{servicio}', 'ServicioController@update') // ruta 
          ->name('servicios.update')// nombre de la ruta
          ->middleware('permission:servicios.edit'); // permiso

  Route::get('servicios/{servicio}', 'ServicioController@show') // ruta 
          ->name('servicios.show')// nombre de la ruta
          ->middleware('permission:servicios.show'); // permiso

  Route::get('servicios/{servicio}/edit', 'ServicioController@edit') // ruta 
          ->name('servicios.edit')// nombre de la ruta
          ->middleware('permission:servicios.edit'); // permiso
  // Permisos para modulo de generos
  Route::post('generos/store', 'GeneroController@store') // ruta 
          ->name('generos.store')// nombre de la ruta
          ->middleware('permission:generos.create'); // permiso

  Route::get('generos/getdata', 'GeneroController@getdata') // ruta 
          ->name('generos.getdata'); // permiso  

  Route::get('generos', 'GeneroController@index') // ruta 
          ->name('generos.index')// nombre de la ruta
          ->middleware('permission:generos.index'); // permiso

  Route::get('generos/create', 'GeneroController@create') // ruta 
          ->name('generos.create')// nombre de la ruta
          ->middleware('permission:generos.create'); // permiso

  Route::put('generos/{genero}', 'GeneroController@update') // ruta 
          ->name('generos.update')// nombre de la ruta
          ->middleware('permission:generos.edit'); // permiso

  Route::get('generos/{genero}', 'GeneroController@show') // ruta 
          ->name('generos.show')// nombre de la ruta
          ->middleware('permission:generos.show'); // permiso

  Route::get('generos/{genero}/edit', 'GeneroController@edit') // ruta 
          ->name('generos.edit')// nombre de la ruta
          ->middleware('permission:generos.edit'); // permiso
  // Permisos para modulo de generos
  Route::post('clinicas/store', 'ClinicaController@store') // ruta 
          ->name('clinicas.store')// nombre de la ruta
          ->middleware('permission:clinicas.create'); // permiso

  Route::get('clinicas/getdata', 'ClinicaController@getdata') // ruta 
          ->name('clinicas.getdata'); // permiso  

  Route::get('clinicas', 'ClinicaController@index') // ruta 
          ->name('clinicas.index')// nombre de la ruta
          ->middleware('permission:clinicas.index'); // permiso

  Route::get('clinicas/create', 'ClinicaController@create') // ruta 
          ->name('clinicas.create')// nombre de la ruta
          ->middleware('permission:clinicas.create'); // permiso

  Route::put('clinicas/{clinica}', 'ClinicaController@update') // ruta 
          ->name('clinicas.update')// nombre de la ruta
          ->middleware('permission:clinicas.edit'); // permiso

  Route::get('clinicas/{clinica}', 'ClinicaController@show') // ruta 
          ->name('clinicas.show')// nombre de la ruta
          ->middleware('permission:clinicas.show'); // permiso

  Route::get('clinicas/{clinica}/edit', 'ClinicaController@edit') // ruta 
          ->name('clinicas.edit')// nombre de la ruta
          ->middleware('permission:clinicas.edit'); // permiso  

  Route::post('clinicas/dv', 'ClinicaController@dv'); // ruta 
  // Permisos para modulo de npt
  Route::post('npt/store', 'NptController@store') // ruta 
          ->name('npt.store')// nombre de la ruta
          ->middleware('permission:npt.create'); // permiso

  Route::get('npt/getdata', 'NptController@getdata') // ruta 
          ->name('npt.getdata'); // permiso  

  Route::get('npt', 'NptController@index') // ruta 
          ->name('npt.index')// nombre de la ruta
          ->middleware('permission:npt.index'); // permiso

  Route::get('npt/create/{paciente}/{clinica}', 'NptController@create') // ruta 
          ->name('npt.create')// nombre de la ruta
          ->middleware('permission:npt.create'); // permiso

  Route::put('npt/{formulacione}', 'NptController@update') // ruta 
          ->name('npt.update')// nombre de la ruta
          ->middleware('permission:npt.edit'); // permiso

  Route::get('npt/{formulacione}', 'NptController@show') // ruta 
          ->name('npt.show')// nombre de la ruta
          ->middleware('permission:npt.show'); // permiso



  Route::post('npt/volumen', 'NptController@volumenajax') // ruta 
  // nombre de la ruta
  ; // permiso 

  Route::get('npt/{formulacione}/edit', 'NptController@edit') // ruta 
          ->name('npt.edit')// nombre de la ruta
          ->middleware('permission:npt.edit'); // permiso<?php
  // Permisos para medicamentos


  Route::post('medicamentos/store', 'MedicamentoController@store') // ruta 
          ->name('medicamentos.store')// nombre de la ruta
          ->middleware('permission:medicamentos.create'); // permiso

  Route::get('medicamentos/getdata', 'MedicamentoController@getdata') // ruta 
          ->name('medicamentos.getdata'); // permiso  

  Route::get('medicamentos', 'MedicamentoController@index') // ruta 
          ->name('medicamentos.index')// nombre de la ruta
          ->middleware('permission:medicamentos.index'); // permiso

  Route::get('medicamentos/create', 'MedicamentoController@create') // ruta 
          ->name('medicamentos.create')// nombre de la ruta
          ->middleware('permission:medicamentos.create'); // permiso

  Route::put('medicamentos/{medicamento}', 'MedicamentoController@update') // ruta 
          ->name('medicamentos.update')// nombre de la ruta
          ->middleware('permission:medicamentos.edit'); // permiso

  Route::get('medicamentos/{medicamento}', 'MedicamentoController@show') // ruta 
          ->name('medicamentos.show')// nombre de la ruta
          ->middleware('permission:medicamentos.show'); // permiso

  Route::get('medicamentos/{medicamento}/edit', 'MedicamentoController@edit') // ruta 
          ->name('medicamentos.edit')// nombre de la ruta
          ->middleware('permission:medicamentos.edit'); // permiso
  // Permisos para medicamentos npts


  Route::post('medicamentonpts/store', 'MedicamentonptController@store') // ruta 
          ->name('medicamentonpts.store')// nombre de la ruta
          ->middleware('permission:medicamentonpts.create'); // permiso

  Route::post('medicamentonpts/rangos', 'MedicamentonptController@rangos'); // permiso

  Route::get('medicamentonpts/getdata', 'MedicamentonptController@getdata') // ruta 
          ->name('medicamentonpts.getdata'); // permiso  

  Route::get('medicamentonpts', 'MedicamentonptController@index') // ruta 
          ->name('medicamentonpts.index')// nombre de la ruta
          ->middleware('permission:medicamentonpts.index'); // permiso

  Route::get('medicamentonpts/create', 'MedicamentonptController@create') // ruta 
          ->name('medicamentonpts.create')// nombre de la ruta
          ->middleware('permission:medicamentonpts.create'); // permiso

  Route::put('medicamentonpts/{medicamentonpt}', 'MedicamentonptController@update') // ruta 
          ->name('medicamentonpts.update')// nombre de la ruta
          ->middleware('permission:medicamentonpts.edit'); // permiso

  Route::get('medicamentonpts/{medicamentonpt}', 'MedicamentonptController@show') // ruta 
          ->name('medicamentonpts.show')// nombre de la ruta
          ->middleware('permission:medicamentonpts.show'); // permiso

  Route::get('medicamentonpts/{medicamentonpt}/edit', 'MedicamentonptController@edit') // ruta 
          ->name('medicamentonpts.edit')// nombre de la ruta
          ->middleware('permission:medicamentonpts.edit'); // permiso
  // Permisos para dispositivos


  Route::post('dispositivos/store', 'DispositivoController@store') // ruta 
          ->name('dispositivos.store')// nombre de la ruta
          ->middleware('permission:dispositivos.create'); // permiso

  Route::get('dispositivos/getdata', 'DispositivoController@getdata') // ruta 
          ->name('dispositivos.getdata'); // permiso  

  Route::get('dispositivos', 'DispositivoController@index') // ruta 
          ->name('dispositivos.index')// nombre de la ruta
          ->middleware('permission:dispositivos.index'); // permiso

  Route::get('dispositivos/create', 'DispositivoController@create') // ruta 
          ->name('dispositivos.create')// nombre de la ruta
          ->middleware('permission:dispositivos.create'); // permiso

  Route::put('dispositivos/{dispmedico}', 'DispositivoController@update') // ruta 
          ->name('dispositivos.update')// nombre de la ruta
          ->middleware('permission:dispositivos.edit'); // permiso

  Route::get('dispositivos/{dispmedico}', 'DispositivoController@show') // ruta 
          ->name('dispositivos.show')// nombre de la ruta
          ->middleware('permission:dispositivos.show'); // permiso

  Route::get('dispositivos/{dispmedico}/edit', 'DispositivoController@edit') // ruta 
          ->name('dispositivos.edit')// nombre de la ruta
          ->middleware('permission:dispositivos.edit'); // permiso
  // Permisos para casas
  Route::post('casas/store', 'CasaController@store') // ruta 
          ->name('casas.store')// nombre de la ruta
          ->middleware('permission:casas.create'); // permiso

  Route::get('casas/getdata', 'CasaController@getdata') // ruta 
          ->name('casas.getdata'); // permiso  

  Route::get('casas', 'CasaController@index') // ruta 
          ->name('casas.index')// nombre de la ruta
          ->middleware('permission:casas.index'); // permiso

  Route::get('casas/create', 'CasaController@create') // ruta 
          ->name('casas.create')// nombre de la ruta
          ->middleware('permission:casas.create'); // permiso

  Route::put('casas/{casa}', 'CasaController@update') // ruta 
          ->name('casas.update')// nombre de la ruta
          ->middleware('permission:casas.edit'); // permiso

  Route::get('casas/{casa}', 'CasaController@show') // ruta 
          ->name('casas.show')// nombre de la ruta
          ->middleware('permission:casas.show'); // permiso

  Route::get('casas/{casa}/edit', 'CasaController@edit') // ruta 
          ->name('casas.edit')// nombre de la ruta
          ->middleware('permission:casas.edit'); // permiso
  // Permisos para reportes
  Route::post('reportes/store', 'ReporteController@store') // ruta 
          ->name('reportes.store')// nombre de la ruta
          ->middleware('permission:reportes.create'); // permiso

  Route::get('reportes', 'ReporteController@index') // ruta 
          ->name('reportes.index')// nombre de la ruta
          ->middleware('permission:reportes.index'); // permiso

  Route::get('reportes/create', 'ReporteController@create') // ruta 
          ->name('reportes.create')// nombre de la ruta
          ->middleware('permission:reportes.create'); // permiso

  Route::get('reportes/getdata', 'ReporteController@getdata') // ruta 
          ->name('reportes.getdata'); // permiso

  Route::get('reportes/{id}/munici', 'ReporteController@munici') // ruta 
          ->name('reportes.munici'); // permiso

  Route::put('reportes/{formulacione}', 'ReporteController@update') // ruta 
          ->name('reportes.update')// nombre de la ruta
          ->middleware('permission:reportes.edit'); // permiso

  Route::get('reportes/{formulacione}', 'ReporteController@show') // ruta 
          ->name('reportes.show')// nombre de la ruta
          ->middleware('permission:reportes.show'); // permiso

  Route::get('reportes/ordenes/{ordene}', 'ReporteController@ordenes') // ruta 
          ->name('reportes.ordenes')// nombre de la ruta
          ->middleware('permission:reportes.ordenes'); // permiso

  Route::get('reportes/controles/{ordene}', 'ReporteController@controles') // ruta 
          ->name('reportes.controles')// nombre de la ruta
          ->middleware('permission:reportes.controles'); // permiso

  Route::get('reportes/etiqueta/{formulacione}/{tipo}', 'ReporteController@etiqueta') // ruta 
          ->name('reportes.etiqueta')// nombre de la ruta
          ->middleware('permission:reportes.etiqueta'); // permiso

  Route::get('reportes/remision/{remisione}', 'ReporteController@remision') // ruta 
          ->name('reportes.remision')// nombre de la ruta
          ->middleware('permission:reportes.remision'); // permiso

  Route::get('reportes/{formulacione}/edit', 'ReporteController@edit') // ruta 
          ->name('reportes.edit')// nombre de la ruta
          ->middleware('permission:reportes.edit'); // permiso
  // rutas para las dipensaciones

  Route::post('dispensaciones/store', 'DispensacionController@store') // ruta 
          ->name('dispensaciones.store')// nombre de la ruta
          ->middleware('permission:dispensaciones.create'); // permiso

  Route::get('dispensaciones/dispensacion', 'DispensacionController@dispensacion') // ruta 
//          ->name('dispensaciones.store')// nombre de la ruta
//          ->middleware('permission:dispensaciones.create')
  ; // permiso

  Route::get('dispensaciones', 'DispensacionController@index') // ruta 
          ->name('dispensaciones.index')// nombre de la ruta
          ->middleware('permission:dispensaciones.index'); // permiso

  Route::get('dispensaciones/create', 'DispensacionController@create') // ruta 
          ->name('dispensaciones.create')// nombre de la ruta
          ->middleware('permission:dispensaciones.create'); // permiso

  Route::get('dispensaciones/getdata', 'DispensacionController@getdata') // ruta 
          ->name('dispensaciones.getdata'); // permiso

  Route::put('dispensaciones/{cabecera}', 'DispensacionController@update') // ruta 
          ->name('dispensaciones.update')// nombre de la ruta
          ->middleware('permission:dispensaciones.edit'); // permiso

  Route::get('dispensaciones/{cabecera}', 'DispensacionController@show') // ruta 
          ->name('dispensaciones.show')// nombre de la ruta
          ->middleware('permission:dispensaciones.show'); // permiso

  Route::get('dispensaciones/alistamiento/{cabecera}/{tipo}', 'DispensacionController@alistamiento') // ruta 
          ->name('dispensaciones.alistamiento'); // nombre de la ruta
  // ->middleware('permission:dispensaciones.alistamiento'); // permiso

  Route::get('dispensaciones/{cabecera}/edit', 'DispensacionController@edit') // ruta 
          ->name('dispensaciones.edit')// nombre de la ruta
          ->middleware('permission:dispensaciones.edit'); // permiso

  Route::post('dispensaciones/esnumerico', 'DispensacionController@esnumerico') // ruta 
  ;

  // permisos para las preparaciones
  Route::post('preparaciones/store', 'PreparacionController@store') // ruta 
          ->name('preparaciones.store')// nombre de la ruta
          ->middleware('permission:preparaciones.create'); // permiso

  Route::get('preparaciones/getdata', 'PreparacionController@getdata') // ruta 
          ->name('preparaciones.getdata'); // permiso  

  Route::get('preparaciones', 'PreparacionController@index') // ruta 
          ->name('preparaciones.index')// nombre de la ruta
          ->middleware('permission:preparaciones.index'); // permiso

  Route::get('preparaciones/create/{paciente}', 'PreparacionController@create') // ruta 
          ->name('preparaciones.create')// nombre de la ruta
          ->middleware('permission:preparaciones.create'); // permiso

  Route::put('preparaciones/{formulacione}', 'PreparacionController@update') // ruta 
          ->name('preparaciones.update')// nombre de la ruta
          ->middleware('permission:preparaciones.edit'); // permiso

  Route::get('preparaciones/{formulacione}', 'PreparacionController@show') // ruta 
          ->name('preparaciones.show')// nombre de la ruta
          ->middleware('permission:preparaciones.show'); // permiso

  Route::post('preparaciones/volumen', 'PreparacionController@volumenajax') // ruta 
  // nombre de la ruta
  ; // permiso 

  Route::get('preparaciones/{formulacione}/edit', 'PreparacionController@edit') // ruta 
          ->name('preparaciones.edit')// nombre de la ruta
          ->middleware('permission:preparaciones.edit'); // permiso
//  premisos para los procesos

  Route::post('procesos/store', 'ProcesoController@store') // ruta 
          ->name('procesos.store')// nombre de la ruta
          ->middleware('permission:procesos.create'); // permiso

  Route::get('procesos', 'ProcesoController@index') // ruta 
          ->name('procesos.index')// nombre de la ruta
          ->middleware('permission:procesos.index'); // permiso

  Route::get('procesos/create', 'ProcesoController@create') // ruta 
          ->name('procesos.create')// nombre de la ruta
          ->middleware('permission:procesos.create'); // permiso

  Route::get('procesos/getdata', 'ProcesoController@getdata') // ruta 
          ->name('procesos.getdata'); // permiso

  Route::put('procesos/{proceso}', 'ProcesoController@update') // ruta 
          ->name('procesos.update')// nombre de la ruta
          ->middleware('permission:procesos.edit'); // permiso

  Route::get('procesos/{proceso}', 'ProcesoController@show') // ruta 
          ->name('procesos.show')// nombre de la ruta
          ->middleware('permission:procesos.show'); // permiso

  Route::get('procesos/{proceso}/edit', 'ProcesoController@edit') // ruta 
          ->name('procesos.edit')// nombre de la ruta
          ->middleware('permission:procesos.edit'); // permiso
  // permisos para terminados


  Route::post('terminados/store', 'TerminadoController@store') // ruta 
          ->name('terminados.store')// nombre de la ruta
          ->middleware('permission:terminados.create'); // permiso

  Route::post('terminados/pesoteorico', 'TerminadoController@pesoteorico');

  Route::get('terminados', 'TerminadoController@index') // ruta 
          ->name('terminados.index')// nombre de la ruta
          ->middleware('permission:terminados.index'); // permiso

  Route::get('terminados/create', 'TerminadoController@create') // ruta 
          ->name('terminados.create')// nombre de la ruta
          ->middleware('permission:terminados.create'); // permiso

  Route::get('terminados/getdata', 'TerminadoController@getdata') // ruta 
          ->name('terminados.getdata'); // permiso

  Route::put('terminados/{terminado}', 'TerminadoController@update') // ruta 
          ->name('terminados.update')// nombre de la ruta
          ->middleware('permission:terminados.edit'); // permiso

  Route::get('terminados/{terminado}', 'TerminadoController@show') // ruta 
          ->name('terminados.show')// nombre de la ruta
          ->middleware('permission:terminados.show'); // permiso

  Route::get('terminados/{terminado}/edit', 'TerminadoController@edit') // ruta 
          ->name('terminados.edit')// nombre de la ruta
          ->middleware('permission:terminados.edit'); // permiso
//permisos para las conciliaciones

  Route::post('conciliaciones/store', 'ConciliacionController@store') // ruta 
          ->name('conciliaciones.store')// nombre de la ruta
          ->middleware('permission:conciliaciones.create'); // permiso

  Route::get('conciliaciones', 'ConciliacionController@index') // ruta 
          ->name('conciliaciones.index')// nombre de la ruta
          ->middleware('permission:conciliaciones.index'); // permiso

  Route::get('conciliaciones/create', 'ConciliacionController@create') // ruta 
          ->name('conciliaciones.create')// nombre de la ruta
          ->middleware('permission:conciliaciones.create'); // permiso

  Route::get('conciliaciones/getdata', 'ConciliacionController@getdata') // ruta 
          ->name('conciliaciones.getdata'); // permiso

  Route::put('conciliaciones/{cabecera}', 'ConciliacionController@update') // ruta 
          ->name('conciliaciones.update')// nombre de la ruta
          ->middleware('permission:conciliaciones.edit'); // permiso

  Route::get('conciliaciones/{cabecera}', 'ConciliacionController@show') // ruta 
          ->name('conciliaciones.show')// nombre de la ruta
          ->middleware('permission:conciliaciones.show'); // permiso

  Route::get('conciliaciones/conciliacion/{cabecera}/{tipo}', 'ConciliacionController@conciliacion') // ruta 
          ->name('conciliaciones.conciliacion')// nombre de la ruta
          ->middleware('permission:conciliaciones.conciliacion'); // permiso

  Route::get('conciliaciones/{cabecera}/edit', 'ConciliacionController@edit') // ruta 
          ->name('conciliaciones.edit')// nombre de la ruta
          ->middleware('permission:conciliaciones.edit'); // permiso

  Route::post('conciliaciones/esnumerico', 'ConciliacionController@esnumerico'); // ruta 

// permisos para las órdenes
  Route::post('ordenes/store', 'OrdenController@store') // ruta 
          ->name('ordenes.store')// nombre de la ruta
          ->middleware('permission:ordenes.create'); // permiso

  Route::get('ordenes', 'OrdenController@index') // ruta 
          ->name('ordenes.index')// nombre de la ruta
          ->middleware('permission:ordenes.index'); // permiso

  Route::get('ordenes/getdata', 'OrdenController@getdata') // ruta 
          ->name('ordenes.getdata'); // permiso

  Route::get('ordenes/create', 'OrdenController@create') // ruta 
          ->name('ordenes.create')// nombre de la ruta
          ->middleware('permission:ordenes.create'); // permiso

  Route::get('ordenes/orden/{ordene}/{tipo}', 'OrdenController@conciliacion') // ruta 
          ->name('ordenes.orden')// nombre de la ruta
          ->middleware('permission:ordenes.orden'); // permiso

  Route::put('ordenes/{ordene}', 'OrdenController@update') // ruta 
          ->name('ordenes.update')// nombre de la ruta
          ->middleware('permission:ordenes.edit'); // permiso

  Route::get('ordenes/{ordene}', 'OrdenController@show') // ruta 
          ->name('ordenes.show')// nombre de la ruta
          ->middleware('permission:ordenes.show'); // permiso

  Route::get('ordenes/{ordene}/edit', 'OrdenController@edit') // ruta 
          ->name('ordenes.edit')// nombre de la ruta
          ->middleware('permission:ordenes.edit'); // permiso
// permisos para los controles
  Route::post('controles/store', 'ControlController@store') // ruta 
          ->name('controles.store')// nombre de la ruta
          ->middleware('permission:controles.create'); // permiso

  Route::get('controles', 'ControlController@index') // ruta 
          ->name('controles.index')// nombre de la ruta
          ->middleware('permission:controles.index'); // permiso

  Route::get('controles/getdata', 'ControlController@getdata') // ruta 
          ->name('controles.getdata'); // permiso

  Route::get('controles/create', 'ControlController@create') // ruta 
          ->name('controles.create')// nombre de la ruta
          ->middleware('permission:controles.create'); // permiso

  Route::put('controles/{ordene}', 'ControlController@update') // ruta 
          ->name('controles.update')// nombre de la ruta
          ->middleware('permission:controles.edit'); // permiso

  Route::get('controles/{ordene}', 'ControlController@show') // ruta 
          ->name('controles.show')// nombre de la ruta
          ->middleware('permission:controles.show'); // permiso

  Route::get('controles/{ordene}/edit', 'ControlController@edit') // ruta 
          ->name('controles.edit')// nombre de la ruta
          ->middleware('permission:controles.edit'); // permiso
  //
// permisos para las marcas para medicamentos
  Route::post('marcas/store', 'MarcaController@store') // ruta 
          ->name('marcas.store')// nombre de la ruta
          ->middleware('permission:marcas.create'); // permiso

  Route::get('marcas', 'MarcaController@index') // ruta 
          ->name('marcas.index')// nombre de la ruta
          ->middleware('permission:marcas.index'); // permiso

  Route::get('marcas/getdata', 'MarcaController@getdata') // ruta 
          ->name('marcas.getdata'); // permiso

  Route::get('marcas/create', 'MarcaController@create') // ruta 
          ->name('marcas.create')// nombre de la ruta
          ->middleware('permission:marcas.create'); // permiso

  Route::put('marcas/{marca}', 'MarcaController@update') // ruta 
          ->name('marcas.update')// nombre de la ruta
          ->middleware('permission:marcas.edit'); // permiso

  Route::get('marcas/{marca}', 'MarcaController@show') // ruta 
          ->name('marcas.show')// nombre de la ruta
          ->middleware('permission:marcas.show'); // permiso

  Route::get('marcas/{marca}/edit', 'MarcaController@edit') // ruta 
          ->name('marcas.edit')// nombre de la ruta
          ->middleware('permission:marcas.edit'); // permiso
// permisos para las marcas para dipositivos medicos
  Route::post('dmarcas/store', 'DmarcaController@store') // ruta 
          ->name('dmarcas.store')// nombre de la ruta
          ->middleware('permission:dmarcas.create'); // permiso

  Route::get('dmarcas', 'DmarcaController@index') // ruta 
          ->name('dmarcas.index')// nombre de la ruta
          ->middleware('permission:dmarcas.index'); // permiso

  Route::get('dmarcas/getdata', 'DmarcaController@getdata') // ruta 
          ->name('dmarcas.getdata'); // permiso

  Route::get('dmarcas/create', 'DmarcaController@create') // ruta 
          ->name('dmarcas.create')// nombre de la ruta
          ->middleware('permission:dmarcas.create'); // permiso

  Route::put('dmarcas/{dmarca}', 'DmarcaController@update') // ruta 
          ->name('dmarcas.update')// nombre de la ruta
          ->middleware('permission:dmarcas.edit'); // permiso

  Route::get('dmarcas/{dmarca}', 'DmarcaController@show') // ruta 
          ->name('dmarcas.show')// nombre de la ruta
          ->middleware('permission:dmarcas.show'); // permiso

  Route::get('dmarcas/{dmarca}/edit', 'DmarcaController@edit') // ruta 
          ->name('dmarcas.edit')// nombre de la ruta
          ->middleware('permission:dmarcas.edit'); // permiso
// permisos para los registros invimas para los medicamentos
  Route::post('invimas/store', 'MinvimaController@store') // ruta 
          ->name('invimas.store')// nombre de la ruta
          ->middleware('permission:invimas.create'); // permiso
  Route::post('invimas/marcas', 'MinvimaController@marcas'); // ruta 
  // nombre de la ruta
  // permiso

  Route::get('invimas', 'MinvimaController@index') // ruta 
          ->name('invimas.index')// nombre de la ruta
          ->middleware('permission:invimas.index'); // permiso

  Route::get('invimas/getdata', 'MinvimaController@getdata') // ruta 
          ->name('invimas.getdata'); // permiso

  Route::get('invimas/create', 'MinvimaController@create') // ruta 
          ->name('invimas.create')// nombre de la ruta
          ->middleware('permission:invimas.create'); // permiso

  Route::put('invimas/{minvima}', 'MinvimaController@update') // ruta 
          ->name('invimas.update')// nombre de la ruta
          ->middleware('permission:invimas.edit'); // permiso

  Route::get('invimas/{minvima}', 'MinvimaController@show') // ruta 
          ->name('invimas.show')// nombre de la ruta
          ->middleware('permission:invimas.show'); // permiso

  Route::get('invimas/{minvima}/edit', 'MinvimaController@edit') // ruta 
          ->name('invimas.edit')// nombre de la ruta
          ->middleware('permission:invimas.edit'); // permiso
// permisos para los registros dinvimas para los dispositivos medicos
  Route::post('dinvimas/store', 'DinvimaController@store') // ruta 
          ->name('dinvimas.store')// nombre de la ruta
          ->middleware('permission:dinvimas.create'); // permiso
  Route::post('dinvimas/marcas', 'DinvimaController@marcas'); // ruta 
  Route::get('dinvimas', 'DinvimaController@index') // ruta 
          ->name('dinvimas.index')// nombre de la ruta
          ->middleware('permission:dinvimas.index'); // permiso

  Route::get('dinvimas/getdata', 'DinvimaController@getdata') // ruta 
          ->name('dinvimas.getdata'); // permiso

  Route::get('dinvimas/create', 'DinvimaController@create') // ruta 
          ->name('dinvimas.create')// nombre de la ruta
          ->middleware('permission:dinvimas.create'); // permiso

  Route::put('dinvimas/{dinvima}', 'DinvimaController@update') // ruta 
          ->name('dinvimas.update')// nombre de la ruta
          ->middleware('permission:dinvimas.edit'); // permiso

  Route::get('dinvimas/{dinvima}', 'DinvimaController@show') // ruta 
          ->name('dinvimas.show')// nombre de la ruta
          ->middleware('permission:dinvimas.show'); // permiso

  Route::get('dinvimas/{dinvima}/edit', 'DinvimaController@edit') // ruta 
          ->name('dinvimas.edit')// nombre de la ruta
          ->middleware('permission:dinvimas.edit'); // permiso
// permisos para los lotes de los medicamentos
  Route::post('lotes/store', 'MloteController@store') // ruta 
          ->name('lotes.store')// nombre de la ruta
          ->middleware('permission:lotes.create'); // permiso
  Route::post('lotes/invimas', 'MloteController@invimas'); // ruta 

  Route::get('lotes', 'MloteController@index') // ruta 
          ->name('lotes.index')// nombre de la ruta
          ->middleware('permission:lotes.index'); // permiso

  Route::get('lotes/getdata', 'MloteController@getdata') // ruta 
          ->name('lotes.getdata'); // permiso

  Route::get('lotes/create', 'MloteController@create') // ruta 
          ->name('lotes.create')// nombre de la ruta
          ->middleware('permission:lotes.create'); // permiso

  Route::put('lotes/{mlote}', 'MloteController@update') // ruta 
          ->name('lotes.update')// nombre de la ruta
          ->middleware('permission:lotes.edit'); // permiso

  Route::get('lotes/{mlote}', 'MloteController@show') // ruta 
          ->name('lotes.show')// nombre de la ruta
          ->middleware('permission:lotes.show'); // permiso

  Route::get('lotes/{mlote}/edit', 'MloteController@edit') // ruta 
          ->name('lotes.edit')// nombre de la ruta
          ->middleware('permission:lotes.edit'); // permiso
// permisos para los dlotes de los medicamentos
  Route::post('dlotes/store', 'DloteController@store') // ruta 
          ->name('dlotes.store')// nombre de la ruta
          ->middleware('permission:dlotes.create'); // permiso

  Route::post('dlotes/invimas', 'DloteController@invimas'); // ruta 

  Route::get('dlotes', 'DloteController@index') // ruta 
          ->name('dlotes.index')// nombre de la ruta
          ->middleware('permission:dlotes.index'); // permiso

  Route::get('dlotes/getdata', 'DloteController@getdata') // ruta 
          ->name('dlotes.getdata'); // permiso

  Route::get('dlotes/create', 'DloteController@create') // ruta 
          ->name('dlotes.create')// nombre de la ruta
          ->middleware('permission:dlotes.create'); // permiso

  Route::put('dlotes/{dlote}', 'DloteController@update') // ruta 
          ->name('dlotes.update')// nombre de la ruta
          ->middleware('permission:dlotes.edit'); // permiso

  Route::get('dlotes/{dlote}', 'DloteController@show') // ruta 
          ->name('dlotes.show')// nombre de la ruta
          ->middleware('permission:dlotes.show'); // permiso

  Route::get('dlotes/{dlote}/edit', 'DloteController@edit') // ruta 
          ->name('dlotes.edit')// nombre de la ruta
          ->middleware('permission:dlotes.edit'); // permiso


  Route::post('alertas/alertas', 'AlertaController@alertas'); // ruta 
  // Permisos para modulo de rangos
  Route::post('rangos/store', 'RangoController@store') // ruta 
          ->name('rangos.store')// nombre de la ruta
          ->middleware('permission:rangos.create'); // permiso

  Route::get('rangos/getdata', 'RangoController@getdata') // ruta 
          ->name('rangos.getdata'); // permiso  

  Route::get('rangos', 'RangoController@index') // ruta 
          ->name('rangos.index')// nombre de la ruta
          ->middleware('permission:rangos.index'); // permiso

  Route::get('rangos/create', 'RangoController@create') // ruta 
          ->name('rangos.create')// nombre de la ruta
          ->middleware('permission:rangos.create'); // permiso

  Route::put('rangos/{rango}', 'RangoController@update') // ruta 
          ->name('rangos.update')// nombre de la ruta
          ->middleware('permission:rangos.edit'); // permiso

  Route::get('rangos/{rango}', 'RangoController@show') // ruta 
          ->name('rangos.show')// nombre de la ruta
          ->middleware('permission:rangos.show'); // permiso

  Route::get('rangos/{rango}/edit', 'RangoController@edit') // ruta 
          ->name('rangos.edit')// nombre de la ruta
          ->middleware('permission:rangos.edit'); // permiso  
  // Permisos para modulo de clinicarangos
  Route::post('clinicarangos/store', 'ClinicaRangoController@store') // ruta 
          ->name('clinicarangos.store')// nombre de la ruta
          ->middleware('permission:clinicarangos.create'); // permiso

  Route::get('clinicarangos/getdata', 'ClinicaRangoController@getdata') // ruta 
          ->name('clinicarangos.getdata'); // permiso  

  Route::get('clinicarangos', 'ClinicaRangoController@index') // ruta 
          ->name('clinicarangos.index')// nombre de la ruta
          ->middleware('permission:clinicarangos.index'); // permiso

  Route::get('clinicarangos/create', 'ClinicaRangoController@create') // ruta 
          ->name('clinicarangos.create')// nombre de la ruta
          ->middleware('permission:clinicarangos.create'); // permiso

  Route::put('clinicarangos/{clinicarango}', 'ClinicaRangoController@update') // ruta 
          ->name('clinicarangos.update')// nombre de la ruta
          ->middleware('permission:clinicarangos.edit'); // permiso

  Route::get('clinicarangos/{clinicarango}', 'ClinicaRangoController@show') // ruta 
          ->name('clinicarangos.show')// nombre de la ruta
          ->middleware('permission:clinicarangos.show'); // permiso

  Route::get('clinicarangos/{clinicarango}/edit', 'ClinicaRangoController@edit') // ruta 
          ->name('clinicarangos.edit')// nombre de la ruta
          ->middleware('permission:clinicarangos.edit'); // permiso  
  Route::post('clinicarangos/rangoajax', 'ClinicaRangoController@rangoajax');
  
  // Permisos para modulo de remisiones
  Route::post('remisiones/store', 'RemisioneController@store') // ruta 
          ->name('remisiones.store')// nombre de la ruta
          ->middleware('permission:remisiones.create'); // permiso

  Route::get('remisiones/getdata', 'RemisioneController@getdata') // ruta 
          ->name('remisiones.getdata'); // permiso  

  Route::get('remisiones', 'RemisioneController@index') // ruta 
          ->name('remisiones.index')// nombre de la ruta
          ->middleware('permission:remisiones.index'); // permiso

  Route::get('remisiones/create', 'RemisioneController@create') // ruta 
          ->name('remisiones.create')// nombre de la ruta
          ->middleware('permission:remisiones.create'); // permiso

  Route::put('remisiones/{remisione}', 'RemisioneController@update') // ruta 
          ->name('remisiones.update')// nombre de la ruta
          ->middleware('permission:remisiones.edit'); // permiso

  Route::get('remisiones/{remisione}', 'RemisioneController@show') // ruta 
          ->name('remisiones.show')// nombre de la ruta
          ->middleware('permission:remisiones.show'); // permiso

  Route::get('remisiones/{remisione}/edit', 'RemisioneController@edit') // ruta 
          ->name('remisiones.edit')// nombre de la ruta
          ->middleware('permission:remisiones.edit'); // permiso
  
   Route::post('remisiones/rangoajax', 'RemisioneController@rangoajax');
   
   // permisos para los dlotes de los medicamentos
  Route::post('pacienteservicio/store', 'PacienteServicioController@store') // ruta 
          ->name('pacienteservicio.store')// nombre de la ruta
          ->middleware('permission:pacienteservicio.create'); // permiso

  Route::post('pacienteservicio/invimas', 'PacienteServicioController@invimas'); // ruta 

  Route::get('pacienteservicio', 'PacienteServicioController@index') // ruta 
          ->name('pacienteservicio.index')// nombre de la ruta
          ->middleware('permission:pacienteservicio.index'); // permiso

  Route::get('pacienteservicio/getdata', 'PacienteServicioController@getdata') // ruta 
          ->name('pacienteservicio.getdata'); // permiso

  Route::get('pacienteservicio/create', 'PacienteServicioController@create') // ruta 
          ->name('pacienteservicio.create')// nombre de la ruta
          ->middleware('permission:pacienteservicio.create'); // permiso

  Route::put('pacienteservicio/{pacienteservicio}', 'PacienteServicioController@update') // ruta 
          ->name('pacienteservicio.update')// nombre de la ruta
          ->middleware('permission:pacienteservicio.edit'); // permiso

  Route::get('pacienteservicio/{pacienteservicio}', 'PacienteServicioController@show') // ruta 
          ->name('pacienteservicio.show')// nombre de la ruta
          ->middleware('permission:pacienteservicio.show'); // permiso

  Route::get('pacienteservicio/{pacienteservicio}/edit', 'PacienteServicioController@edit') // ruta 
          ->name('pacienteservicio.edit')// nombre de la ruta
          ->middleware('permission:pacienteservicio.edit'); // permiso
});


//Route::get('reportes', 'PdfController@index');
//Route::get('crear_reporte_porpais/{tipo}', 'PdfController@crear_reporte_porpais');