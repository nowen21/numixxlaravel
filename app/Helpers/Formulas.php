<?php

namespace App\Helpers;

use App\Helpers\Volumen;
use App\Helpers\Requetotal;
use App\Helpers\Purga;
use App\Helpers\Requediario;

/**
 * Description of Formulas
 *
 * @author Nowen21
 */
class Formulas {

  public function volumen($dataxxxx) {
    $volumenx = new Volumen;
    return $volumenx->volumen($dataxxxx);
  }

  public function requetotal($dataxxxx, $otromedi) {
    $requtota = new Requetotal;
    return $requtota->requetotal($dataxxxx, $otromedi);
  }

  public function purga($pmedicam, $cant, $formulacion, $volumenx, $npt_idx) {
    $purgaxxx = new Purga;
    return $purgaxxx->purga($pmedicam, $cant, $formulacion, $volumenx, $npt_idx);
  }

  public function requediario($dataxxxx) {
    $requdiar = new Requediario;
    $dataxxxx = ['volumenx' => $dataxxxx['requdiar'], 'pesoxxxx' => $dataxxxx['pesoxxxx'], 'fosfa_id' => $dataxxxx['fosfatox'],
        'fosfatox' => $dataxxxx['fosfcant'], 'nptxxxxx' => $dataxxxx['npt_idxx'], 'vitalipi' => $dataxxxx['vitalipi'], 'medicame' => $dataxxxx['medicame']];
    return $requdiar->requediario($dataxxxx);
  }

}
