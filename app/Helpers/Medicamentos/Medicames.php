<?php

namespace App\Helpers\Medicamentos;

use App\Helpers\DatatableHelper;
use App\Models\Formulaciones\Dfmlote;
use App\Models\Formulaciones\Dformula;
use App\Models\Medicamentos\Minvima;
use App\Models\Medicamentos\Mlote;
use App\Models\Medicamentos\Mnpt;

class Medicames
{
    public static function getNptAsignados($request)
    {
        $paciente = Mnpt::select('mnpts.id', 'npts.nombre', "mnpts.randesde", "mnpts.ranhasta", "mnpts.rangunid",
        's_estado', 'mnpts.sis_esta_id',"mnpts.medicame_id")
            ->join('npts', 'mnpts.npt_id', '=', 'npts.id')
            ->join('sis_estas', 'mnpts.sis_esta_id', '=', 'sis_estas.id')
            ->where('mnpts.medicame_id', $request->medicame);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getRInvimas($request)
    {
        $paciente =Minvima::select('minvimas.id', 'minvimas.reginvim', 's_estado', 
        'minvimas.sis_esta_id', 'mmarcas.medicame_id')
        ->join('mmarcas', 'minvimas.mmarca_id', '=', 'mmarcas.id')
        ->join('sis_estas', 'minvimas.sis_esta_id', '=', 'sis_estas.id')
        ->where('mmarcas.medicame_id', $request->medicame);
        return DatatableHelper::getDatatable($paciente, $request); 
    }

    /**
   * Este metodo realiza el descuento al inventario del 
   * valor solicitado por cada medicamento seleccionado
   *
   */
  public static function getDinventario($datallexx) {
    // consultar el inventario del medicamento seleccionado
    $mlotexxx = Mlote::consultarinventario($datallexx);
    // saber si ese detalle ya tiene descuento de inventario
    $inventar = Dfmlote::where('dformula_id', $datallexx->id)->first();
    if (count($inventar) == 0) {// solo se hace descuento de inventario si no existe un registro del detalle
      $cantidad = 0;
      foreach ($mlotexxx as $value) { // recorrer los lotes que tienen inventario del medicamento seleccionado
        /* completar el volumen de medicamento seleccionado que se necesita */
        if ($cantidad < $datallexx->purga) {
          /* asiganar todo el inventario del lote */
          $cantidad = Medicames::getDescuento($datallexx, $cantidad, $value);
        } else {// se completo lo solicitado
          break;
        }
      }
    }
  }
  /**
   * Este metodo se encarga de realizar las validaciones para el descuento de inventario.
   * 
   * @param array $datallexx registro que contiene el valor de la purga el cual se quiere completar el descuento
   * @param int $cantidad cantidad que se lleva acumulada para el descuento
   * @param array $value registro del lote al que se le va a descontar inventario
   * @return int cantidad que se lleva de lo que se necesita para completar lo solicitado
   */
  private static function getDescuento($datallexx, $cantidad, $value) {
    $inventar = 0;
    $volumenx = 0;
    if ($datallexx->purga - $cantidad >= $value->inventar) {
      $volumenx = $value->inventar;
    } else {// se decuenta del inventario lo que hace falta para completar lo solicitado
      $inventar = $value->inventar - ($datallexx->purga - $cantidad); // descuenta a inventario lo que hace falta
      $volumenx = $value->inventar - $inventar; // cantidad que se desconto a inventario
    }
    $mlotexxy = Mlote::find($value->id); // seleccionar el lote al que se le va a descontar inventario
    /* realizar el descuento del inventario encontrado */
    $mlotexxy->update(['inventar' => $inventar, 'userupda' => auth()->user()->id]);
    /* insertar el volumen encontrado */
    Dfmlote::create(['dformula_id' => $datallexx->id,
        'mlote_id' => $value->id,
        'usercrea' => auth()->user()->id,
        'userupda' => auth()->user()->id,
        'volumenx' => $volumenx
    ]);
    return $cantidad + $volumenx;
  }

}
