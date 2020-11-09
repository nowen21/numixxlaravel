<?php

namespace App\Traits\Reporte;

use App\Helpers\DatatableHelper;
use App\Models\Clinica\Crango;
use App\Models\Dispositivos\Dlote;
use App\Models\Formulaciones\Cformula;
use App\Models\Medicamentos\Mlote;
use App\Models\Reportes\ControlPF;
use App\Models\Reportes\Orden;

trait ControlPFTrait
{

  private $registro = [
    'medidisp' => '', // medicamento
    'lotexxxx' => '', // lote medicamento
    'consumid' => '', // cantidad consumida del medicamento
    'alistada' => '', // cantidad alistada del medicamento
    'sobrante' => '', // cantidad sobrante del medicamento
    'identifi' => '', // indentificador del medicamento
  ];
  private $concilia = [];
  private $dispocan;
  private $mediccan;

  public static function getOrdenControlPf($request)
  {
      $ordenxxx=Orden::select(['ordens.id','ordens.ordeprod','ordens.observac', 
      'sis_estas.s_estado','ordens.created_at'])
      ->join('sis_estas', 'ordens.sis_esta_id', '=', 'sis_estas.id');;
      
      return DatatableHelper::getDt($ordenxxx, $request);
  }

  private function getData($dataxxxx)
  {
    $medidisp = '';
    $lotexxxx = '';
    $campoxxx = explode('_', $dataxxxx['registro']->id);
    if ($campoxxx[0] == 'dispo') {
      $medidisp = Cformula::select('peso')->where('orden_id',$dataxxxx['registro']->id)->get();
      $lotexxxx = $medidisp->lotexxxx;
      $medidisp = $medidisp->dmarca->dmedico->nombrexx;
      $this->dispocan += 1;
    } 
    $registro['medidisp'] = $medidisp; // medicamento
    $registro['lotexxxx'] = $lotexxxx; // lote medicamento
    $registro['consumid'] = $dataxxxx['registro']->cantcons; // cantidad consumida del medicamento
    $registro['alistada'] = $dataxxxx['registro']->unidad; // cantidad alistada del medicamento
    $registro['sobrante'] = $dataxxxx['registro']->diferenc; // cantidad sobrante del medicamento
    $registro['identifi'] = $dataxxxx['registro']->id; // indentificador del medicamento
    $this->concilia[$dataxxxx['campoxxx'] . 'xxx'][] = $registro;
  }
  private function getArmarData($dataxxxx)
  {
      $campoxxx = explode('_', $dataxxxx['padrexxx']->id);
      $this->getData(['campoxxx' => $campoxxx[0], 'registro' => $dataxxxx['padrexxx']]);

  }
  public function getControlespf($dataxxxx)
  {
    $this->getArmarData($dataxxxx);
    for ($i = 0; $i < abs($this->dispocan - $this->mediccan); $i++) {
      if ($this->dispocan > $this->mediccan) {
        $this->concilia['medicxxx'][] = $this->registro;
      } else {
        $this->concilia['dispoxxx'][] = $this->registro;
      }
    }
   
    return $this->concilia;
  }
  


}
