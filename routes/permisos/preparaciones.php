<?php

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