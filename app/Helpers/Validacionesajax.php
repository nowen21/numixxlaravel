<?php

namespace App\Helpers;

use App\Helpers\Formulas;
use App\Helpers\CasasFormulacion;

/**
 * Description of Validacionesajax
 *
 * @author Nowen21
 */
class Validacionesajax {

  /**
   * validaciones al momento de digitar el requerimiento o el volumen
   *
   * @author Nowen21
   */
  public function esmayor($numeingr, $numecomp) {
    $mayorxxx = false;
    if ($numeingr > $numecomp) {
      $mayorxxx = true;
    }
    return $mayorxxx;
  }

  public function esnumerico($numeingr) {
    if (!is_numeric($numeingr)) {
      if ($numeingr != '') {
        $numeingr = substr($numeingr, 0, strlen($numeingr) - 1);
      } else {
        $numeingr = 0;
      }
    }
    return $numeingr;
  }

  private function convertirdata($dataxxxx) {
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

    return $dataxxxx;
  }

  public function formulaciones($dataxxxx) {

    $dataxxxx = $this->convertirdata($dataxxxx);
    $construc = ['peso' => $dataxxxx['peso'], 'npt_id' => $dataxxxx['npt_id'], 'purga' => $dataxxxx['purga'], 'tiempo' => $dataxxxx['tiempo'], 'velocidad' => $dataxxxx['velocidad']];
    $casaform = new CasasFormulacion($construc);

    $dataxxxx['requdiar'] = $this->esnumerico($dataxxxx['requdiar']);
    $valocant = $dataxxxx['requdiar'];
    
    $formulax = $casaform->calculos($dataxxxx)[$dataxxxx['medisele']];
    $valovolu = $formulax['volumenx'];
    if ($dataxxxx['cantvolu'] == 'volu') {
      $valocant = $formulax['rediario'];
    }

    // consular el rango
    $medicame = \App\MedicamentoNpt::where('medicamento_id', $dataxxxx['medisele'])->where('npt_id', $dataxxxx['npt_id'])->first();
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

    return [
        'tipocamp' => $dataxxxx['cantvolu'],
        'menssage' => $menssage,
        'mostmess' => $mostmess,
        'campcant' => $dataxxxx['campoxxx'] . '_cant', 'valocant' => $valocant,
        'campvolu' => $dataxxxx['campoxxx'] . '_volu', 'valovolu' => $valovolu,
        'unidadxx' => $medicame->rangunid,
    ];
  }

}
