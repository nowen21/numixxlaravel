<?php

use App\Helpers\Administracion;
use App\Helpers\Clinicas;

use Illuminate\Http\Request;

Route::get('administracion/rango', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Administracion::getRangos($request);
});
Route::get('administracion/eps', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Administracion::getEps($request);
});

