<?php

use App\Helpers\Pacientes;
use App\Models\Sistema\Municipio;
use Illuminate\Http\Request;


Route::get('usuario/usuario', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientes($request);
});

Route::get('usuario/rol', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Pacientes::getCalcularedad($request));
});
