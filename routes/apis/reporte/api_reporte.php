<?php

use App\Helpers\Pacientes;
use App\Models\Sistema\Municipio;
use Illuminate\Http\Request;


Route::get('reporte/controlpf', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientes($request);
});

Route::get('reporte/orden', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Pacientes::getCalcularedad($request));
});
