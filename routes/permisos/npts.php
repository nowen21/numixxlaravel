  <?php 
Route::post('npt/store', 'NptController@store') // ruta 
          ->name('npt.store')// nombre de la ruta
          ->middleware('permission:npt.create'); // permiso

  Route::get('npt/getdata', 'NptController@getdata') // ruta 
          ->name('npt.getdata'); // permiso  

  Route::get('npt', 'NptController@index') // ruta 
          ->name('npt.index')// nombre de la ruta
          ->middleware('permission:npt.index'); // permiso

  Route::get('npt/create/{paciente}', 'NptController@create') // ruta 
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

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

