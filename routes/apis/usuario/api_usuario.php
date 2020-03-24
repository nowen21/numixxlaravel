<?php

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
    return Usuarios::getRoles($request);
});
Route::get('usuario/urol', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
    return Usuarios::getURoles($request);
});
Route::get('usuario/asignarol', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
    return Usuarios::getAsignaRol($request);
});
