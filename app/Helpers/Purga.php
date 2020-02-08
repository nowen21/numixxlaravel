<?php

namespace App\Helpers;

use App\Helpers\Requetotal;

class Purga {

  public function purga($pmedicam, $cant, $formulacion, $volumenx, $npt_idx) {
    $requtota = new Requetotal;
    $cpurga = (($formulacion['tiempo'] * $formulacion['velocidad'] + $formulacion['purga']) / ($formulacion['tiempo'] * $formulacion['velocidad']));
    $formulax = [];
    $formulax[1] = ['purga' => $cpurga * $volumenx]; //f1 amino 10
    $formulax[2] = ['purga' => $cpurga * $volumenx]; //f2 amino 15
    $formulax[3] = ['purga' => $cpurga * $volumenx]; //f2 amino 15
    $formulax[4] = ['purga' => $volumenx * $cpurga]; //f3 fosfato glicerofosfato        
    $formulax[5] = ['purga' => $volumenx * $cpurga]; //f4 fosfato corpaul        
    $formulax[6] = ['purga' => $volumenx * $cpurga]; //f5 fostao pisa        
    $formulax[7] = ['purga' => $volumenx * $cpurga]; //f6 carbohidrato 50        
    $formulax[8] = ['purga' => $volumenx * $cpurga]; //f7 carbohidrato 10        
    $formulax[9] = ['purga' => $volumenx * $cpurga]; //f8 sodio
    // calcular las otras formulas de potasio
    if ($pmedicam == 10) {
      $constante = 0;
      if ($formulacion['fosfatox'] == 4) {
        $constante = 3.6;
      }
      if ($formulacion['fosfatox'] == 5) {
        $constante = 2;
      }
      $formulax[10] = ['purga' => $volumenx * $cpurga]; //f9  potasio
    }
    $formulax[11] = ['purga' => $volumenx * $cpurga]; //f10 calcio        
    $formulax[12] = ['purga' => $volumenx * $cpurga]; //f11 magnesio       
    $formulax[13] = ['purga' => $volumenx * $cpurga]; //f12 traza tracutil
    $formulax[14] = ['purga' => $volumenx * $cpurga]; //f13 traza addamel
    $formulax[15] = ['purga' => $volumenx * $cpurga]; //f14 traza corpaul        
    $formulax[16] = ['purga' => $volumenx * $cpurga]; //f14 traza corpaul        
    $formulax[17] = ['purga' => $volumenx * $cpurga]; //f15 multivataminas cernivit
    $formulax[18] = ['purga' => $volumenx * $cpurga]; //f16 multivataminas vitalipid        
    $formulax[19] = ['purga' => $volumenx * $cpurga]; //f17 multivataminas soluvit
    $formulax[20] = ['purga' => $volumenx * $cpurga]; //f18 glutamina
    $formulax[21] = ['purga' => $volumenx * $cpurga]; //f19 vitamina c      
    $formulax[22] = ['purga' => $volumenx * $cpurga]; //f20 complejo B
    $formulax[23] = ['purga' => $volumenx * $cpurga]; //f21 tiamina
    $formulax[24] = ['purga' => $volumenx * $cpurga]; //f22 acido folico
    $formulax[25] = ['purga' => $volumenx * $cpurga]; //f23 vitamina k     
    // realizar el calculo para los lipidos
    switch ($pmedicam) {
      case 26:
      case 27:
      case 28:
        $resta = 0;
        $factor = 5;
        if (isset($formulacion['multivit'])&&$formulacion['multivit'] != 17) {
          if ($npt_idx == 3) {
            $resta = 0.1 * $formulacion['multivit_cant'] / 0.099;
          } else {
            $resta = 0.1 * $formulacion['multivit_volu'];
          }
        }
        if ($pmedicam == 28) {
          $factor = 10;
        }
        $formulax[$pmedicam] = ['purga' => abs(abs((($cant * $formulacion['peso']) - $resta) * $factor) * $cpurga)];
        break;
    }
    $formulax[29] = ['purga' => $volumenx * $cpurga]; //f23 vitamina k  
    $formulax[32] = ['purga' => $volumenx * $cpurga]; //agua 
    $dataxxxx=['medicame'=>$pmedicam,'requdiar'=>$cant,'pesoxxxx'=>$formulacion['peso'],'fosfatox'=>$formulacion['fosfatox'],'npt_idxx'=>$npt_idx];
    return ['purga' => $formulax[$pmedicam]['purga'], 'rtotal' => $requtota->requetotal($dataxxxx, $formulacion['fosfatox_cant'])['rtotal']];
  }

}
