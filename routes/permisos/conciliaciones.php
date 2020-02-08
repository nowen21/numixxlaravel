<?php

  Route::post('conciliaciones/store','ConciliacionController@store') // ruta 
          ->name('conciliaciones.store')// nombre de la ruta
          ->middleware('permission:conciliaciones.create'); // permiso
  
  Route::get('conciliaciones','ConciliacionController@index') // ruta 
          ->name('conciliaciones.index')// nombre de la ruta
          ->middleware('permission:conciliaciones.index'); // permiso
  
  Route::get('conciliaciones/create','ConciliacionController@create') // ruta 
          ->name('conciliaciones.create')// nombre de la ruta
          ->middleware('permission:conciliaciones.create'); // permiso
  
   Route::get('conciliaciones/getdata','ConciliacionController@getdata') // ruta 
          ->name('conciliaciones.getdata'); // permiso
  
  Route::put('conciliaciones/{cabecera}','ConciliacionController@update') // ruta 
          ->name('conciliaciones.update')// nombre de la ruta
          ->middleware('permission:conciliaciones.edit'); // permiso
  
  Route::get('conciliaciones/{cabecera}','ConciliacionController@show') // ruta 
          ->name('conciliaciones.show')// nombre de la ruta
          ->middleware('permission:conciliaciones.show'); // permiso
  
  Route::get('conciliaciones/{cabecera}/edit','ConciliacionController@edit') // ruta 
          ->name('conciliaciones.edit')// nombre de la ruta
          ->middleware('permission:conciliaciones.edit'); // permiso