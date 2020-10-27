<?php

namespace App\Traits\Reporte;

use App\Models\Reportes\Orden;

trait OrdenTrait
{
  public function getOrden()
  {
      /**
       * conocer los rangos de la clinica
       */
    $ordenxxx=
    Orden::
    select(['orden.id','orden.ordeprod',"orden.observac"])->get();
    foreach ($ordenxxx as $key => $value) {

    }
   // ddd($dataxxxx['modeloxx']->dformulas[0]->medicame); //->rnpt

  }


}
