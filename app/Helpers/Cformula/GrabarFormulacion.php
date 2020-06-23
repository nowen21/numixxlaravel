<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;

use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Dformula;

/**
 * Description of Casas
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class GrabarFormulacion {

  public static function setDformula($cabecera) {
    $cabecera['npt_id']=$cabecera['cformula']->paciente->npt_id;
//  ddd($cabecera['npt_id']);
    $casaform = new CasasFormulacion($cabecera);

    if (count($cabecera['cformula']->dformulas)) {
      Dformula::where('cformula_id', $cabecera['cformula']->id)->delete();
    }
    $i = 0;
    $purgtota = 0;
    $fosfsele=$cabecera['fosfatox'];
    $requfosf=$cabecera['fosfatox_cant'];
    $multlipo=$cabecera['multiuno_cant'];
    foreach ($cabecera as $key => $value) {

      $data = explode('_', $key);
      if (isset($data[1]) && $data[1]=='volu') {
        $dataxxxx = [
            'medisele' => $cabecera[$data[0]], // mediamento seleccionado
            'requdiar' => $cabecera[$data[0] . '_cant'], // requerimineto diario por el mendicamento seleccionado
            'fosfa_id' => $fosfsele, // fosfato seleccionado
            'fosfcant' => $requfosf, // requerimiento diario del fosfato del fosfato seleccionado
            'multivi2' => $multlipo, // multivitamina liposoluble seleccionada
            'lipovolu' => $cabecera['multiuno_volu'], // multivitamina liposoluble seleccionada
            //'volumenx' => $cabecera[$data[0]],
            'volumenx' => $cabecera[$data[0] . '_volu'],

        ];
        $formulax = $casaform->calculos($dataxxxx)[$cabecera[$data[0]]];
        $totalxxx = $formulax['reqtotal'];
        $volumenx = $formulax['volumenx'];
        if ($data[0] == 'aguaeste') {
          $volumenx = $cabecera[$data[0] . '_volu'];
          $cabecera[$data[0] . '_cant'] = 1;
          $volutota = $cabecera['tiempo'] * $cabecera['velocidad'];
          $purgaxx = ($volutota + $cabecera['purga']) / $volutota;
          $formulax['purgaxxx'] = $volumenx * $purgaxx;
        }
        // cuando un medicamento no tiene requerimiento diario
        if ($cabecera[$data[0] . '_cant'] == '') {
          $cabecera[$data[0] . '_cant'] = 0;
          $totalxxx = 0;
          $volumenx = 0;
        }
        $purgtota += $formulax['purgaxxx'];
        $grabarxx = [
            'cformula_id' => $cabecera['cformula']->id,
            'medicame_id' => $cabecera[$data[0]],
            'cantidad' => $cabecera[$data[0] . '_cant'],
            'rtotal' => $totalxxx,
            'volumen' => $volumenx,
            'purga' => $formulax['purgaxxx'],
            'user_crea_id' => auth()->user()->id,
            'user_edita_id' => auth()->user()->id,
            'sis_esta_id'=>1
        ];
        Dformula::create($grabarxx);
      }
      $i++;
    }
    $lotexxxx = Cformula::where('id', $cabecera['cformula']->id)->first();
    $lotexxxx->update(['total' => $purgtota]);
    return $cabecera['cformula']->id;
  }

}
