<?php

  Route::post('terminados/store','TerminadoController@store') // ruta 
          ->name('terminados.store')// nombre de la ruta
          ->middleware('permission:terminados.create'); // permiso
  
  Route::get('terminados','TerminadoController@index') // ruta 
          ->name('terminados.index')// nombre de la ruta
          ->middleware('permission:terminados.index'); // permiso
  
  Route::get('terminados/create','TerminadoController@create') // ruta 
          ->name('terminados.create')// nombre de la ruta
          ->middleware('permission:terminados.create'); // permiso
  
   Route::get('terminados/getdata','TerminadoController@getdata') // ruta 
          ->name('terminados.getdata'); // permiso
  
  Route::put('terminados/{terminado}','TerminadoController@update') // ruta 
          ->name('terminados.update')// nombre de la ruta
          ->middleware('permission:terminados.edit'); // permiso
  
  Route::get('terminados/{terminado}','TerminadoController@show') // ruta 
          ->name('terminados.show')// nombre de la ruta
          ->middleware('permission:terminados.show'); // permiso
  
  Route::get('terminados/{terminado}/edit','TerminadoController@edit') // ruta 
          ->name('terminados.edit')// nombre de la ruta
          ->middleware('permission:terminados.edit'); // permiso