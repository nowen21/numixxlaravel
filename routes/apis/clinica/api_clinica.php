<?php

use App\Helpers\Clinicas;
use App\Models\Clinica\SisClinica;
use Illuminate\Http\Request;

Route::get('clinica/clinica', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      SisClinica::select('sis_clinicas.id', 'sis_clinicas.clinica', 's_estado', 'sis_clinicas.sis_esta_id')
        ->join('sis_estas', 'sis_clinicas.sis_esta_id', '=', 'sis_estas.id')
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('clinica/cmedicamento', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return Clinicas::getMedicamentosAsignados($request);
});
Route::get('clinica/medicamento', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getMedicametos($request);
});

Route::get('clinica/asignarmedicame', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Clinicas::asignarMedicam($request));
});

Route::get('clinica/cpaciente', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getPacientesAsignados($request);
});
Route::get('clinica/paciente', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getPacientes($request);
});

Route::get('clinica/asignarPaciente', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Clinicas::asignarPaciente($request));
});

Route::get('clinica/crango', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getRangosAsignados($request);
});
Route::get('clinica/rango', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getRangos($request);
});

Route::get('clinica/asignarRango', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return response()->json(Clinicas::asignarRango($request));
});
Route::get('clinica/servicio', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getServicios($request);
});

Route::get('clinica/condicio', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
  return Clinicas::getCondicio($request);
});


