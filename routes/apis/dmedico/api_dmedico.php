<?php

use App\Models\Dispositivos\Dinvima;
use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Dmarca;
use App\Models\Dispositivos\Dmedico;
use Illuminate\Http\Request;

Route::get('dmedico/dmedico', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Dmedico::select('dmedicos.id', 'dmedicos.nombgene', 's_estado', 'dmedicos.sis_esta_id')
        ->join('sis_estas', 'dmedicos.sis_esta_id', '=', 'sis_estas.id')
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('dmedico/dmarca', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Dmarca::select('dmarcas.id', 'dmarcas.nombcome', 's_estado', 'dmarcas.sis_esta_id', 'dmarcas.dmedico_id')
        ->join('sis_estas', 'dmarcas.sis_esta_id', '=', 'sis_estas.id')
        ->where('dmarcas.dmedico_id', $request->dmedico)
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('dmedico/dinvima', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Dinvima::select('dinvimas.id', 'dinvimas.reginvim', 's_estado', 'dinvimas.sis_esta_id', 'dmarcas.dmedico_id')
        ->join('dmarcas', 'dinvimas.dmarca_id', '=', 'dmarcas.id')
        ->join('sis_estas', 'dinvimas.sis_esta_id', '=', 'sis_estas.id')
        ->where('dmarcas.dmedico_id', $request->dmedico)
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('dmedico/dlote', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');

  return datatables()
    ->eloquent(
      Dlote::select('dlotes.id', 'dlotes.lotexxxx', 's_estado', 'dlotes.sis_esta_id', 'dmarcas.dmedico_id')
        ->join('dinvimas', 'dlotes.dinvima_id', '=', 'dinvimas.id')
        ->join('dmarcas', 'dinvimas.dmarca_id', '=', 'dmarcas.id')
        ->join('sis_estas', 'dlotes.sis_esta_id', '=', 'sis_estas.id')
        ->where('dmarcas.dmedico_id', $request->dmedico)
    )
    ->addColumn('botonexx', $request->botonesx)
    ->addColumn('s_estado', $request->estadoxx)
    ->rawColumns(['botonexx', 's_estado'])
    ->toJson();
});

Route::get('dmedico/dinvimaajax', function (Request $request) {
  if (!$request->ajax())
    return redirect('/');
 
  return response()->json(Dinvima::combo([
    'padrexxx' => $request->padrexxx,
    'cabecera' => true, 'esajaxxx' => true
  ]));
});
