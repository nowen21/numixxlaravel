<?php

namespace App\Helpers;

/**
 * Description of Requediario
 *
 * @author Nowen21
 */
class Requediario {

  public function requediario($data) {
    $formulax = [];
    $formulax[1] = ['rdiario' => $data['volumenx'] / 10 / $data['pesoxxxx']]; //f1 amino 10 aminino
    $formulax[2] = ['rdiario' => $data['volumenx'] / (100 / 15) / $data['pesoxxxx']]; //f1 amino 10 amino

    $formulax[3] = ['rdiario' => $data['volumenx'] / 10 / $data['pesoxxxx']]; //pediatrico aminoacido
    if ($data['nptxxxxx'] == 3) {
      $formulax[4] = ['rdiario' => $data['volumenx']]; // fosfato
      $formulax[5] = ['rdiario' => $data['volumenx'] / 2.6]; // fosfato
      $formulax[6] = ['rdiario' => $data['volumenx']]; //fosfato
    } else {
      $formulax[4] = ['rdiario' => $data['volumenx'] / $data['pesoxxxx']]; // fosfato
      $formulax[5] = ['rdiario' => $data['volumenx'] / $data['pesoxxxx'] * 2.6]; // fosfato
      $formulax[6] = ['rdiario' => $data['volumenx'] / $data['pesoxxxx']]; //fosfato
    }

    $formulax[7] = ['rdiario' => $data['volumenx'] / 2 / $data['pesoxxxx'] / 1.44]; //carbo
    $formulax[8] = ['rdiario' => $data['volumenx'] / 10 / $data['pesoxxxx'] / 1.44]; //carbo
    $calcfosf = 0;
    if ($data['fosfa_id'] == 4) {
      $calcfosf = $data['fosfatox'] * 2;
    }
    $formulax[9] = ['rdiario' => ($data['volumenx'] * 2 + $calcfosf) / $data['pesoxxxx']]; // sodio
    $factorxx = 0;
    switch ($data['fosfa_id']) {
      case 5:
        $factorxx = 3.8;
        break;
      case 6:
        $factorxx = 2;
        break;
    }
    $calculox=0;
    if ($data['nptxxxxx'] == 3) {
      $calculox=$data['fosfatox'] *  $factorxx;
    } else {
      $calculox=$data['fosfatox'] * $data['pesoxxxx'] * $factorxx;
    }
    $formulax[10] = ['rdiario' => number_format(($data['volumenx'] * 2 + $calculox) / $data['pesoxxxx'], 2)]; //potasio
    //$formulax[10] = ['rdiario' => number_format(($data['volumenx'] * 2 + $calculox) / $data['pesoxxxx'], 2)]; //potasio

    $factorxx = 100;
    if ($data['nptxxxxx'] == 3) {
      $factorxx = 9.2;
    }
    if ($data['nptxxxxx'] == 3) {
      $formulax[11] = ['rdiario' => $data['volumenx'] * $factorxx]; //calcio
    } else {
      $formulax[11] = ['rdiario' => $data['volumenx'] * $factorxx / $data['pesoxxxx']]; //calcio
    }

    $factorxx = 200;
    if ($data['nptxxxxx'] == 3) {
      $factorxx = 20;
    }
    if ($data['nptxxxxx'] == 3) {
      $formulax[12] = ['rdiario' => $data['volumenx'] * $factorxx]; //magnesio
    } else {
      $formulax[12] = ['rdiario' => $data['volumenx'] * $factorxx / $data['pesoxxxx']]; //magnesio
    }


    $formulax[13] = ['rdiario' => $data['volumenx'] * 0.33]; //elementos
    $formulax[14] = ['rdiario' => $data['volumenx'] * 0.654]; //elementos
    $formulax[15] = ['rdiario' => $data['volumenx']]; //elementos

    $formulax[16] = ['rdiario' => $data['volumenx'] * 250 / $data['pesoxxxx']]; //elementos peditrico

    $formulax[17] = ['rdiario' => $data['volumenx']]; //multivitamina cernevit
    //$formulax[18] = ['rdiario' => '']; //vitalip adulto
    $formulax[18] = ['rdiario' => $data['volumenx'] * 0.099]; //vitalip adulto
    if ($data['nptxxxxx'] == 3) {
      $formulax[19] = ['rdiario' => $data['volumenx'] * 0.04]; //soluvit adulto
    } else {
      $formulax[19] = ['rdiario' => $data['volumenx']]; //soluvit infantil
    }
    $formulax[20] = ['rdiario' => $data['volumenx'] / 5 / $data['pesoxxxx']]; //glutamina
    $formulax[21] = ['rdiario' => $data['volumenx'] * 100]; //vitamina c
    $formulax[22] = ['rdiario' => $data['volumenx']]; //complejo b
    $formulax[23] = ['rdiario' => $data['volumenx'] * 100]; //tiamina
    $formulax[24] = ['rdiario' => $data['volumenx']]; //acido

    $formulax[25] = ['rdiario' => $data['volumenx'] / 0.1]; // votamina k
    $lipidoxx = 0; //echo $data['vitalipi'];
    if ($data['nptxxxxx'] == 3) {
      $lipidoxx = ($data['volumenx'] / 5 + 0.1 * $data['vitalipi'] / 0.099) / $data['pesoxxxx'];
    } else {
      $lipidoxx = ($data['volumenx'] / 5 + 0.1 * $data['vitalipi']) / $data['pesoxxxx'];
    }
    $formulax[26] = ['rdiario' => $lipidoxx]; //f1 amino 10
    $formulax[27] = ['rdiario' => ($data['volumenx'] / 5 + 0.1 * $data['vitalipi'] / 0.099) / $data['pesoxxxx']]; //f1 amino 10
    $formulax[28] = ['rdiario' => ($data['volumenx'] / 10 + 0.1 * $data['vitalipi'] / 0.099) / $data['pesoxxxx']]; //f1 amino 10
    $formulax[29] = ['rdiario' => $data['volumenx']]; //vitalip infantil
    //echo $data['medicame'];
    return ['rdiario' => $formulax[$data['medicame']]['rdiario']];
    //return ['rdiario' => number_format($formulax[$data['medicame']]['rdiario'], 2,'.','')];
  }

}
