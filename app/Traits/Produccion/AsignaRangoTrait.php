<?php

namespace App\Traits\Produccion;

use App\Models\Clinica\Crango;
trait AsignaRangoTrait
{
  public function getRangos($dataxxxx)
  {
      /**
       * conocer los rangos de la clinica
       */
    $rangosxx=
    Crango::
    select(['crangos.id','condicios.condicio',"rangos.ranginic",".rangos.rangfina",'rnpts.npt_id'])
    ->join('rcodigos','crangos.rcodigo_id','=','rcodigos.id')
    ->join('rcondicis','rcodigos.rcondici_id','=','rcondicis.id')
    ->join('rnpts','rcondicis.rnpt_id','=','rnpts.id')
    ->join('rangos','rnpts.rango_id','=','rangos.id')
    ->join('condicios','rcondicis.condicio_id','=','condicios.id')
    ->where('sis_clinica_id',$dataxxxx['modeloxx']->sis_clinica_id)
    ->where('rnpts.npt_id',$dataxxxx['modeloxx']->paciente->npt_id)->get();
    foreach ($rangosxx as $key => $value) {

    }
   // ddd($dataxxxx['modeloxx']->dformulas[0]->medicame); //->rnpt

  }


}
