<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alerta;

class AlertaController extends Controller {

  public function alertas(Request $request) {
    if ($request->ajax()) {
      $accionxx = 2;
      $alertasx = '';
      if (auth()->user()->clinica_id == 1) {
        $accionxx = 1;
        $alertasx = Alerta::where('tipoacione_id', 1)->where('leidaxxx', 0)->get();
      } else {
        $alertasx = Alerta::where('tipoacione_id', 1)->where('leidaxxx', 0)->where('clinica_id', auth()->user()->clinica_id)->get();
      }
      $cantidad = count($alertasx);
      $cantidax = count($alertasx);
      $dataxxxx = [];
      foreach ($alertasx as $value) {
        if (auth()->user()->clinica_id == 1) {
          $dataxxxx[] = [
              'urlxxxxx' => url('preparaciones/' . $value->formulacione_id . '/edit'),
              'mensange' => 'Ir a preparación'
          ];
        } else {
          $dataxxxx[] = [
              'urlxxxxx' => url('npt/' . $value->formulacione_id),
              'mensange' => 'Ver formulacion'
          ];
        }
      }
      return response()->json(['cabezaid' => 'cabezaxx',
                  'informex' => $cantidax = 1 ? 'Usted tiene ' . $cantidad . ' notificación' : 'Usted tiene ' . $cantidad . ' notificaciones',
                  'numalert' => $cantidad,
                  'numaleid' => 'numalert',
                  'dataxxxx' => $dataxxxx,
      ]);
    }
  }

}
