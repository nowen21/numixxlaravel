<?php

use App\Helpers\Pacientes;
use App\Models\Sistema\Municipio;
use Illuminate\Http\Request;


Route::get('paciente/paciente', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientes($request);
});

Route::get('paciente/calcularedad', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Pacientes::getCalcularedad($request));
});

Route::get('paciente/municipios', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Municipio::combo(['ajaxxxxx'=>true,'cabecera'=>true,'departam'=>$request->departam]));
});

Route::get('paciente/formulaciones', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Pacientes::getPacientesCformula($request);
});
