<?php

namespace App\Helpers\Cformula;

use App\Models\Formulaciones\Hidrpedi;
use App\Models\Formulaciones\Lipopedi;
use App\Models\Medicamentos\Mnpt;

/**
 * Description of Validacionesajax
 *
 * @author Nowen21
 */
class Validacionesajax
{


  public static function getRango($request)
  {
    $medicame = Mnpt::where('medicame_id', $request->medicame)
      ->where('npt_id', $request->npt_id)->first();
    return response()->json(['medicame' => $medicame->rangunid, 'idmedica' => $request->idmedica . '_unid']);
  }

  /**
   * validaciones al momento de digitar el requerimiento o el volumen
   *
   * @author Nowen21
   */
  public static function esmayor($numeingr, $numecomp)
  {
    $mayorxxx = false;
    if ($numeingr > $numecomp) {
      $mayorxxx = true;
    }
    return $mayorxxx;
  }

  public static function esnumerico($numeingr)
  {
    if (!is_numeric($numeingr)) {
      if ($numeingr != '') {
        $numeingr = substr($numeingr, 0, strlen($numeingr) - 1);
      } else {
        $numeingr = 0;
      }
    }
    return $numeingr;
  }

  private static function convertirdata($dataxxxx)
  {
    $newdatax = [];
    foreach ($dataxxxx['dataxxxx'] as $key => $value) {
      if ($key > 1) {
        $newdatax[$value['name']] = $value['value'];
      }
    }

    $campo_id = explode('_', $dataxxxx['campo_id']);
    $dataxxxx['campoxxx'] = $campo_id[0]; // nombre del campo que se selecciono
    $dataxxxx['cantvolu'] = $campo_id[1]; // saber si el requerimiento diario es por cantidad o por volumen
    $dataxxxx['medisele'] = $newdatax[$dataxxxx['campoxxx']]; // mediamento seleccionado
    $dataxxxx['requdiar'] = $newdatax[$dataxxxx['campo_id']]; // requerimineto diario por el mendicamento seleccionado
    $dataxxxx['fosfa_id'] = $newdatax['fosfatox']; // fosfato seleccionado
    $dataxxxx['fosfcant'] = $newdatax['fosfatox_cant']; // requerimiento diario del fosfato del fosfato seleccionado
    $dataxxxx['campo_id'] = $dataxxxx['campo_id']; // campo en que se esta digitando
    $dataxxxx['rediafos'] = $newdatax["fosfatox_" . $dataxxxx['cantvolu']]; // requerimiento diario o volumen del fosfato seleccionado
    $dataxxxx['multivi2'] = $newdatax["multiuno_cant"]; // multivitamina liposoluble seleccionada
    $dataxxxx['peso'] = $newdatax["peso"]; // multivitamina liposoluble seleccionada
    $dataxxxx['npt_id'] = $newdatax["npt_id"]; // multivitamina liposoluble seleccionada
    $dataxxxx['purga'] = $newdatax["purga"]; // multivitamina liposoluble seleccionada
    $dataxxxx['tiempo'] = $newdatax["tiempo"]; // multivitamina liposoluble seleccionada
    $dataxxxx['velocidad'] = $newdatax["velocidad"]; // multivitamina liposoluble seleccionada
    $dataxxxx['volumenx'] = $newdatax[$dataxxxx['campo_id']];
    //ddd($dataxxxx['campo_id']);
    return $dataxxxx;
  }

  public static function formulaciones($dataxxxx)
  {

    $dataxxxx = Validacionesajax::convertirdata($dataxxxx);
    $construc = ['peso' => $dataxxxx['peso'], 'npt_id' => $dataxxxx['npt_id'], 'purga' => $dataxxxx['purga'], 'tiempo' => $dataxxxx['tiempo'], 'velocidad' => $dataxxxx['velocidad']];
    $casaform = new CasasFormulacion($construc);

    $dataxxxx['requdiar'] = Validacionesajax::esnumerico($dataxxxx['requdiar']);
    $valocant = $dataxxxx['requdiar'];

    $formulax = $casaform->calculos($dataxxxx)[$dataxxxx['medisele']];
    $valovolu = $formulax['volumenx'];
    if ($dataxxxx['cantvolu'] == 'volu') {
      $valocant = $formulax['rediario'];
    }
    //ddd($valocant);

    // consular el rango
    $medicame = Mnpt::where('medicame_id', $dataxxxx['medisele'])->where('npt_id', $dataxxxx['npt_id'])->first();
    $menssage = '';
    $mostmess = false;
    // lanzar mensaje cuanto la cantidad ingresada es menor al rango establecido
    if ($valocant < $medicame->randesde && $valocant > 0) {
      $menssage = "El valor que está formulado es inferior al rango: {$medicame->randesde}-{$medicame->ranhasta} {$medicame->rangunid}";
      $mostmess = true;
    }
    // lanzar mensaje cuanto la cantidad ingresada es mayor al rango establecido
    if ($valocant > $medicame->ranhasta) {
      $menssage = "El valor que está formulado es superior al rango: {$medicame->randesde}-{$medicame->ranhasta} {$medicame->rangunid}";
      $mostmess = true;
    }

    $respuest = [];
    /**
     * mensaje resultado de digitar volumen o requerimiento
     */
    $respuest['menssage'] = [$dataxxxx['campoxxx'] . '_cant', $mostmess == true ? 'show' : 'hide', $menssage, 'CUIDADO!'];
    /**
     * cantidad en volumen o en requirimiento diaro, dependiendo de lo que se digitó
     */
    $respuest['cantvolu'] = ($dataxxxx['cantvolu'] == 'cant') ?
      [$dataxxxx['campoxxx'] . '_volu', number_format($valovolu, 1)] : // si se digitó requerimiento diario
      [$dataxxxx['campoxxx'] . '_cant', number_format($valocant, 1)]; // si se digito volumen
    /**
     * unidad de medida que tiene el medicamento seleccionado
     */
    $respuest['unidadxx'] = [$dataxxxx['campoxxx'] . '_cant', $medicame->rangunid];
    return $respuest;
  }


  /**
   * calcular el requerimiento diario para elementos traza, vitamina hidrosolube y vitamina liposoluble cuando el npt es 
   * pediatrio o neonato
   */
  private static function getPedineon($dataxxxx)
  {
    $requerim = 0;
    /**
     * Calcular requerimiento diario de acurdo al medicamento
     */
    switch ($dataxxxx['campoxxx']) {
      case 'elemtraz':
        $requerim = $dataxxxx["peso"] < 2.5 ? 400 : 250;
        break;
      case 'multivit': //hidrosoluble
        $requerim = Hidrpedi::where(function ($queryxxx) use ($dataxxxx) {
          $pesoxxxx = $dataxxxx["peso"];
          $finalxxx=$pesoxxxx;
          if ($pesoxxxx < 0.5) {
            $queryxxx->where('finalxxx', '<=', 0.5);
          } elseif ($pesoxxxx > 2.4) {
            $queryxxx->where('finalxxx', '>', 2.4);
          } else {
            $decimale = explode('.', $pesoxxxx);
            $inicioxx = $pesoxxxx;
            $finalxxx=$pesoxxxx;
            if (count($decimale) > 1) {
              $largoxxx = strlen($decimale[1]);
              $inicioxx = $pesoxxxx-0.1;
              $finalxxx=$inicioxx;
              if ($largoxxx > 1) {
                $inicioxx = $decimale[0] . '.' . substr($decimale[1], 0, 1);
                $finalxxx=$pesoxxxx;
              }
            }
            $queryxxx->whereBetween('inicioxx', [$inicioxx, $finalxxx]);
          }
          return $queryxxx;
        })

          ->first()->requerim;
        //ddd($requerim);
        break;
      case 'multiuno': //liposoluble
        $requerim = Lipopedi::where(function ($queryxxx) use ($dataxxxx) {
          $pesoxxxx = $dataxxxx["peso"];
          $finalxxx=$pesoxxxx;
          if ($pesoxxxx < 0.5) {
            $queryxxx->where('finalxxx', '<=', 0.5);
          } elseif ($pesoxxxx > 2.4) {
            $queryxxx->where('finalxxx', '>', 2.4);
          } else {
            $decimale = explode('.', $pesoxxxx);
            $inicioxx = $pesoxxxx;
            $finalxxx=$pesoxxxx;
            if (count($decimale) > 1) {
              $largoxxx = strlen($decimale[1]);
              $inicioxx = $pesoxxxx-0.1;
              $finalxxx=$inicioxx;
              if ($largoxxx > 1) {
                $inicioxx = $decimale[0] . '.' . substr($decimale[1], 0, 1);
                $finalxxx=$pesoxxxx;
              }
            }
            $queryxxx->whereBetween('inicioxx', [$inicioxx, $finalxxx]);
          }
          return $queryxxx;
        })

          ->first()->requerim;
        break;
    }

    return $requerim;
  }
  /**
   *  hallar la fomulacion para elementos traza, vitamian hidrosoluble y vitamina liposoluble de pediatrio y neonato
   */
  public static function getFormulaciones($dataxxxx, $medicame)
  {
    $dataxxxx = Validacionesajax::convertirdata($dataxxxx);
    $construc = ['peso' => $dataxxxx['peso'], 'npt_id' => $dataxxxx['npt_id'], 'purga' => $dataxxxx['purga'], 'tiempo' => $dataxxxx['tiempo'], 'velocidad' => $dataxxxx['velocidad']];
    $casaform = new CasasFormulacion($construc);
    $dataxxxx['requdiar'] = Validacionesajax::getPedineon($dataxxxx);
    $formulax = $casaform->calculos($dataxxxx)[$dataxxxx['medisele']];


    /**
     * cantidad en volumen y en requirimiento diaro
     */
    return [
      'campcant' => $dataxxxx['campoxxx'] . '_cant',
      'cantidad' => number_format($dataxxxx['requdiar'], 1),
      'campvolu' => $dataxxxx['campoxxx'] . '_volu',
      'volumenx' => number_format($formulax['volumenx'], 1)
    ];
  }
}
