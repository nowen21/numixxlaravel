<?php

namespace App\Traits\Reporte;

use App\Helpers\DatatableHelper;
use App\Models\Clinica\Crango;
use App\Models\Reportes\ControlPF;
use App\Models\Reportes\Orden;

trait ControlPFTrait
{
  public static function getOrdenControlPf($request)
  {
      $ordenxxx=Orden::select(['ordens.id','ordens.ordeprod','ordens.observac', 
      'sis_estas.s_estado','ordens.created_at'])
      ->join('sis_estas', 'ordens.sis_esta_id', '=', 'sis_estas.id');;
      
      return DatatableHelper::getDt($ordenxxx, $request);
  }
  


}
