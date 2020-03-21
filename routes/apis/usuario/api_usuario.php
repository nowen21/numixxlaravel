<?php

use App\Helpers\Pacientes;
use App\Helpers\Usuarios\Usuarios;
use Illuminate\Http\Request;


Route::get('usuario/usuario', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Usuarios::getUsuarios($request);
});

Route::get('usuario/rol', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Pacientes::getCalcularedad($request));
});
