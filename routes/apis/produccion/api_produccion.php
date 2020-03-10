<?php

use App\Helpers\Pacientes;
use App\Models\Sistema\Municipio;
use Illuminate\Http\Request;


Route::get('produccion/alistamiento', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientes($request);
});

Route::get('produccion/preparacion', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Pacientes::getCalcularedad($request));
});

Route::get('produccion/conciliacion', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Municipio::combo(['ajaxxxxx'=>true,'cabecera'=>true,'departam'=>$request->departam]));
});

Route::get('produccion/controlp', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientesCformula($request);
});

Route::get('produccion/controlt', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientesCformula($request);
});
