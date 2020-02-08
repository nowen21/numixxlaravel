<?php

  Route::post('procesos/store','ProcesoController@store') // ruta 
          ->name('procesos.store')// nombre de la ruta
          ->middleware('permission:procesos.create'); // permiso
  
  Route::get('procesos','ProcesoController@index') // ruta 
          ->name('procesos.index')// nombre de la ruta
          ->middleware('permission:procesos.index'); // permiso
  
  Route::get('procesos/create','ProcesoController@create') // ruta 
          ->name('procesos.create')// nombre de la ruta
          ->middleware('permission:procesos.create'); // permiso
  
   Route::get('procesos/getdata','ProcesoController@getdata') // ruta 
          ->name('procesos.getdata'); // permiso
  
  Route::put('procesos/{proceso}','ProcesoController@update') // ruta 
          ->name('procesos.update')// nombre de la ruta
          ->middleware('permission:procesos.edit'); // permiso
  
  Route::get('procesos/{proceso}','ProcesoController@show') // ruta 
          ->name('procesos.show')// nombre de la ruta
          ->middleware('permission:procesos.show'); // permiso
  
  Route::get('procesos/{proceso}/edit','ProcesoController@edit') // ruta 
          ->name('procesos.edit')// nombre de la ruta
          ->middleware('permission:procesos.edit'); // permiso